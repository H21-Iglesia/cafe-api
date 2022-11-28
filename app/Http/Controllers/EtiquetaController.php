<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta;

/**
 *@OA\Tag(name="Etiqueta")
 */

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *     tags={"Etiqueta"},
    *     path="/api/etiqueta",
    *     summary="Mostrar etiquetas ",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todas las etiquetas."
    *     )
    * )
    */
    public function index()
    {
        $datos = Etiqueta::all();
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
    *     tags={"Etiqueta"},
    *     path="/api/etiqueta",
    *     summary="Cargar etiqueta ",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda una etiqueta."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new Etiqueta();
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
    *     tags={"Etiqueta"},
    *     path="/api/etiqueta/{id}",
    *     summary="Actualizar etiqueta ",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza los datos de una etiqueta."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = Etiqueta::findOrFail($request->id);
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
    *     tags={"Etiqueta"},
    *     path="/api/etiqueta/{id}",
    *     summary="Eliminar etiqueta ",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina una etiqueta."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = Etiqueta::destroy($id);
        return $datos;
    }
}
