<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\CategoriaProducto;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

/**
 *@OA\Tag(name="Producto")
 */

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * @OA\Get(
    *     tags={"Producto"},
    *     path="/api/producto",
    *     summary="Mostrar productos",
    *     @OA\Response(
    *         response=200,
    *         description="Muestra todos los productos."
    *     )
    * )
    */
    public function index()
    {
        $datos = Producto::with('Categorias')->get();
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
    *     tags={"Producto"},
    *     path="/api/producto",
    *     summary="Cargar producto",
    *     @OA\Response(
    *         response=200,
    *         description="Guarda un producto."
    *     )
    * )
    */
    public function store(Request $request)
    {
        $datos = new Producto();
        $datos->nombre = $request->nombre;
        $datos->costo = $request->costo;
        $datos->cantidad = 0;
        $datos->receta_id = $request->receta_id;
        $datos->save();

        if($request->categorias != null){
            foreach ($request->categorias as $categoria) {
                $categoriaProducto = new CategoriaProducto();
                $categoriaProducto->categoria_id = $categoria;
                $categoriaProducto->producto_id = $datos->id;
                $categoriaProducto->save();
            }
        }

        if($request->hasFile('foto')){

            //Guardamos el nombre original y la extension de la imagen
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();

            // $filename = pathinfo($filename, PATHINFO_FILENAME);
            // $new_name_File = str_replace(" ","_",$filename);

            $extension = $file->getClientOriginalExtension();

            $picture = "foto".'_'."producto"."_id_".$datos -> id;

            //Agregar extension al nombre final
            $picture = $picture.".".$extension;

            //Guardar la imagen en la carpeta images

            Image::make($request->file('foto'))->resize(500, 500)->save(public_path('images/'.$picture),90);

            // $file->move(public_path('images/'),$picture);

            //Crea la empresa y guarda el nombre en logotipo

            $datos -> foto = $picture;
            $datos -> save();

        }

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
    *     tags={"Producto"},
    *     path="/api/producto/{id}",
    *     summary="Actualizar producto",
    *     @OA\Response(
    *         response=200,
    *         description="Actualiza un producto."
    *     )
    * )
    */
    public function update(Request $request)
    {
        $datos = Producto::findOrFail($request->id);
        $datos->nombre = $request->nombre;
        $datos->costo = $request->costo;
        $datos->cantidad = 0;
        $datos->receta_id = $request->receta_id;
        $datos->save();

        if($request->categorias != null){
            foreach ($request->categorias as $categoria) {
                $categoriaProducto = new CategoriaProducto();
                $categoriaProducto->categoria_id = $categoria;
                $categoriaProducto->producto_id = $datos->id;
                $categoriaProducto->save();
            }
        }

        if($request->hasFile('foto')){

            //Guardamos el nombre original y la extension de la imagen
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();

            // $filename = pathinfo($filename, PATHINFO_FILENAME);
            // $new_name_File = str_replace(" ","_",$filename);

            $extension = $file->getClientOriginalExtension();

            $picture = "foto".'_'."producto"."_id_".$datos -> id;

            //Agregar extension al nombre final
            $picture = $picture.".".$extension;

            //Guardar la imagen en la carpeta images

            Image::make($request->file('foto'))->resize(500, 500)->save(public_path('images/'.$picture),90);

            // $file->move(public_path('images/'),$picture);

            //Crea la empresa y guarda el nombre en logotipo

            $datos -> foto = $picture;
            $datos -> save();

        }
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
    *     tags={"Producto"},
    *     path="/api/producto/{id}",
    *     summary="Eliminar producto",
    *     @OA\Response(
    *         response=200,
    *         description="Elimina un producto."
    *     )
    * )
    */
    public function destroy($id)
    {
        $datos = Producto::findOrFail($id);
        $image_path = public_path().'/images/'.$datos->foto;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }    

        if($datos->categorias != null){
            foreach ($datos->categorias as $categoria) {
                $categoriaProducto = CategoriaProducto::findOrFail($categoria->id);
                $categoriaProducto->destroy($categoria->id);
            }
        }

        $datos->destroy($id);
        return $datos;
    }
}
