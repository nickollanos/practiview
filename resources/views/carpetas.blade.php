@extends('layouts.app')
@section('title', 'Módulo de Carpetas')
@section('class', 'Carpetas')

@section('content')

    <!-- Navbar -->
    @include('layouts.nav')

    <!-- Main Content (con margen superior suficiente para el navbar fijo) -->
    <main class="container mx-auto px-4 py-8 mt-20">
        <h1 class="text-3xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70 mb-8">Módulo de Carpetas</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <!-- Carpeta de Fichas Activas -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
                <div class="flex p-4">
                    <div class="w-[4rem] h-20 overflow-hidden mr-4">
                        <img src="{{ asset('images/logoFichasActivas.svg') }}" alt="LogoFichasActivas" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col justify-center">
                        <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">FICHAS ACTIVAS</strong>
                    </div>
                </div>
                <div class="px-4 pb-6">
                    <form  method="GET" class="mb-4">
                        <div class="flex items-center justify-between">
                            <select name="filtro" class="w-full bg-[#059212] text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                                <option value="">Seleccione una opción</option>
                                <option value="fichas">Todas las Fichas</option>
                                <option value="activos">Fichas Activas</option>
                                <option value="pendientes">Fichas Pendientes</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Carpeta de Fichas Inactivas -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
                <div class="flex p-4">
                    <div class="w-[4rem] h-20 overflow-hidden mr-4">
                        <img src="{{ asset('images/logoFichasInactivas.svg') }}" alt="LogoFichasInactivas" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col justify-center">
                        <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">FICHAS INACTIVAS</strong>
                    </div>
                </div>
                <div class="px-4 pb-6">
                    <form action="{{ url('carpeta/inactiva') }}" method="GET" class="mb-4">
                        <div class="flex items-center justify-between">
                            <select name="filtro" class="w-full bg-[#059212] text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                                <option value="">Seleccione una opción</option>
                                <option value="inactivas">Fichas Inactivas</option>
                                <option value="archivadas">Fichas Archivadas</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Carpeta de Fichas Pendientes -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
                <div class="flex p-4">
                    <div class="w-[4rem] h-20 overflow-hidden mr-4">
                        <img src="{{ asset('images/logoFichasPendientes.svg') }}" alt="LogoFichasPendientes" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col justify-center">
                        <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">FICHAS PENDIENTES</strong>
                    </div>
                </div>
                <div class="px-4 pb-6">
                    <form action="{{ url('carpeta/pendiente') }}" method="GET" class="mb-4">
                        <div class="flex items-center justify-between">
                            <select name="filtro" class="w-full bg-[#059212] text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                                <option value="">Seleccione una opción</option>
                                <option value="pendientes">Fichas Pendientes</option>
                                <option value="en_revision">Fichas en Revisión</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Carpeta de Fichas Archivadas -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
                <div class="flex p-4">
                    <div class="w-[4rem] h-20 overflow-hidden mr-4">
                        <img src="{{ asset('images/logoFichasArchivadas.svg') }}" alt="LogoFichasArchivadas" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col justify-center">
                        <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">FICHAS ARCHIVADAS</strong>
                    </div>
                </div>
                <div class="px-4 pb-6">
                    <form action="{{ url('carpeta/archivada') }}" method="GET" class="mb-4">
                        <div class="flex items-center justify-between">
                            <select name="filtro" class="w-full bg-[#059212] text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                                <option value="">Seleccione una opción</option>
                                <option value="archivadas">Todas las Fichas Archivadas</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>

@endsection

@include('layouts.footer')

@section('js')
<script>
    // Script para mostrar u ocultar carpetas según el filtro seleccionado
    const filtros = document.querySelectorAll('select[name="filtro"]');
    filtros.forEach(filtro => {
        filtro.addEventListener('change', function() {
            // Funcionalidad para actualizar el contenido de las carpetas
            this.form.submit();
        });
    });
</script>
@endsection
