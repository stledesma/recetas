@extends('layouts.app')
@section('botones')
<a type="button" class="btn btn-primary" href={{ route('recetas.index') }}>Regresar</a>
@endsection
@section('content')
    {{--<h1>{{$receta}}</h1>--}}
    <article class="contenido-receta">
        <h1 class="text-center">{{$receta->nombre}}</h1>
        <div class="imagen-receta">
            <img src="/storage/{{$receta->image}}" class="w-100">
        </div>
        <div class="receta-data">
            <p>
                <span class="font-weight-bold text-primary">Categoria: </span>{{$receta->categoriaReceta->nombre}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Autor: </span>{{$receta->autorReceta->name}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Fecha de creacion: </span>
                {{date('d-m-Y', strtotime($receta->created_at))}}
            </p>

        </div>

        <div class="ingredientes">
        <p>
            <span class="font-weight-bold text-primary">Ingredientes: </span>
            {!!$receta->ingredients!!} </p>
        </div>

        <div class="preparacion">
        <p>
            <span class="font-weight-bold text-primary">Preparación</span>
            {!!$receta->preparation!!} </p>
        </div>

    </article>
@endsection
