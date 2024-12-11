@extends('layouts.app')
@section('content')

@include('layouts.nav')

<div class="container flex flex-col items-center px-4 sm:px-8 lg:px-16 mt-20 mb-20">
  <button id="openModal" class="bg-[#059212] text-white mb-4 px-6 py-2 text-sm sm:text-base">
    Agregar Evento
  </button>
  <div id="agenda" class="bg-white opacity-60 w-full rounded-md shadow-md p-4 sm:p-6 lg:p-8 overflow-x-auto">
    Calendario
  </div>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden ">
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

      <!-- Lista de Zonas -->
      <div class="mb-4">
        <label for="zona" class="block text-sm font-medium mb-2">Zona</label>
        <select id="zona" name="zona" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500">
          <option value="" disabled selected>Selecciona una zona</option>
          <option value="Centro">Centro</option>
          <option value="Palogrande">Palogrande</option>
          <option value="Versalles">Versalles</option>
          <option value="La Enea">La Enea</option>
          <option value="San Jorge">San Jorge</option>
        </select>
      </div>

      <!-- Lista de Empresas -->
      <div class="mb-4">
        <label for="empresa" class="block text-sm font-medium mb-2">Empresa</label>
        <select id="empresa" name="empresa" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500" disabled>
          <option value="" disabled selected>Selecciona una empresa</option>
        </select>
      </div>

      <!-- Lista de Aprendices -->
      <div class="mb-4">
        <label for="aprendiz" class="block text-sm font-medium mb-2">Aprendiz</label>
        <select id="aprendiz" name="aprendiz" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-500" disabled>
          <option value="" disabled selected>Selecciona un aprendiz</option>
        </select>
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

<script>
  const empresasPorZona = {
    Centro: ["Empresa 1 Centro", "Empresa 2 Centro"],
    Palogrande: ["Empresa 1 Palogrande", "Empresa 2 Palogrande"],
    Versalles: ["Empresa 1 Versalles", "Empresa 2 Versalles"],
    "La Enea": ["Empresa 1 La Enea", "Empresa 2 La Enea"],
    "San Jorge": ["Empresa 1 San Jorge", "Empresa 2 San Jorge"]
  };

  const aprendicesPorEmpresa = {
    "Empresa 1 Centro": ["Aprendiz A", "Aprendiz B"],
    "Empresa 2 Centro": ["Aprendiz C", "Aprendiz D"],
    "Empresa 1 Palogrande": ["Aprendiz E", "Aprendiz F"],
    "Empresa 2 Palogrande": ["Aprendiz G", "Aprendiz H"],
    "Empresa 1 Versalles": ["Aprendiz I", "Aprendiz J"],
    "Empresa 2 Versalles": ["Aprendiz K", "Aprendiz L"],
    "Empresa 1 La Enea": ["Aprendiz M", "Aprendiz N"],
    "Empresa 2 La Enea": ["Aprendiz O", "Aprendiz P"],
    "Empresa 1 San Jorge": ["Aprendiz Q", "Aprendiz R"],
    "Empresa 2 San Jorge": ["Aprendiz S", "Aprendiz T"]
  };

  const zonaSelect = document.getElementById("zona");
  const empresaSelect = document.getElementById("empresa");
  const aprendizSelect = document.getElementById("aprendiz");

  zonaSelect.addEventListener("change", function () {
    const zona = zonaSelect.value;
    empresaSelect.innerHTML = '<option value="" disabled selected>Selecciona una empresa</option>';
    aprendizSelect.innerHTML = '<option value="" disabled selected>Selecciona un aprendiz</option>';
    aprendizSelect.disabled = true;

    if (zona && empresasPorZona[zona]) {
      empresaSelect.disabled = false;
      empresasPorZona[zona].forEach(empresa => {
        const option = document.createElement("option");
        option.value = empresa;
        option.textContent = empresa;
        empresaSelect.appendChild(option);
      });
    } else {
      empresaSelect.disabled = true;
    }
  });

  empresaSelect.addEventListener("change", function () {
    const empresa = empresaSelect.value;
    aprendizSelect.innerHTML = '<option value="" disabled selected>Selecciona un aprendiz</option>';

    if (empresa && aprendicesPorEmpresa[empresa]) {
      aprendizSelect.disabled = false;
      aprendicesPorEmpresa[empresa].forEach(aprendiz => {
        const option = document.createElement("option");
        option.value = aprendiz;
        option.textContent = aprendiz;
        aprendizSelect.appendChild(option);
      });
    } else {
      aprendizSelect.disabled = true;
    }
  });
</script>


@include('layouts.footer')

@endsection

@section('js')
<script>
const userMenuButton = document.getElementById('user-menu-button');
const userMenu = document.getElementById('user-menu');

// Script para mostrar/ocultar el menú desplegable
userMenuButton.addEventListener('click', function() {
    userMenu.classList.toggle('hidden');
});

// Cerrar el menú si se hace clic fuera de él
document.addEventListener('click', function(event) {
    if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
        userMenu.classList.add('hidden');
    }
});
</script>
@endsection