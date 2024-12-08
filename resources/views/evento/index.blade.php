@extends('layouts.app')
@section('content')

<div class="container flex flex-col items-center px-4 sm:px-8 lg:px-16">
  <button type="button" class="btn bg-[#059212] text-white mb-4 px-6 py-2 text-sm sm:text-base" data-bs-toggle="modal" data-bs-target="#evento">
    Agregar Evento
  </button>
  <div id="agenda" class="bg-white opacity-60 w-full rounded-md shadow-md p-4 sm:p-6 lg:p-8 overflow-x-auto overflow-y-auto">Calendario</div>
</div>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-white opacity-90 shadow-lg">
      <div class="modal-header flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <h5 class="modal-title text-lg sm:text-xl font-semibold" id="exampleModalLabel">Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          {!! csrf_field() !!}

          <div class="form-group mb-4">
            <input type="hidden" class="form-control" name="id" id="id" aria-describedby="helpId" readonly>
          </div>

          <div class="form-group mb-4">
            <label for="title" class="block text-sm font-medium mb-2">Título</label>
            <input type="text" class="form-control w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el título del evento">
          </div>

          <div class="form-group mb-4">
            <label for="descripcion" class="block text-sm font-medium mb-2">Descripción</label>
            <textarea class="form-control w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500" name="descripcion" id="descripcion" rows="3" placeholder="Escribe la descripción del evento"></textarea>
          </div>

          <div class="form-group mb-4">
            <label for="start" class="block text-sm font-medium mb-2">Inicio del Evento</label>
            <input type="date" class="form-control w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500" name="start" id="start" aria-describedby="helpId" placeholder="">
          </div>

          <div class="form-group mb-4">
            <label for="end" class="block text-sm font-medium mb-2">Fin del Evento</label>
            <input type="date" class="form-control w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500" name="end" id="end" aria-describedby="helpId" placeholder="">
          </div>
        </form>
      </div>
      <div class="modal-footer flex flex-wrap gap-2">
        <button type="button" class="btn bg-[#059212] text-white px-4 py-2 text-sm">Guardar</button>
        <button type="button" class="btn bg-[#06D001] text-white px-4 py-2 text-sm">Modificar</button>
        <button type="button" class="btn bg-[#9BEC00] text-white px-4 py-2 text-sm">Eliminar</button>
        <button type="button" class="btn btn-secondary text-white px-4 py-2 text-sm" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection
