@extends('layouts.app')
@section('botones')
<a type="button" class="btn btn-primary" href={{ route('recetas.index') }}>Regresar</a>
@endsection

@section('content')
    <h2 class="text-center mb-5"> Editar Receta: {{$receta->name}}</h2>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form method="POST" action="{{route('recetas.update', ['receta'=>$receta->id])}}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nombre Receta</label>
                        <input type="text" name="name" class="form-control @error('name')
                            is-invalid
                        @enderror"
                        id="name" placeholder="Nombre Receta" value="{{$receta->name}}">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label for="category">Categoria</label>
                    <select name="category" class="form-control @error('category')
                            is-invalid
                        @enderror"
                        id="category">
                        <option value="">--Seleccione--</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" {{$receta->categoria_id==$categoria->id ? 'selected':''}}>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                      @error('category')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredientes</label>
                        <input type="hidden" name="ingredients"  id="ingredients" required="" value="{{$receta->ingredients}}">
                        <trix-editor input="ingredients" class="form-control @error('ingredients')
                            is-invalid
                        @enderror"></trix-editor>
                        @error('ingredients')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="preparation">Preparación</label>
                        <input id=preparation type="hidden" name="preparation" value="{{$receta->preparation}}">
                        <trix-editor
                        class="form-control @error('preparation') is-invalid @enderror"
                        input="preparation"></trix-editor>
                        @error('preparation')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen: </label>
                        <input id=image type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                        <div class="mt-4">
                            <p>Imagen Actual</p>
                            <img src="/storage/{{$receta->image}}" style="width:300px">
                        </div>

                         @error('image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Editar Receta" />
                    </div>
                </form>
            </div>
        </div>
@endsection
