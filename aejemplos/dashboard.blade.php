@extends('layouts.app')
@section('title', 'DASHBOARD-APRENDIZ')
@section('class', 'DASHBOARD-APRENDIZ')

@section('content')

<!-- Primer Navbar -->
<nav class="bg-white shadow p-6 flex justify-center">
    <div class="flex space-x-4">
        <img src="{{ asset('images/sena.png') }}" alt="Logo 1" class="h-20">
        <img src="{{ asset('images/practilogo.png') }}" alt="Logo 2" class="h-20">
    </div>
</nav>

<!-- Segundo Navbar -->
<nav class="bg-[#5eb319] p-4 flex items-center justify-end">
    <div class="flex items-center">
        <i class="fa-solid fa-bell text-2xl text-white hover:text-gray-300 mr-4"></i>
    </div>

    <div class="flex items-center relative">
        <img src="{{ asset('images/user.png') }}" alt="Perfil" class="h-8 w-8 rounded-full cursor-pointer"
            id="user-menu-button">
        <div class="absolute right-0 top-full mt-2 w-48 bg-white shadow-lg rounded-md hidden" id="user-menu">
            <div class="px-4 py-2">
                <h2 class="font-bold">Nombre de Usuario</h2>
                <h2 class="text-gray-600">Rol: Aprendiz</h2>
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
</nav>
<!-- Contenido -->
<main class="flex-grow container mx-auto my-4 items-center flex justify-center">

    <!--tarjetas-->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <!--bitacora-->
        <div class="bg-white border border-gray-300 rounded-lg p-4 flex flex-col relative w-[19rem] h-48 mr-4 shadow-lg">

            <div class="flex items-start mb-2">
                <div class="bg-[#5eb319] text-white rounded-full w-10 h-10 flex items-center justify-center mr-10">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                <div class="items-center">
                    <h2 class="text-lg font-semibold">BITACORA</h2>
                </div>
            </div>

            <div class="flex flex-col mt-auto">
                <p class="text-gray-900 mb-4">TOTAL BITACORAS: 10</p>
                <div class="flex items-center space-x-4">
                    <div class="relative flex-1">
                        <button
                            class="flex-1 justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-[#5eb319] text-sm font-medium text-white hover:bg-[#4d6d33] focus:outline-none mr-4"
                            title="CLICK PARA AÑADIR">
                            <i class="fa-solid fa-file-circle-plus"></i>
                        </button>
                        <button onclick="toggleDropdown('dropdown1')"
                            class="flex-1 justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-[#5eb319] text-sm font-medium text-white hover:bg-[#4d6d33] focus:outline-none"
                            title="CLICK PARA LISTAR">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <div id="dropdown1"
                            class="hidden absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <div class="py-1" role="none">
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300">Todos los
                                    aprendices</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300">Por programa
                                    de formación</a>
                                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-300">Por
                                    ficha</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--instructores-->
        <div class="bg-white border border-gray-300 rounded-lg p-4 flex flex-col relative w-[19rem] h-48 mr-4 shadow-lg">

            <div class="flex items-start mb-2">
                <div class="bg-[#5eb319] text-white rounded-full w-10 h-10 flex items-center justify-center mr-10">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="items-center">
                    <h2 class="text-lg font-semibold">VISITAS ETAPA PRACTICA</h2>
                </div>
            </div>

            <div class="flex flex-col mt-auto">
                <p class="text-gray-900 mb-4">VISITAS REALIZADAS 1 DE 3</p>
                <div class="flex items-center space-x-4">
                    <div class="relative flex-1">
                        <button
                            class="flex-1 justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-[#5eb319] text-sm font-medium text-white hover:bg-[#4d6d33] focus:outline-none mr-4"
                            title="CLICK PARA LISTAR">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--empresas-->
        <div class="bg-white border border-gray-300 rounded-lg p-4 flex flex-col relative w-[19rem] h-48 mr-4 shadow-lg">

            <div class="flex items-start mb-2">
                <div class="bg-[#5eb319] text-white rounded-full w-12 h-10 flex items-center justify-center mr-10">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <div class="items-center">
                    <h2 class="text-lg font-semibold">INSTRUCTOR DE SEGUIMIENTO</h2>
                </div>
            </div>

            <div class="flex flex-col mt-auto">
                <div class="flex items-center space-x-4">
                    <div class="relative flex-1">
                        <button
                            class="flex-1 justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-[#5eb319] text-sm font-medium text-white hover:bg-[#4d6d33] focus:outline-none mr-4"
                            title="CLICK PARA DETALLES">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>
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
    document.querySelector('button').addEventListener('click', function () {
        const menu = document.querySelector('div.absolute');
        menu.classList.toggle('hidden');
    });

    // Script para mostrar/ocultar el menú desplegable
    // document.getElementById('user-menu-button').addEventListener('click', function () {
    //     const menu = document.getElementById('user-menu');
    //     menu.classList.toggle('hidden');
    // });

    userMenuButton.addEventListener('click', function () {
        userMenu.classList.toggle('hidden');
    });

    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener('click', function (event) {
        if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });

    //dropdown  de tarjetas
    function toggleDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }
</script>
@endsection