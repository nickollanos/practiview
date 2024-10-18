@extends('layouts.app')
@section('title', 'WELCOME')
@section('class', 'WELCOME')

@section('content')

    <!-- Primer Navbar -->
    <nav class="bg-white shadow p-6 flex justify-between items-center">
        <div class="flex-grow flex justify-center space-x-4">
            <img src="{{ asset('images/sena.png') }}" alt="Logo 1" class="h-20">
            <img src="{{ asset('images/practilogo.png') }}" alt="Logo 2" class="h-20">
        </div>
        <div class="flex space-x-4">
            <a href="{{url('login')}}"
                class="bg-[#5eb319] text-white rounded-md px-6 py-3 hover:bg-green-600 transition">Login</a>
            <a href="{{url('register')}}"
                class="bg-[#5eb319] text-white rounded-md px-6 py-3 hover:bg-green-600 transition">Register</a>
        </div>
    </nav>

    <!-- Contenido -->
    <main class="flex-grow container mx-auto flex flex-col items-center justify-center space-y-4">
        <h1 class="text-3xl font-bold">Bienvenido a Practiview</h1>
    </main>
    @endsection

    @section('footer')
    @endsection

    @section('js')
    @endsection
