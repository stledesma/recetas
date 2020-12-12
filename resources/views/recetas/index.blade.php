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
    <tr>
      <th scope="row">Pizza Ecuatoriana</th>
      <td>Pizza</td>
      <td>Comer</td>
    </tr>
    <tr>
      <th scope="row">Sancocho de cerdo</th>
      <td>Sopas</td>
      <td>Comer</td>
    </tr>
    <tr>
      <th scope="row">Shawuarma</th>
      <td>Comida rapida</td>
      <td>Comer</td>
    </tr>
  </tbody>
</table>
    </div>

@endsection
