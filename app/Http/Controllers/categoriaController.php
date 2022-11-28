<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

/**
* @OA\Info(title="API cafeteriah21", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000/")
 *@OA\Tag(name="Categoria")
 */


class categoriaController extends Controller
{

    /**
    * @OA\Get(
    *     tags={"Categoria"},
    *     path="/api/categoria",
    *     summary="Mostrar categorias",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todas las categorias.",
    *     ),

    * )
    */
    
    public function index()
    {
        $datos = Categoria::all();
        return $datos;
    }


    public function create()
    {
        //
    }


    /**
     * @OA\Post(
     *     tags={"Categoria"},
     *     path="/api/categoria",
     *     summary="Cargar categoria",
     *     @OA\Response(response="200", description="Guarda una categoria")
     * )
     */

    public function store(Request $request)
    {
        $datos = new Categoria();
        $datos->nombre = $request->nombre;

        $datos->save();

        return $datos;
    }


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
    * @OA\Put(
    *     tags={"Categoria"},
    *     path="/api/categoria/{id}",
    *     summary="Actualizar categoria",
    *     @OA\Response(
    *         response=200,
    *         description=" Actualiza datos de una categoria."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = Categoria::findOrFail($request->id);
        $datos->nombre = $request->nombre;

        $datos->save();
        return $datos;
    }


         /**
    * @OA\Delete(
    *     tags={"Categoria"},
    *     path="/api/categoria/{id}",
    *     summary="Eliminar categoria",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina una categoria."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = Categoria::destroy($id);
        return $datos;
    }
}