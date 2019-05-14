<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $clientes = Cliente::orderBy('id', 'asc')->paginate(10);
      
        return $clientes;
    
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    	$cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json([
                'message' => 'Lo sentimos, el cliente con el id ' . $id . ' no existe'
            ], 400);
        }
        

        if ($cliente->status === 0) {
        	$cliente->status = 1;
        } else {
        	$cliente->status = 0;
        }


   		try {
            $cliente->update();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error actualizando el Cliente'
            ], 500);
        }
        return response()->json([
                'message' => 'Cliente actualizado satisfactoriamente',
                'data' => $cliente
            ], 200);
        
    
    }
}
