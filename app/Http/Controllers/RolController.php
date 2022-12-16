<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rol;

class RolController extends Controller
{

    public function index()
    {
        $datos = rol::all();
        return $datos;
    }

    public function getforid(Request $request,$id)
    {
        $datos = rol::findOrFail($request->id);
        return $datos;
    }

    public function store(Request $request)
    {
        $datos = new rol();
        $datos->nombre = $request->nombre;
        $datos->save();
        return $datos;
    }

    public function update(Request $request, $id)
    {
        $datos = rol::findOrFail($request->id);
        $datos->nombre = $request->nombre;
        $datos->save();
        return $datos;
    }

    public function destroy($id)
    {
        $datos = rol::destroy($id);
        return $datos;
    }

}
