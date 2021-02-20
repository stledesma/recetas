<?php

namespace App\Http\Controllers;

use App\Category;
use App\Receta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('recetas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$category = DB::table('category')->get()->pluck('name', 'id');
        $category = Category::all(['id', 'name']);
        return view('recetas.create')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request['image']->store('upload-receta', 'public'));

        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required',
            'image' => 'required|image',
        ]);

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
            'image' => 'receta1.jpg',
            'category_id' => $data['category']
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
