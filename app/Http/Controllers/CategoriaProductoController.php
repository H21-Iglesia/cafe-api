<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProducto;

/**
 *@OA\Tag(name="Categoria_Producto")
 */

class CategoriaProductoController extends Controller
{


    /**
    * @OA\Get(
    *     tags={"Categoria_Producto"},
    *     path="/api/categoriaProducto",
    *     summary="Mostrar",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todas los productos con sus categorias."
    *     )
    * )
    */
    public function index()
    {
        $datos = CategoriaProducto::with('categoria')->get();;
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
    *     tags={"Categoria_Producto"},
    *     path="/api/categoriaProducto",
    *     summary="Cargar",
    *     @OA\Response(
    *         response=200,
    *         description="Guarga un producto con su categorias."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new CategoriaProducto();
        $datos->producto_id = $request->producto_id;
        $datos->categoria_id = $request->categoria_id;


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
    *     tags={"Categoria_Producto"},
    *     path="/api/categoriaProducto/{id}",
    *     summary="Actualizar",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza un producto y su categoria."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = CategoriaProducto::findOrFail($request->id);
        $datos->producto_id = $request->producto_id;
        $datos->categoria_id = $request->categoria_id;

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
    *     tags={"Categoria_Producto"},
    *     path="/api/categoriaProducto/{id}",
    *     summary="Eliminar",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina un producto y su categoria."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = CategoriaProducto::destroy($id);
        return $datos;
    }
}
