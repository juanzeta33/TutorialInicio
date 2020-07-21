@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Yo soy la vista para editar los datos</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    <hr class="my-3">
                    @endif
                    <form action="{{ url('pelicula/edit')}}" method='post' id='' >
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <input type="hidden" name="id" value="{{ $pelicula->id }}">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Titulo</label>
                                    <input type="text" name="titulo" id="" value="{{ $pelicula->titulo }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <input type="text" name="descripcion" id="" value="{{ $pelicula->descripcion }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Fecha de estreno</label>
                                    <input type="date" name="fecha_estreno" id="" value="{{ $pelicula->fecha_estreno }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Rating</label>
                                    <input type="number" name="rating" id="" value="{{ $pelicula->rating }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class='btn btn-success btn-block'>Guardar </button>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/propios/pelicula.js')}}"></script>
@endsection