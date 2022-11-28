<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoProducto;

    /**
     *@OA\Tag(name="Pedido_producto")
    */
class PedidoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *     tags={"Pedido_producto"},
    *     path="/api/pedidoProducto",
    *     summary="Mostrar ",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todos los pedidos con sus productos."
    *     )
    * )
    */
    public function index()
    {
        $datos = PedidoProducto::with('producto')->get();
        return $datos;
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
    *     tags={"Pedido_producto"},
    *     path="/api/pedidoProducto",
    *     summary="Cargar ",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda un pedido con su producto."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new PedidoProducto();
        $datos->pedido_id = $request->pedido_id;
        $datos->producto_id = $request->producto_id;
        $datos->completado = $request->completado;
        $datos->preparo = $request->preparo;


        $datos->save();

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
    *     tags={"Pedido_producto"},
    *     path="/api/pedidoProducto/{id}",
    *     summary="Actualizar ",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza los datos de un pedido con su producto."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = PedidoProducto::findOrFail($request->id);
        $datos->pedido_id = $request->pedido_id;
        $datos->producto_id = $request->producto_id;
        $datos->completado = $request->completado;
        $datos->preparo = $request->preparo;

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
    *     tags={"Pedido_producto"},
    *     path="/api/pedidoProducto/{id}",
    *     summary="Eliminar ",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina un pedido con su producto."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = PedidoProducto::destroy($id);
        return $datos;
    }
}
