@extends('layouts.app')
@section('content')

    <div class="container">
        <div id="agenda"> Calendario</div>
    </div>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#evento">
  Agregar Evento
</button>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">

        {!! csrf_field() !!}

        <div class="form-group">
                <label for="id">Id:</label>
                <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" readonly>
            </div>

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el título del evento">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Escribe la descripción del evento"></textarea>
            </div>
            
            <div class="form-group">
                <label for="start">Inicio del Evento</label>
                <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group">
                <label for="end">Fin del Evento</label>
                <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
        <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
        <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection