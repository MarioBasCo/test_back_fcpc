<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Descuento;
use Illuminate\Support\Facades\Validator;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();

        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'codigo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'categoria' => 'required',
        ];

        $validator = Validator::make( $request->all(), $rules); 

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $producto = new Producto;
        $producto->codigo = $request->input('codigo');
        $producto->descripcion = $request->input('descripcion');
        $producto->descripcion = $request->input('precio');
        $producto->categoria = $request->input('categoria');
        $producto->save();

        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'codigo' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'categoria' => 'required',
        ];

        $validator = Validator::make( $request->all(), $rules); 

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->codigo = $request->input('codigo');
        $producto->descripcion = $request->input('descripcion');
        $producto->categoria = $request->input('categoria');
        $producto->save();

        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }

    /**
     * Apply a discount to a product.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function applyDiscount(Request $request, $id)
    {
        $request->validate([
            'porcentaje' => 'required_without:monto|numeric|min:0|max:100',
            'monto' => 'required_without:porcentaje|numeric|min:0',
        ]);

        $product = Producto::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $descuento = $product->descuento;

        if (!$descuento) {
            $descuento = new Descuento();
            $descuento->producto_id = $product->id;
        }

        $descuento->porcentaje = $request->input('porcentaje');
        $descuento->monto = $request->input('monto');
        $descuento->save();

        return response()->json($product->load('descuento'));
    }
}
