@extends('layouts.app')
@section('title', 'SHOW-APRENDIZ')
@section('class', 'SHOW-APRENDIZ')

@section('content')

    <!-- Navbar -->
    @include('layouts.nav')

    <main class="container flex items-start justify-center mt-16 mb-16 min-h-screen">
        <div
            class="bg-white shadow-lg rounded-lg p-6 w-3/4 sm:w-3/4 md:w-2/3 lg:w-1/2 mx-auto mt-8 mb-8 border border-solid border-[#059212]">
            <!-- Imagen en círculo -->
            <div class="flex justify-center mb-8">
                <div
                    class="w-[8rem] h-[8rem] sm:w-[12rem] sm:h-[12rem] overflow-hidden rounded-full border-[3px] border-solid border-[#059212]">
                    <img src="{{ asset('images/' .  $usuario->foto_perfil) }}" alt="Perfil" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Tarjeta con dos columnas -->
            <div class="bg-gray-50 p-4 rounded-lg mt-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Columna 1 -->
                    <div class="flex flex-col space-y-4">
                        <!-- Tarjeta nombre -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">NOMBRE:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ ucwords($usuario->nombre) }}</h1>
                        </div>
                        <!-- Tarjeta tipo documento -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">TIPO
                                DOCUMENTO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ $usuario->tipo_documento[0]['detalle'] }}</h1>
                        </div>
                        <!-- Tarjeta Numero telefono-->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">TELEFONO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ $usuario->telefono }}
                            </h1>
                        </div>
                        <!-- Tarjeta sexo -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">SEXO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ ucwords($usuario->sexo[0]['nombre']) }}
                            </h1>
                        </div>
                        <!-- Tarjeta Fecha de Nacimiento -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">FECHA
                                DE NACIMIENTO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ $fechaNacimiento }}
                            </h1>
                        </div>
                        <!-- Tarjeta Ficha -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">FICHA:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ $numero_ficha->numero_ficha }}
                            </h1>
                        </div>
                    </div>


                    <!-- Columna 2 -->
                    <div class="flex flex-col space-y-4">
                        <!-- Tarjeta apellido -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">APELLIDO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ ucwords($usuario->apellido) }}</h1>
                        </div>
                        <!-- Tarjeta Numero documento -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">NUMERO
                                DE DOCUMENTO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ $usuario->numero_documento }}
                            </h1>
                        </div>
                        <!-- Tarjeta correo -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">CORREO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">
                                {{ $usuario->email }}</h1>
                        </div>
                        <!-- Tarjeta Direccion-->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">DIRECCION:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ $direccion }}</h1>
                        </div>
                        <!-- Tarjeta Edad -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">EDAD:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">{{ $edad }} Años
                            </h1>
                        </div>
                        <!-- Tarjeta Programa de formacion -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">PROGRAMA DE FORMACION:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center"> {{ $siglas_programa->siglas ?: 'Sin programa' }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón "Regresar" -->
            <div class="mt-8 flex justify-center">
                <button
                    class="px-12 py-2 bg-[#059212] text-white font-semibold rounded-lg shadow-md hover:bg-[#047a0c] transition duration-300">
                    <a href="{{ url()->previous() }}">
                        Regresar
                    </a>
                </button>
            </div>
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
