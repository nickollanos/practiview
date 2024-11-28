@extends('layouts.app')
@section('title', 'SHOW-ADMIN')
@section('class', 'SHOW-ADMIN')

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
                    <img src="{{ asset('images/logoUser.svg') }}" alt="LogoUser"
                        class="w-10 h-10 rounded-full cursor-pointer" id="user-menu-button">

                    <!-- Menú desplegable del usuario -->
                    <div class="absolute right-0 top-full mt-2 w-48 bg-white shadow-lg rounded-md hidden" id="user-menu">
                        <div class="px-4 py-2">
                            <h2 class="font-bold">Nombre de Usuario</h2>
                            <h2 class="text-gray-600">Rol: Administrador</h2>
                        </div>
                        <ul>
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"><a href="/mi-perfil">Mi perfil</a></li>
                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"><a href="/menu-principal">Menú
                                    principal</a></li>
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

    <main class="container flex items-start justify-center mt-16 mb-16 min-h-screen">
        <div
            class="bg-white shadow-lg rounded-lg p-6 w-3/4 sm:w-3/4 md:w-2/3 lg:w-1/2 mx-auto mt-8 mb-8 border border-solid border-[#059212]">
            <!-- Imagen en círculo -->
            <div class="flex justify-center mb-8">
                <div
                    class="w-[8rem] h-[8rem] sm:w-[12rem] sm:h-[12rem] overflow-hidden rounded-full border-4 border-[#059212]">
                    <img src="{{ asset('images/logo-show.svg') }}" alt="Perfil" class="w-full h-full object-cover">
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
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">Jacinto
                                Pérez</h1>
                        </div>
                        <!-- Tarjeta Numero documento -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">NUMERO
                                DE DOCUMENTO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">1053835356
                            </h1>
                        </div>
                        <!-- Tarjeta Numero telefono-->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">TELEFONO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">3133835356
                            </h1>
                        </div>
                        <!-- Tarjeta sexo -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">SEXO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">a veces
                            </h1>
                        </div>
                    </div>

                    <!-- Columna 2 -->
                    <div class="flex flex-col space-y-4">
                        <!-- Tarjeta tipo documento -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">TIPO
                                DOCUMENTO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">Cedula de
                                Ciudadania</h1>
                        </div>
                        <!-- Tarjeta Fecha de Nacimiento -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">FECHA
                                DE NACIMIENTO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">29/06/1999
                            </h1>
                        </div>
                        <!-- Tarjeta correo -->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">CORREO:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">
                                jacinta@gmail.com</h1>
                        </div>
                        <!-- Tarjeta Direccion-->
                        <div class="bg-[#EBE9D6] shadow-md rounded-lg p-4 border border-solid border-[#059212] w-full">
                            <strong
                                class="block text-sm font-semibold font-poppins text-[#0C0C0C] text-opacity-50 text-center">DIRECCION:</strong>
                            <h1 class="text-lg font-bold font-poppins text-[#0C0C0C] text-opacity-50 text-center">CL 48E1
                                23-23</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón "Regresar" -->
            <div class="mt-8 flex justify-center">
                <button
                    class="px-12 py-2 bg-[#059212] text-white font-semibold rounded-lg shadow-md hover:bg-[#047a0c] transition duration-300">
                    <a href="{{ url('aprendiz.edit') }}">
                        Regresar
                    </a>
                </button>
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
