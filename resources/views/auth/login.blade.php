@extends('layouts.app')
@section('title', 'LOGIN')
@section('class', 'LOGIN')

@section('content')
<!-- Primer Navbar -->
<nav class="bg-white shadow p-6 flex justify-center">
    <div class="flex space-x-4">
        <img src="{{ asset('images/sena.png') }}" alt="Logo 1" class="h-20">
        <img src="{{ asset('images/practilogo.png') }}" alt="Logo 2" class="h-20">
    </div>
</nav>

<!-- Segundo Navbar -->
<!-- <nav class="bg-[#5eb319] p-4 flex items-center">
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

        <div class="flex-none flex items-center space-x-2">
            <i class="fa-solid fa-bell text-2xl text-white hover:text-gray-300""></i>
            <img src="{{ asset('images/user.png') }}" alt="Perfil" class="h-8 w-8 rounded-full">
        </div>
    </nav> -->

<!-- Contenido -->
<main class="flex-grow container mx-auto my-4 flex items-center justify-center">
    <form class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-sm" action="{{ route('login') }}"
        method="POST">
        @csrf
        @if ( count( $errors->all()) > 0 )
        @foreach ( $errors->all() as $message )
        <li> {{ $message }} </li>
        @endforeach
        @endif
        <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" placeholder="name@company.com" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="••••••••" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex flex-col items-center">
            <div class="flex space-x-4 mb-4">
                <button type="submit"
                    class="bg-[#5eb319] hover:bg-[#5c972c] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Iniciar Sesión
                </button>
                <button type="button"
                    class="bg-[#5eb319] hover:bg-[#5c972c] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    <a href="{{url('register')}}">
                        Registrarse
                    </a>
                </button>
            </div>
            <a href="#" class="inline-block align-baseline font-bold text-sm text-gray-700 hover:text-gray-400">
                ¿Olvidaste tu contraseña?
            </a>
        </div>

    </form>
</main>

@endsection

@section('footer')
@endsection

@section('js')
@endsection
