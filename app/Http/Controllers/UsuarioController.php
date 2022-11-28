<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

/**
 *@OA\Tag(name="Usuario")
 */

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *     tags={"Usuario"},
    *     path="/api/usuario",
    *     summary="Mostrar usuarios ",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todos los usuarios."
    *     )
    * )
    */
    public function index()
    {
        $datos = Usuario::all();
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
    *     tags={"Usuario"},
    *     path="/api/usuario",
    *     summary="Cargar usuario ",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda un usuario."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new Usuario();
        $datos->nombre = $request->nombre;
        $datos->apellido = $request->apellido;
        $datos->fecha_nacimiento = $request->fecha_nacimiento;
        $datos->email = $request->email;
        $datos->celular = $request->celular;


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
    *     tags={"Usuario"},
    *     path="/api/usuario/{id}",
    *     summary="Actualizar usuario ",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza los datos de un usuario."
    *     )
    * )
    */
    public function update(Request $request, $id)
    {
        $datos = Usuario::findOrFail($request->id);
        $datos->nombre = $request->nombre;
        $datos->apellido = $request->apellido;
        $datos->fecha_nacimiento = $request->fecha_nacimiento;
        $datos->email = $request->email;
        $datos->celular = $request->celular;

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
    *     tags={"Usuario"},
    *     path="/api/usuario/{id}",
    *     summary="Eliminar usuario ",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina un usuario."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = Usuario::destroy($id);
        return $datos;
    }
}
