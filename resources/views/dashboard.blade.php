@extends('layouts.app')
@section('title', 'DASHBOARD')
@section('class', 'DASHBOARD')

@section('content')

    <!-- Navbar -->
    @include('layouts.nav')

<!-- Main Content (con margen superior suficiente para el navbar fijo) -->
<main class="container mx-auto px-4 py-8 mt-20">
    <!-- Tarjetas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

    @if(Auth::user()->perfiles->first()->perfil === 'instructor')
    <!-- Tarjeta Aprendices-->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
            <div class="flex p-4">
                <!-- Contenedor de la imagen -->
                <div class="w-[4rem] h-20 overflow-hidden mr-4">
                    <img src="{{ asset('images/logoApren.svg') }}" alt="LogoApren" class="w-full h-full object-contain">
                </div>
                <!-- Título -->
                <div class="flex flex-col justify-center">
                    <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">APRENDICES</strong>
                </div>
            </div>
            <div class="px-4 pb-6">
                <!-- Total de aprendices -->
                <form action="{{ url('aprendiz') }}" method="GET" class="mb-4">
                    <div class="flex items-center justify-between">
                        <select name="estado" class="w-full bg-[#059212] text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                            <option value="" selected>Seleccione una opcion</option>
                            <option value="activos">Todos los Aprendices</option>
                            <option value="p-ficha">Por Ficha</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tarjeta Empresas -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
            <div class="flex p-4">
                <!-- Contenedor de la imagen -->
                <div class="w-[4rem] h-20 overflow-hidden mr-4">
                    <img src="{{ asset('images/logoEmpre.svg') }}" alt="logoEmpre" class="w-full h-full object-contain">
                </div>
                <!-- Título -->
                <div class="flex flex-col justify-center">
                    <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">EMPRESAS</strong>
                </div>
            </div>
            <div class="px-4 pb-6">
                <!-- Total de aprendices -->
                <!-- <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Empresas Activas: {{ $numeroEmpresas }}</h1> -->
                <!-- Botón -->
                <form action="{{ url('empresa') }}" method="GET" class="mb-4">
                    <div class="flex items-center justify-between">
                        <select name="estado" class="w-full bg-[#059212] text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                            <option value="" selected>Seleccione una opcion</option>
                            <option value="activos">Todas las Empresas</option>
                            <option value="E.zona">Por Zona</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tarjeta Dashboard -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212] mb-12 sm:mb-0">
            <div class="flex p-4">
                <!-- Contenedor de la imagen -->
                <div class="w-[4rem] h-20 overflow-hidden mr-4">
                    <img src="{{ asset('images/logoDash.svg') }}" alt="LogoDash" class="w-full h-full object-contain">
                </div>
                <!-- Título -->
                <div class="flex flex-col justify-center">
                    <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">AGENDA</strong>
                </div>
            </div>
            <div class="px-4 pb-6">
                <!-- Botón -->
                <button class="w-full bg-[#059212] hover:bg-green-600 text-xl text-white font-bold py-2 rounded-lg">
                <a href="{{url('evento')}}">
                    Ver Detalle
                </a>
                </button>
            </div>
        </div>
        @endif

        @if(Auth::user()->perfiles->first()->perfil === 'administrador')
        <!-- Tarjeta Aprendices-->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
            <div class="flex p-4">
                <!-- Contenedor de la imagen -->
                <div class="w-[4rem] h-20 overflow-hidden mr-4">
                    <img src="{{ asset('images/logoApren.svg') }}" alt="LogoApren" class="w-full h-full object-contain">
                </div>
                <!-- Título -->
                <div class="flex flex-col justify-center">
                    <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">APRENDICES</strong>
                </div>
            </div>
            <div class="px-4 pb-6">
                <!-- Total de aprendices -->
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Aprendices Activos: {{ $aprendicesActivos }}</h1>
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Aprendices Inactivos: {{ $aprendicesInactivos }}</h1>
                <form action="{{ url('aprendiz') }}" method="GET" class="mb-4">
                    <div class="flex items-center justify-between">
                        <select name="estado" class="w-full bg-[#059212] font-extrabold text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                            <option value="" selected>Seleccione una opcion</option>
                            <option value="activos">Activos</option>
                            <option value="inactivos">Inactivos</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tarjeta Instructores -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
            <div class="flex p-4">
                <!-- Contenedor de la imagen -->
                <div class="w-[4rem] h-20 overflow-hidden mr-4">
                    <img src="{{ asset('images/logoIns.svg') }}" alt="LogoIns" class="w-full h-full object-contain">
                </div>
                <!-- Título -->
                <div class="flex flex-col justify-center">
                    <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">INSTRUCTORES</strong>
                </div>
            </div>
            <div class="px-4 pb-6">
                <!-- Total de aprendices -->
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Instructores Activos: {{ $instructoresActivos }}</h1>
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Instructores Inactivos: {{ $instructoresInactivos }}</h1>                <!-- Botón -->
                <form action="{{ url('instructor') }}" method="GET" class="mb-4">
                    <div class="flex items-center justify-between">
                        <select name="estado" class="w-full bg-[#059212] font-extrabold text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                            <option value="" selected>Seleccione una opcion</option>
                            <option value="activos">Activos</option>
                            <option value="inactivos">Inactivos</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tarjeta Empresas -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
            <div class="flex p-4">
                <!-- Contenedor de la imagen -->
                <div class="w-[4rem] h-20 overflow-hidden mr-4">
                    <img src="{{ asset('images/logoEmpre.svg') }}" alt="logoEmpre" class="w-full h-full object-contain">
                </div>
                <!-- Título -->
                <div class="flex flex-col justify-center">
                    <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">EMPRESAS</strong>
                </div>
            </div>
            <div class="px-4 pb-6">
                <!-- Total de aprendices -->
                <!-- Botón -->
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Empresas Activas: {{ $empresasActivas }}</h1>
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Empresas Inactivas: {{ $empresasInactivas }}</h1>                <!-- Botón -->
                <form action="{{ url('empresa') }}" method="GET" class="mb-4">
                    <div class="flex items-center justify-between">
                        <select name="estado" class="w-full bg-[#059212] font-extrabold text-white border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" onchange="this.form.submit()">
                            <option value="" selected>Seleccione una opcion</option>
                            <option value="activos">Activos</option>
                            <option value="inactivos">Inactivos</option>
                        </select>
                    </div>
                </form>

            </div>
        </div>

        <!-- Tarjeta Dashboard -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212] mb-12 sm:mb-0">
            <div class="flex p-4">
                <!-- Contenedor de la imagen -->
                <div class="w-[4rem] h-20 overflow-hidden mr-4">
                    <img src="{{ asset('images/logoDash.svg') }}" alt="LogoDash" class="w-full h-full object-contain">
                </div>
                <!-- Título -->
                <div class="flex flex-col justify-center">
                    <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">DASHBOARD</strong>
                </div>
            </div>
            <div class="px-4 pb-6">
                <!-- Botón -->
                <button class="w-full bg-[#059212] hover:bg-green-600 text-xl text-white font-bold py-2 rounded-lg mt-20">
                <a href="https://lookerstudio.google.com/u/5/reporting/a27c4811-31ec-49ac-a716-3c754c218ca8/page/LE0YE">
                    Ver Detalle
                </a>
                </button>
            </div>
        </div>

        @endif

    </div>
</main>


@endsection

@include('layouts.footer')

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
