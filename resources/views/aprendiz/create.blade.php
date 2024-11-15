@extends('layouts.app')
@section('title', 'DASHBOARD-CREAR-APRENDIZ')
@section('class', 'DASHBOARD-CREAR-APRENDIZ')

@section('content')

<!-- Primer Navbar -->
<nav class="bg-white shadow p-6 flex justify-center">
    <div class="flex space-x-4">
        <img src="{{ asset('images/sena.png') }}" alt="Logo 1" class="h-20">
        <img src="{{ asset('images/practilogo.png') }}" alt="Logo 2" class="h-20">
    </div>
</nav>

<!-- Segundo Navbar -->
<nav class="bg-[#5eb319] p-4 flex items-center justify-between">
    <div class="flex items-center">
        <a href="{{ url('dashboard') }}">
            <i class="fa-solid fa-circle-arrow-left text-2xl text-white hover:text-gray-300 mr-4" title="atras"></i>
        </a>
    </div>
    <div class="flex items-center">
        <div class="flex items-center">
            <i class="fa-solid fa-bell text-2xl text-white hover:text-gray-300 mr-4"></i>
        </div>

        <div class="flex items-center relative">
            <img src="{{ asset('images/user.png') }}" alt="Perfil" class="h-8 w-8 rounded-full cursor-pointer"
                id="user-menu-button">
            <div class="absolute right-0 top-full mt-2 w-48 bg-white shadow-lg rounded-md hidden" id="user-menu">
                <div class="px-4 py-2">
                    <h2 class="font-bold">Nombre de Usuario</h2>
                    <h2 class="text-gray-600">Rol: Administrador</h2>
                </div>
                <ul>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"><a href="/mi-perfil">Mi perfil</a></li>
                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"><a href="{{ route('dashboard') }}">Menú principal</a></li>
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

<!-- Contenido -->

<!-- Contenido -->
<main class="flex-grow container mx-auto my-4 flex items-center justify-center">
    <form class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-sm" action="{{ route('aprendiz.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (count($errors->all()) > 0)
        <ul class="text-red-500">
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        <h2 class="text-2xl font-bold mb-6 text-center">Crear Aprendiz</h2>

        <div class="flex flex-col items-center mb-4">
            <div class="relative">
                <img id="upload" class="absolute top-2 left-2 h-40 w-40 z-10 rounded-lg"
                    src="{{ asset('images/bg-upload-photo.svg') }}" alt="Photo">
                <img class="h-44 w-auto z-0" id="border" src="{{ asset('images/shape-border-photo.svg') }}"
                    alt="Border">
                <input id="photo" type="file" name="foto_perfil" accept="image/*"
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20">
            </div>
            <div class="mt-2">
                <label id="label" class="form-label" for="photo">Foto de perfil:</label>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombres:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Tu nombre completo" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="apellido">Apellidos:</label>
            <input type="text" name="apellido" id="apellido" placeholder="Tu apellido completo" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="tipo_documento_id">Tipo de documento:</label>
            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-gray-300 focus:ring focus:ring-blue-200 text-left"
                name="tipo_documento_id" id="tipo_documento_id">
                <option value="0">Select...</option>
                @foreach ($tipo_documentos as $tipo_documento )
                <option value="{{ $tipo_documento->id }}">{{ $tipo_documento->tipo }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="numero_documento">Numero de Documento:</label>
            <input type="text" name="numero_documento" id="numero_documento" placeholder="Tu numero de documento" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Tu numero de documento" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">Numero de Telefono:</label>
            <input type="text" name="telefono" id="telefono" placeholder="Tu numero de telefono" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo:</label>
            <input type="text" name="email" id="email" placeholder="Tu correo electronico" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700" for="sexo">SEXO:</label>
            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-gray-300 focus:ring focus:ring-blue-200 text-left"
                name="sexo" id="sexo">
                <option value=""> Select... </option>
                @foreach($sexos as $sexo)
                <option value="{{ $sexo->id }}"> {{ $sexo->nombre }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">Direccion:</label>
            <input type="text" name="direccion" id="direccion" placeholder="Tu direccion" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="••••••••" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Confirmar
                Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex flex-col items-center mb-4">
            <div class="relative">
                <img id="upload1" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-[55px] w-[178px]  rounded-lg"
                    src="{{ asset('images/signature.svg') }}" alt="Photo">
                <img class="h-[70px] w-[190px] z-0" id="border1" src="{{ asset('images/borde-signature.svg') }}"
                    alt="Border1">
                <input id="photo1" type="file" name="firma" accept="image/*"
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20">
                <input type="hidden" name="originphoto">
            </div>
            <div class="mt-2">
                <label id="label" class="form-label" for="firma">Firma:</label>
            </div>
        </div>

        <div class="flex flex-col items-center">
            <button type="submit"
                class="bg-[#5c972c] hover:bg-[#5c972c] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4">
                CREAR
            </button>
        </div>

    </form>
</main>

@endsection

@section('footer')
@endsection

@section('js')
<script>
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    // Script para mostrar/ocultar el menú desplegable
    document.querySelector('button').addEventListener('click', function() {
        const menu = document.querySelector('div.absolute');
        menu.classList.toggle('hidden');
    });

    // Script para mostrar/ocultar el menú desplegable
    // document.getElementById('user-menu-button').addEventListener('click', function () {
    //     const menu = document.getElementById('user-menu');
    //     menu.classList.toggle('hidden');
    // });

    userMenuButton.addEventListener('click', function() {
        userMenu.classList.toggle('hidden');
    });

    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.classList.add('hidden');
        }
    });

    //dropdown  de tarjetas
    function toggleDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle('hidden');
    }

    //------------script para subir foto de perfil-------//
    document.getElementById('photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('upload').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    //------------script para subir foto de firma-------//
    document.getElementById('photo1').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('upload1').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection