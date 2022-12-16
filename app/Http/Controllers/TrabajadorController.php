<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trabajador;


class TrabajadorController extends Controller
{
    public function index()
    {
        $datos = trabajador::all();
        return $datos;
    }

    public function getforid(Request $request,$id)
    {
        $datos = trabajador::findOrFail($request->id);
        return $datos;
    }

    public function store(Request $request)
    {
        $datos = new trabajador();
        $datos->nombre = $request->nombre;
        $datos->apellido = $request->apellido;
        $datos->urlfoto = $request->urlfoto;
        $datos->rol_id = $request->rol_id;
        $datos->save();
        return $datos;
    }

    public function update(Request $request)
    {
        $datos = trabajador::findOrFail($request->id);
        $datos->nombre = $request->nombre;
        $datos->apellido = $request->apellido;
        $datos->urlfoto = $request->urlfoto;
        $datos->rol_id = $request->rol_id;
        $datos->save();
        return $datos;
    }

    public function destroy($id)
    {
        $datos = trabajador::destroy($id);
        return $datos;
    }
}
