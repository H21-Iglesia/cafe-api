<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Producto;
use Carbon\Carbon;

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
    public function index(Request $request)
    {
        $top = $request->input('top', null); // Obtiene el parámetro 'top' (o null si no se proporciona)
        
        if ($top !== null) {
            $datos = Pedido::with('pedidoDetalle')
                        ->orderBy('created_at', 'desc') // Ordena por fecha de creación en orden descendente (últimos agregados primero)
                        ->take($top)
                        ->get();
        } else {
            $datos = Pedido::with('pedidoDetalle')
                        ->orderBy('created_at', 'desc') // Ordena por fecha de creación en orden descendente (últimos agregados primero)
                        ->get();
        }
        
        return response()->json($datos);
    }

    public function getToday()
    {      
        $fechaHoy = Carbon::now()->format('Y-m-d');// Obtiene la fecha actual en el formato YYYY-MM-DD
        $datos = Pedido::with('pedidoDetalle')->whereDate('created_at', $fechaHoy)->get(); // Filtra los pedidos por la fecha de hoy
        return response()->json($datos);
    }

    public function getPendingOrdersToday()
    {      
        $fechaHoy = date('Y-m-d'); // Obtiene la fecha actual en el formato YYYY-MM-DD
        $datos = Pedido::with('pedidoDetalle')
                        ->where('estado_id', 1) // Filtra por estado pendiente
                        ->whereDate('created_at', $fechaHoy) // Filtra por fecha de hoy
                        ->get();

        return response()->json($datos);
    }

    public function getPendingOrdersWithDebt()
    {      
        $datos = Pedido::with('pedidoDetalle')
                        ->whereIn('pagado', [0]) // Filtra por estados con deuda (3)
                        ->get();
    
        return response()->json($datos);
    }

    public function getPendingOrdersWithDebtToday()
    {      
        $fechaHoy = date('Y-m-d'); // Obtiene la fecha actual en el formato YYYY-MM-DD
        $datos = Pedido::with('pedidoDetalle')
                        ->whereIn('pagado', [0]) // Filtra por estado con deuda (3)
                        ->whereDate('created_at', $fechaHoy) // Filtra por fecha de hoy
                        ->get();

        return response()->json($datos);
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

            $productoactual = Producto::findOrFail($productoID);
            if($productoactual->stock > 0){
                $productoactual->stock = $productoactual->stock - 1;
                $productoactual->save();
            }
  
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
