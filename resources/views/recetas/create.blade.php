@extends('layouts.app')

<!-- Estilos -->
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

<!-- Botones -->
@section('botones')
    <a type="button" class="btn btn-primary" href={{ route('recetas.index') }}>Regresar</a>
@endsection

<!-- Contenido de la pagina -->
@section('content')
    <h2 class="text-center mb-5">Crea tus recetas propias</h2>
    <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
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
                    <label for="ingredients">Ingredientes</label>
                    <input type="hidden" name="ingredients"  id="ingredients" required="" value={{old('ingredients')}}>
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
                    <label for="preparation">Preparacion</label>
                    <input type="hidden" name="preparation"  id="preparation" required="" value={{old('preparation')}}>
                    <trix-editor input="preparation" class="form-control @error('preparation')
                        is-invalid
                    @enderror"></trix-editor>
                    @error('preparation')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" name="image"  id="image" class="form-control @error('image')
                        is-invalid
                    @enderror" id="image">
                    @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
        </div>
    </div>
@endsection

<!-- Scripts -->
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
@endsection
