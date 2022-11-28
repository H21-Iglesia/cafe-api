<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Producto;

/**
 *@OA\Tag(name="Pedido")
 */

class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *     tags={"Pedido"},
    *     path="/api/pedido",
    *     summary="Mostrar pedidos ",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todos los pedidos."
    *     )
    * )
    */
    public function index()
    {
         
        $datos = Pedido::with('pedidoDetalle')->get();
        return response()->json($datos) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Post(
    *     tags={"Pedido"},
    *     path="/api/pedido",
    *     summary="Cargar pedido ",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda un pedido."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new Pedido();
        $datos->nombre_cliente = $request->nombre_cliente;
        $datos->monto_pagado = $request->monto_pagado;
        $datos->pagado = $request->pagado;
        $datos->tipopago_id = $request->tipopago_id;
        $datos->estado_id = $request->estado_id;
        // $datos->productos = $request->productos;
        $datos->save();

        foreach ($request->productos as $productoID){
            $datos2 = new PedidoProducto();
            $datos2->pedido_id = $datos->id;
            $datos2->producto_id = $productoID;
            $datos2->save();
        }




 

        return $datos;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Put(
    *     tags={"Pedido"},
    *     path="/api/pedido/{id}",
    *     summary="Actualizar pedido ",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza los datos de un pedido."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = Pedido::findOrFail($request->id);
        $datos->nombre_cliente = $request->nombre_cliente;
        $datos->monto_pagado = $request->monto_pagado;
        $datos->pagado = $request->pagado;
        $datos->tipopago_id = $request->tipopago_id;
        $datos->estado_id = $request->estado_id;

        $datos->save();
        return $datos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Delete(
    *     tags={"Pedido"},
    *     path="/api/pedido/{id}",
    *     summary="Eliminar pedido ",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina un pedido."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = Pedido::destroy($id);
        return $datos;
    }
}
