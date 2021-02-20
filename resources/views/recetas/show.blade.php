@extends('layouts.app')
@section('content')
    <h1>{{$receta}}<h2>
    <article class="container receta">
        <h1 class="text-center">{{$receta->name}}</h1>
        <div class="imagen-receta">
            <img src="/store/{{$receta->image}}" class="w 100">
        </div>
        <div class="receta-data">
            <p>
                <span class="font-weight-bold text-primary">Categoria: </span> {{$receta->categoryReetas->name}} 
            </p>
            <p>
                <span class="font-weight-bold text-primary">Categoria: </span> {{$receta->user_id}} 
            </p>

        </div>
    </article>
@endsection