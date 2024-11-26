@extends('layouts.app')
@section('title', 'WELCOME')
@section('class', 'WELCOME')

@section('content')

<h1 class="font-Pompiere text-[4rem] text-center text-[#922105]">BIENVENIDO A PRACTIVIEW</h1>
<!-- Contenido -->
<main class="flex-grow container mx-auto flex flex-col items-center justify-center space-y-4 min-h-screen">
    <!-- Tarjeta centrada -->
    <div class="bg-white bg-opacity-60 shadow-lg rounded-lg p-6 w-full max-w-md min-h-[25rem] flex flex-col items-center justify-center space-y-4 border border-[#059212]">
        <!-- Mensaje de bienvenida -->
        <h1 class="font-pompiere text-[4rem] text-center text-[#059212]">BIENVENIDO A PRACTIVIEW</h1>

        <!-- Botón de ingresar -->
        <button class="bg-[#059212] hover:bg-green-500 font-poppins font-400 text-white font-bold py-2 px-14 rounded focus:outline-none focus:shadow-outline w-full sm:w-auto">
            Ingresar
        </button>
    </div>
</main>


@endsection

@section('footer')
@endsection

@section('js')
@endsection