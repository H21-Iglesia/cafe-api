<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;

/**
 *@OA\Tag(name="Estado")
 */

class estadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *     tags={"Estado"},
    *     path="/api/estado",
    *     summary="Mostrar estados ",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todos los estados."
    *     )
    * )
    */
    public function index()
    {
        $datos = Estado::all();
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
    *     tags={"Estado"},
    *     path="/api/estado",
    *     summary="Cargar estado ",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda un estado."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new Estado();
        $datos->estado = $request->estado;

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
    *     tags={"Estado"},
    *     path="/api/estado/{id}",
    *     summary="Actualizar estado ",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza un estado."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = Estado::findOrFail($request->id);
        $datos->estado = $request->estado;

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
    *     tags={"Estado"},
    *     path="/api/estado/{id}",
    *     summary="Eliminar estado ",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina un estado."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = Estado::destroy($id);
        return $datos;
    }
}
