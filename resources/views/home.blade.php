@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="modal" id='mdlDelete' tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Esta seguro que desea eliminar el registro.</p>
        <input type="hidden" id="idPelicula">
      </div>
      <div class="modal-footer">
        <button id='btnEliminar' type="button" class="btn btn-danger">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class='table' id='dtPeliculas'>
                        <thead>
                            <th>ID</th>
                            <th>TITULO</th>
                            <th>DESCRIPCION</th>
                            <th>ESTRENO</th>
                            <th>RATING</th>
                            <th>CREADO</th>
                            <th>ACCION ELIMINACION (CS)</th>
                            <th>ACCION (SS)</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            EliminarSiConfirmado();

            $('#dtPeliculas').DataTable({
                ajax:{
                    url: 'allPeliculas',
                    method: "GET"
                },
                columns:[
                    { data: 'id'},
                    { data: 'titulo'},
                    { data: 'descripcion'},
                    { data: 'fecha_estreno'},
                    { data: 'rating'},
                    { data: 'created_at'},
                    { data: 'id',
                      render: function(data,t,r,meta){
                          return "<button class='btn btn-danger' onClick='ConfirmarBorrado("+data+")'>Eliminar</button>";
                      } },
                    { data: 'accion' },
                ]
            });
        } );

        function ConfirmarBorrado(idPelicula){
            $('#idPelicula').val(idPelicula);
            $('#mdlDelete').modal('show');
        }

        function EliminarSiConfirmado(){
            $('#btnEliminar').on('click', function(e){
                e.preventDefault();
                fetch('pelicula/delete/'+$('#idPelicula').val(),{
                    method : 'GET'
                }).then(function(d){
                    console.log(d);
                    $('#mdlDelete').modal('hide');
                    $('#dtPeliculas').DataTable().ajax.reload();
                });
            });
        }
    </script>
@endsection