<?php

namespace App\Http\Controllers;

use App\User;
use App\Receta;
use App\Category;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Auth\Middleware\Authorize;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userRecetas=Auth::user()->userRecetas;
        return view('recetas.index')->with('userRecetas', $userRecetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$category = DB::table('category')->get()->pluck('name', 'id');

        $categorias = Categoria::all(['id','nombre']);
        return view('recetas.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required',
            'image' => 'required|image',
        ]);

        $rutaImagen=$request['image']->store('upload-recetas','public');
        /*$imgResize = Image::make(public_path("storage/{$rutaImagen}"))->fit(1000,500);
        $imgResize->save();

        /*DB::table('recetas')->insert([
            'name' => $data['name'],
            'preparation' => $data['preparation'],
            'ingredients' => $data['ingredients'],
            //'image' => $data['image'],
            'image' => 'receta1.jpg',
            'user_id' => Auth::user()->id,
            'category_id' => $data['category']
        ]);*/
        //insertar con modelos
        Auth::user()->userRecetas()->create([
            'name' => $data['name'],
            'preparation' => $data['preparation'],
            'ingredients' => $data['ingredients'],
            'image' => $rutaImagen,
            'categoria_id' => $data['category']
        ]);
        //dd($request->all()); mostrar datos
        //redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show')->with('receta', $receta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        $categorias = Categoria::all(['id','nombre']);
        return view('recetas.edit')->with('categorias',$categorias)
                                   ->with('receta', $receta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //funcion para validar usuario usando policy
        $this->authorize('update', $receta);
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required',
        ]);

            //Asignar valores
            $receta->name=$data['name'];
            $receta->preparation=$data['preparation'];
            $receta->ingredients=$data['ingredients'];
            $receta->categoria_id=$data['category'];

            //nueva imagen
            $rutaImagen=$request['image']->store('upload-recetas','public');
            $receta->image=$rutaImagen;

            $receta->save();
            return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //funcion para validar usuario usando policy
        $this->authorize('delete', $receta);
         //metodo para eliminar
         $receta->delete();
         return redirect()->action('RecetaController@index');
    }
}
