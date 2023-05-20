<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Detalle;
use Illuminate\Support\Facades\Validator;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexWithRelations()
    {
        $facturas = Factura::with('detalles', 'cliente')->get();

        return response()->json($facturas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'establecimiento' => 'required',
            'punto_emision' => 'required',
            'numero_factura' => 'required',
            'fecha' => 'required',
            'cliente_id' => 'required|exists:clientes,id',
            'detalles' => 'required|array',
            'detalles.*.producto_id' => 'required|exists:productos,id',
            'detalles.*.cantidad' => 'required|numeric',
            'detalles.*.unidad_medida' => 'required',
            'detalles.*.precio' => 'required|numeric',
        ];

        $validator = Validator::make( $request->all(), $rules); 

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $factura = new Factura;
        $factura->establecimiento = $request->input('establecimiento');
        $factura->punto_emision = $request->input('punto_emision');
        $factura->numero_factura = $request->input('numero_factura');
        $factura->fecha = $request->input('fecha');
        $factura->cliente_id = $request->input('cliente_id');
        $factura->subtotal = 0;
        $factura->total_iva = 0;
        $factura->total = 0;
        $factura->save();

        $detalles = $request->input('detalles');
        foreach ($detalles as $detalleData) {
            $detalle = new Detalle;
            $detalle->factura_id = $factura->id;
            $detalle->producto_id = $detalleData['producto_id'];
            $detalle->cantidad = $detalleData['cantidad'];
            $detalle->unidad_medida = $detalleData['unidad_medida'];
            $detalle->precio = $detalleData['precio'];
            $detalle->subtotal = $detalle->cantidad * $detalle->precio;
            $detalle->iva = 0.12 * $detalle->subtotal;
            $detalle->save();

            $factura->subtotal += $detalle->subtotal;
            $factura->total_iva += $detalle->iva;
        }

        $factura->total = $factura->subtotal + $factura->total_iva;
        $factura->save();

        return response()->json($factura, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
