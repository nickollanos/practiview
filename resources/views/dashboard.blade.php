@extends('layouts.app')
@section('title', 'DASHBOARD')
@section('class', 'DASHBOARD')

@section('content')

<!-- Primer Navbar -->
<nav class="bg-white shadow p-6 flex justify-center">
    <div class="flex space-x-4">
        <img src="{{ asset('images/sena.png') }}" alt="Logo 1" class="h-20">
        <img src="{{ asset('images/practilogo.png') }}" alt="Logo 2" class="h-20">
    </div>
</nav>

<!-- Segundo Navbar -->
<nav class="bg-[#5eb319] p-4 flex items-center">
    <div class="flex-none">
        <button class="bg-white border border-gray-300 text-gray-700 rounded-md px-6 py-2 font-sans">
            Menu
        </button>
        <div class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden">
            <ul>
                <li class="px-4 py-2 hover:bg-gray-100">Opción 1</li>
                <li class="px-4 py-2 hover:bg-gray-100">Opción 2</li>
                <li class="px-4 py-2 hover:bg-gray-100">Opción 3</li>
                <li class="px-4 py-2 hover:bg-gray-100">Opción 4</li>
                <li class="px-4 py-2 hover:bg-gray-100">Opción 5</li>
            </ul>
        </div>
    </div>

    <div class="flex-1 flex justify-center">
        <div class="relative w-full max-w-md">
            <input type="text" placeholder="Buscar..." class="border border-gray-300 rounded-md px-4 py-2 pr-10 w-full">
            <i class="fa-solid fa-magnifying-glass absolute right-3 top-1/2 transform -translate-y-1/2 h-5 w-5"></i>
        </div>
    </div>

    <div class="flex-none flex items-center relative">
        <i class="fa-solid fa-bell text-2xl text-white hover:text-gray-300 mr-4"></i>
        <img src="{{ asset('images/user.png') }}" alt="Perfil" class="h-8 w-8 rounded-full cursor-pointer"
            id="user-menu-button">

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



</nav>

<!-- Contenido -->
<main class="flex-grow container mx-auto my-4">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 border border-gray-300">Item</th>
                <th class="py-2 border border-gray-300">Descripción</th>
                <th class="py-2 border border-gray-300">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 border border-gray-300">Item 1</td>
                <td class="py-2 border border-gray-300">Descripción 1</td>
                <td class="py-2 border border-gray-300">$10</td>
            </tr>
            <tr>
                <td class="py-2 border border-gray-300">Item 2</td>
                <td class="py-2 border border-gray-300">Descripción 2</td>
                <td class="py-2 border border-gray-300">$20</td>
            </tr>
            <tr>
                <td class="py-2 border border-gray-300">Item 3</td>
                <td class="py-2 border border-gray-300">Descripción 3</td>
                <td class="py-2 border border-gray-300">$30</td>
            </tr>
            <tr>
                <td class="py-2 border border-gray-300">Item 4</td>
                <td class="py-2 border border-gray-300">Descripción 4</td>
                <td class="py-2 border border-gray-300">$40</td>
            </tr>
            <tr>
                <td class="py-2 border border-gray-300">Item 5</td>
                <td class="py-2 border border-gray-300">Descripción 5</td>
                <td class="py-2 border border-gray-300">$50</td>
            </tr>
        </tbody>
    </table>
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
</script>
@endsection