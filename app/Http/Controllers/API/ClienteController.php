<?php

namespace App\Http\Controllers\API;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Cliente::all();

        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'identificacion' => 'required|string',
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|max:255',
        ];


        $validator = Validator::make( $request->all(), $rules); 

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // Crear el cliente en la base de datos
        $cliente = Cliente::create($request->all());

        // Devolver la respuesta adecuada
        return response()->json($cliente, 201); 
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
    public function update(Request $request, Cliente $cliente)
    {
        // Validar y procesar los datos de entrada
        /* $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|max:255',
        ]);

        // Actualizar los datos del cliente en la base de datos
        $cliente->update($data);

        // Devolver la respuesta adecuada
        return response()->json($cliente, 200); */
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        // Eliminar el cliente de la base de datos
        $cliente->delete();

        // Devolver la respuesta adecuada
        return response()->json(null, 204);
    }
}
