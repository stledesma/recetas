@extends('layouts.app')
@section('botones')
    <a type="button" class="btn btn-primary" href={{ route('recetas.index') }}>Regresar</a>
@endsection
@section('content')
    <h2 class="text-center mb-5">Crea tus recetas propias</h2>
    <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Nombre de Receta</label>
                    <input type="text" name="name" class="form-control @error('name')
                        is-invalid
                    @enderror"
                    id="name" required="" value={{old('name')}}>
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" name="description" class="form-control @error('description')
                        is-invalid
                    @enderror" id="description" required="" value={{old('description')}}>
                    @error('description')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <select name="category" class="form-control @error('category')
                        is-invalid
                    @enderror" id="category">
                    <option value="">---Seleccione---</option>
                        @foreach($category as $id => $categorys)
                            <option value="{{$id}} ">{{$categorys}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
        </div>
    </div>
@endsection
