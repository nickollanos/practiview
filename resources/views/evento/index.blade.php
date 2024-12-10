@extends('layouts.app')
@section('content')

<div class="container flex flex-col items-center px-4 sm:px-8 lg:px-16">
  <button id="openModal" class="bg-[#059212] text-white mb-4 px-6 py-2 text-sm sm:text-base">
    Agregar Evento
  </button>
  <div id="agenda" class="bg-white opacity-60 w-full rounded-md shadow-md p-4 sm:p-6 lg:p-8 overflow-x-auto">
    Calendario
  </div>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white w-full max-w-lg rounded-md shadow-lg p-6">
    <div class="flex justify-between items-center mb-4">
      <h5 class="text-lg sm:text-xl font-semibold">Evento</h5>
      <button id="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
    </div>
    <form id="eventForm" method="post">
      {!! csrf_field() !!}
      <input type="hidden" name="id" id="id" readonly>

      <div class="mb-4">
        <label for="title" class="block text-sm font-medium mb-2">Título</label>
        <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500" placeholder="Escribe el título del evento">
      </div>

      <div class="mb-4">
        <label for="descripcion" class="block text-sm font-medium mb-2">Descripción</label>
        <textarea id="descripcion" name="descripcion" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500" rows="3" placeholder="Escribe la descripción del evento"></textarea>
      </div>

      <div class="mb-4">
        <label for="start" class="block text-sm font-medium mb-2">Inicio del Evento</label>
        <input type="date" id="start" name="start" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500">
      </div>

      <div class="mb-4">
        <label for="end" class="block text-sm font-medium mb-2">Fin del Evento</label>
        <input type="date" id="end" name="end" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500">
      </div>

      <div class="flex justify-end space-x-2">
        <button id="btnGuardar" type="button" class="bg-[#059212] text-white px-4 py-2 rounded-md">Guardar</button>
        <button id="btnModificar" type="button" class="bg-[#06D001] text-white px-4 py-2 rounded-md">Modificar</button>
        <button id="btnEliminar" type="button" class="bg-[#9BEC00] text-white px-4 py-2 rounded-md">Eliminar</button>
        <button id="closeModalFooter" type="button" class="bg-gray-300 text-black px-4 py-2 rounded-md">Cerrar</button>
      </div>
    </form>
  </div>
</div>

@endsection
