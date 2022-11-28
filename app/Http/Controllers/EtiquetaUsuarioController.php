<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtiquetaUsuario;

/**
 *@OA\Tag(name="Etiqueta_Usuario")
 */

class EtiquetaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *     tags={"Etiqueta_Usuario"},
    *     path="/api/etiquetaUsuario",
    *     summary="Mostrar ",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todos lo usuarios y sus etiquetas."
    *     )
    * )
    */
    public function index()
    {
        $datos = EtiquetaUsuario::all();
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
    *     tags={"Etiqueta_Usuario"},
    *     path="/api/etiquetaUsuario",
    *     summary="Cargar ",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda un usuario y su etiqueta."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new EtiquetaUsuario();
        $datos->usuario_id = $request->usuario_id;
        $datos->etiqueta_id = $request->etiqueta_id;

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
    *     tags={"Etiqueta_Usuario"},
    *     path="/api/etiquetaUsuario/{id}",
    *     summary="Actualizar ",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza los datos de un usuario y su etiqueta."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = EtiquetaUsuario::findOrFail($request->id);
        $datos->usuario_id = $request->usuario_id;
        $datos->etiqueta_id = $request->etiqueta_id;

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
    *     tags={"Etiqueta_Usuario"},
    *     path="/api/etiquetaUsuario/{id}",
    *     summary="Eliminar",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina un usuario y su etiqueta"
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = EtiquetaUsuario::destroy($id);
        return $datos;
    }
}
