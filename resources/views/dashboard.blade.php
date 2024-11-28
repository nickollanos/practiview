@extends('layouts.app')
@section('title', 'DASHBOARD')
@section('class', 'DASHBOARD')

@section('content')

<!-- Navbar -->
<nav class="bg-white p-2 fixed top-0 left-0 w-full z-10 shadow-md">
    <!-- Contenedor de todo el navbar -->
    <div class="flex items-center justify-between w-full">

        <!-- Logo a la izquierda -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/sena.png') }}" alt="LogoSena" class="w-12 h-12">
        </div>

        <!-- Contenedor para los logos a la derecha -->
        <div class="flex items-center space-x-6">
            <!-- Contenedor para el logo de notificaciones -->
            <div class="flex items-center">
                <img src="{{ asset('images/logoNoti.svg') }}" alt="LogoNoti" class="w-10 h-10 rounded-full">
            </div>

            <!-- Contenedor para el logo de usuario con menú desplegable -->
            <div class="flex items-center relative">
                <img src="{{ asset('images/logoUser.svg') }}" alt="LogoUser" class="w-10 h-10 rounded-full cursor-pointer" id="user-menu-button">

                <!-- Menú desplegable del usuario -->
                <div class="absolute right-0 top-full mt-2 w-48 bg-white shadow-lg rounded-md hidden" id="user-menu">
                    <div class="px-4 py-2">
                        <h2 class="font-bold">Nombre de Usuario</h2>
                        <h2 class="text-gray-600">Rol: Administrador</h2>
                    </div>
                    <ul>
                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"><a href="/mi-perfil">Mi perfil</a></li>
                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"><a href="/menu-principal">Menú principal</a></li>
                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            <form id="logout" action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="w-full text-left">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</nav>

<!-- Main Content (con margen superior suficiente para el navbar fijo) -->
<main class="container mx-auto px-4 py-8 mt-20">
    <!-- Tarjetas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Aprendices: 15</h1>
                <!-- Botón -->
                <button class="w-full bg-[#059212] hover:bg-green-600 text-xl text-white font-bold py-2 rounded-lg">
                <a href="{{url('aprendiz.index')}}">
                    Ver Detalle
                </a>
                </button>
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
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Instructores: 15</h1>
                <!-- Botón -->
                <button class="w-full bg-[#059212] hover:bg-green-600 text-xl text-white font-bold py-2 rounded-lg">
                <a href="{{url('aprendiz.index')}}">
                    Ver Detalle
                </a>
                </button>
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
                <h1 class="text-[17px] font-bold mb-4 font-poppins text-[#0C0C0C] text-opacity-70">Total Empresas: 15</h1>
                <!-- Botón -->
                <button class="w-full bg-[#059212] hover:bg-green-600 text-xl text-white font-bold py-2 rounded-lg">
                <a href="{{url('aprendiz.index')}}">
                    Ver Detalle
                </a>
                </button>
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
                <button class="w-full bg-[#059212] hover:bg-green-600 text-xl text-white font-bold py-2 rounded-lg mt-10">
                <a href="{{url('aprendiz.index')}}">
                    Ver Detalle
                </a>
                </button>
            </div>
        </div>
    </div>
</main>


@endsection

@section('footer')
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
