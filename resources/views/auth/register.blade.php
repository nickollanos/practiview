@extends('layouts.app')
@section('title', 'REGISTER')
@section('class', 'REGISTER')

@section('content')
<!-- Primer Navbar -->
<nav class="bg-white shadow p-6 flex justify-center">
    <div class="flex space-x-4">
        <img src="{{ asset('images/sena.png') }}" alt="Logo 1" class="h-20">
        <img src="{{ asset('images/practilogo.png') }}" alt="Logo 2" class="h-20">
    </div>
</nav>

<!-- Contenido -->
<main class="flex-grow container mx-auto my-4 flex items-center justify-center">
    <form class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-sm" action="{{ route('register') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (count($errors->all()) > 0)
        <ul class="text-red-500">
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        <h2 class="text-2xl font-bold mb-6 text-center">Registrarse</h2>

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
                <option value="1">Cedula de Ciudadania</option>
                <option value="2">Cedula de Extranjeria</option>
                <option value="3">Tarjeta de Identidad</option>
                <option value="4">Pasaporte</option>
                <option value="5">Registro Civil</option>
                <option value="6">Nit</option>
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
                <option value="">Select...</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="O">Otros</option>
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
                <img id="upload1"class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-[55px] w-[178px] z-10 rounded-lg"
                    src="{{ asset('images/signature.svg') }}" alt="Photo">
                <img class="h-[70px] w-[190px] z-0" id="border1" src="{{ asset('images/borde-signature.svg') }}"
                    alt="Border1">
                <input id="photo1" type="file" name="firma" accept="image/*"
                    class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20">
            </div>
            <div class="mt-2">
                <label id="label" class="form-label" for="firma">Firma:</label>
            </div>
        </div>

        <div class="flex flex-col items-center">
            <button type="submit"
                class="bg-[#5c972c] hover:bg-[#5c972c] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4">
                Registrarse
            </button>
            <a href="{{url('login')}}"
                class="inline-block align-baseline font-bold text-sm text-gray-700 hover:text-gray-400">
                ¿Ya tienes una cuenta? Inicia sesión
            </a>
        </div>

    </form>
</main>

@endsection

@section('footer')
@endsection

@section('js')
<script>

 //------------script para subir foto de perfil-------//
    document.getElementById('photo').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('upload').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    //------------script para subir foto de firma-------//
    document.getElementById('photo1').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('upload1').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });



</script>
@endsection