<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipopago;

/**
 *@OA\Tag(name="TipoPago")
 */

class TipopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *     tags={"TipoPago"},
    *     path="/api/tipopago",
    *     summary="Mostrar tipo de pagos ",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todos los tipo de pagos."
    *     )
    * )
    */
    public function index()
    {
        $datos = Tipopago::all();
        return $datos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Post(
    *     tags={"TipoPago"},
    *     path="/api/tipopago",
    *     summary="Cargar tipo de pago ",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda un tipo de pago."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new Tipopago();
        $datos->nombre = $request->nombre;

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
    *     tags={"TipoPago"},
    *     path="/api/tipopago/{id}",
    *     summary="Actualizar tipo de pago ",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza los datos de un tipo de pago."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = Tipopago::findOrFail($request->id);
        $datos->nombre = $request->nombre;

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
    *     tags={"TipoPago"},
    *     path="/api/tipopago/{id}",
    *     summary="Eliminar tipo de pago ",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina un tipo de pago."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = Tipopago::destroy($id);
        return $datos;
    }
}
