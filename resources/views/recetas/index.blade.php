@extends('layouts.app')
@section('botones')
<a type="button" class="btn btn-primary" href={{ route('recetas.create') }}>Crear Receta</a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-J">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Categoria</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($userRecetas as $userReceta)
                <tr>
                    <td>{{$userReceta->name}}</td>
                    <td>{{$userReceta->categoriaReceta->nombre}}</td>
                    <td>
                    <a href="{{route('recetas.show',['receta'=>$userReceta->id])}}" class="btn btn-success">Ver</a>
                    <a href="{{route('recetas.edit',['receta'=>$userReceta->id])}}" class="btn btn-dark">Editar</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
             @endforeach
  </tbody>
</table>
    </div>

@endsection
