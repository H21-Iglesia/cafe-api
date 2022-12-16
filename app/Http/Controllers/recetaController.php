<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;

/**
 *@OA\Tag(name="Receta")
 */

class recetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

         /**
    * @OA\Get(
    *     tags={"Receta"},
    *     path="/api/receta",
    *     summary="Mostrar recetas",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todas las recetas."
    *     )
    * )
    */
    public function index()
    {
        $datos = Receta::all();
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
    *     tags={"Receta"},
    *     path="/api/receta",
    *     summary="Agregar receta",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda una receta."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new Receta();
        $datos->nombre = $request->nombre;
        $datos->preparacion = $request->preparacion;
        $datos->ingredientes = $request->ingredientes;

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
    *     tags={"Receta"},
    *     path="/api/receta/{id}",
    *     summary="Actualizar receta",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza datos de la receta."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = Receta::findOrFail($request->id);
        $datos->nombre = $request->nombre;
        $datos->preparacion = $request->preparacion;
        $datos->ingredientes = $request->ingredientes;

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
    *     tags={"Receta"},
    *     path="/api/receta/{id}",
    *     summary="Eliminar receta",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina una receta."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = Receta::destroy($id);
        return $datos;
    }
}
