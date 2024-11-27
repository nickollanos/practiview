@extends('layouts.app')
@section('title', 'WELCOME')
@section('class', 'WELCOME')

@section('content')

<!-- Contenido -->
<main class="flex-grow container mx-auto flex flex-col items-center justify-center space-y-4 min-h-screen px-4">
    <!-- Tarjeta centrada -->
    <div class="bg-white bg-opacity-60 shadow-lg rounded-lg p-6 w-full max-w-md min-h-[25rem] flex flex-col items-center justify-center space-y-4 border border-[#059212] relative">
        <!-- Contenedor de círculos -->
        <div class="absolute top-0 left-0 w-full flex items-center justify-start space-x-2 border-4 border-red-500 p-2 rounded-t-lg bg-white">
            <div class="w-6 h-6 bg-[#059212] rounded-full"></div>
            <div class="w-6 h-6 bg-[#06D001] rounded-full"></div>
            <div class="w-6 h-6 bg-[#9BEC00] rounded-full"></div>
            <div class="w-6 h-6 bg-[#F3FF90] rounded-full"></div>
        </div>

        <!-- Mensaje de bienvenida -->
        <h1 class="font-pompiere text-[2rem] sm:text-[4rem] text-center text-[#059212]">BIENVENIDO A PRACTIVIEW</h1>

        <!-- Logo -->
        <img src="{{ asset('images/logo.svg') }}" alt="Logo Practiview" class="w-20 h-20 sm:w-24 sm:h-24">

        <!-- Botón de ingresar -->
        <button class="bg-[#059212] hover:bg-green-500 font-poppins text-white font-bold py-2 px-10 sm:px-14 rounded focus:outline-none focus:shadow-outline w-full sm:w-auto">
            <a href="{{url('login')}}">
            Ingresar
            </a>
        </button>
    </div>
</main>


@endsection

@section('footer')
@endsection

@section('js')
@endsection