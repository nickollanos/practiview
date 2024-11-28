@extends('layouts.app')
@section('title', 'INDEX-APRENDIZ')
@section('class', 'INDEX-APRENDIZ')

@section('content')

<!-- Navbar -->
<nav class="bg-white p-2 fixed top-0 left-0 w-full z-10 shadow-md">
    <!-- Contenedor de todo el navbar -->
    <div class="flex items-center justify-between w-full">

        <!-- Logo a la izquierda -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/sena.png') }}" alt="LogoSena" class="w-12 h-12">
        </div>

        <!-- Barra de búsqueda centrada -->
        <div class="flex items-center justify-center flex-1 mx-4">
            <div class="flex items-center bg-white rounded-lg max-w-md w-full border border-solid border-[#059212]">
                <!-- Logo dentro de la barra de búsqueda -->
                <img src="{{ asset('images/ico-search.svg') }}" alt="Buscar" class="w-6 h-6 mr-3">
                <!-- Input de búsqueda -->
                <input type="text" placeholder="Buscar..."
                    class="w-full py-2 px-3 text-gray-700 font-poppins rounded-lg border-none">
            </div>
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

    </div>
</nav>


<!-- Main Content (con margen superior suficiente para el navbar fijo) -->
<main class="container mx-auto px-4 py-2 mt-2 space-y-12 pt-16 pb-16">
    <!-- Tarjetas superiores -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Tarjeta -->
        <div
            class="bg-[#EBE9D6] shadow-lg rounded-lg p-2 flex flex-col items-center border border-solid border-[#059212]">
            <h1 class="text-sm font-bold font-poppins text-[#0C0C0C] text-opacity-50">Cantidad de Fichas Asignadas</h1>
            <strong class="text-3xl font-extraboldfont-poppins text-[#0C0C0C] text-opacity-50">105</strong>
        </div>
        <div
            class="bg-[#EBE9D6] shadow-lg rounded-lg p-2 flex flex-col items-center border border-solid border-[#059212]">
            <h1 class="text-sm font-bold font-poppins text-[#0C0C0C] text-opacity-50">Cantidad de Aprendices Asignados</h1>
            <strong class="text-3xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-50">105</strong>
        </div>
        <div
            class="bg-[#EBE9D6] shadow-lg rounded-lg p-2 flex flex-col items-center border border-solid border-[#059212]">
            <h1 class="text-sm font-bold font-poppins text-[#0C0C0C] text-opacity-50">Cantidad de Aprendices Certificados</h1>
            <strong class="text-3xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-50">105</strong>
        </div>
        <div
            class="bg-[#EBE9D6] shadow-lg rounded-lg p-2 flex flex-col items-center border border-solid border-[#059212]">
            <h1 class="text-sm font-bold font-poppins text-[#0C0C0C] text-opacity-50">Cantidad de Aprendices Cancelados</h1>
            <strong class="text-3xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-50">105</strong>
        </div>
    </div>


    <!-- Botón para agregar aprendiz -->
    <div class="flex items-center justify-center space-x-4">
        <a href="#"
            class="flex items-center bg-white hover:bg-gray-200 font-poppins text-[#0C0C0C] text-opacity-50 font-bold py-2 px-6 rounded-lg border border-solid border-[#059212]">
            <img src="{{ asset('images/add-icon.svg') }}" alt="Agregar" class="w-6 h-6 mr-2">
            <h1 class="text-xl font-bold">Agregar Instructor</h1>
        </a>
    </div>


    <!-- Tarjetas inferiores -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        <!-- Fila 1 -->
        <div class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-4 border border-solid border-[#059212]">
            <!-- Imagen circular -->
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <img src="{{ asset('images/logoUser.svg') }}" alt="Usuario" class="w-full h-full object-cover">
            </div>

            <!-- Información -->
            <div class="flex flex-col space-y-2">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-lg font-bold text-gray-800">Carlos Amparo</h1>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-sm font-medium text-gray-600">Estado: Activo</h1>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.show')}}">
                                <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.edit')}}">
                                <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.delete')}}">
                                <img src="{{ asset('images/delete-icon.svg') }}" alt="Eliminar" class="w-4 h-4">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Repite esta estructura para las demás tarjetas -->
        <div class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-4 border border-solid border-[#059212]">
            <!-- Imagen circular -->
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <img src="{{ asset('images/logoUser.svg') }}" alt="Usuario" class="w-full h-full object-cover">
            </div>

            <!-- Información -->
            <div class="flex flex-col space-y-2">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-lg font-bold text-gray-800">Carlos Amparo</h1>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-sm font-medium text-gray-600">Estado: Activo</h1>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.show')}}">
                                <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.edit')}}">
                                <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.delete')}}">
                                <img src="{{ asset('images/delete-icon.svg') }}" alt="Eliminar" class="w-4 h-4">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Puedes seguir replicando esta estructura para las demás filas y columnas -->
        <div class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-4 border border-solid border-[#059212]">
            <!-- Imagen circular -->
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <img src="{{ asset('images/logoUser.svg') }}" alt="Usuario" class="w-full h-full object-cover">
            </div>

            <!-- Información -->
            <div class="flex flex-col space-y-2">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-lg font-bold text-gray-800">Carlos Amparo</h1>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-sm font-medium text-gray-600">Estado: Activo</h1>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.show')}}">
                                <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.edit')}}">
                                <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.delete')}}">
                                <img src="{{ asset('images/delete-icon.svg') }}" alt="Eliminar" class="w-4 h-4">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-4 border border-solid border-[#059212]">
            <!-- Imagen circular -->
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <img src="{{ asset('images/logoUser.svg') }}" alt="Usuario" class="w-full h-full object-cover">
            </div>

            <!-- Información -->
            <div class="flex flex-col space-y-2">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-lg font-bold text-gray-800">Carlos Amparo</h1>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-sm font-medium text-gray-600">Estado: Activo</h1>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.show')}}">
                                <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.edit')}}">
                                <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.delete')}}">
                                <img src="{{ asset('images/delete-icon.svg') }}" alt="Eliminar" class="w-4 h-4">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-4 border border-solid border-[#059212]">
            <!-- Imagen circular -->
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <img src="{{ asset('images/logoUser.svg') }}" alt="Usuario" class="w-full h-full object-cover">
            </div>

            <!-- Información -->
            <div class="flex flex-col space-y-2">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-lg font-bold text-gray-800">Carlos Amparo</h1>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-sm font-medium text-gray-600">Estado: Activo</h1>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.show')}}">
                                <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.edit')}}">
                                <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.delete')}}">
                                <img src="{{ asset('images/delete-icon.svg') }}" alt="Eliminar" class="w-4 h-4">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-4 border border-solid border-[#059212]">
            <!-- Imagen circular -->
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <img src="{{ asset('images/logoUser.svg') }}" alt="Usuario" class="w-full h-full object-cover">
            </div>

            <!-- Información -->
            <div class="flex flex-col space-y-2">
                <!-- Tarjeta 1 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-lg font-bold text-gray-800">Carlos Amparo</h1>
                </div>

                <!-- Tarjeta 2 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-sm font-medium text-gray-600">Estado: Activo</h1>
                </div>

                <!-- Tarjeta 3 -->
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.show')}}">
                                <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.edit')}}">
                                <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{url('instructor.delete')}}">
                                <img src="{{ asset('images/delete-icon.svg') }}" alt="Eliminar" class="w-4 h-4">
                            </a>
                        </div>
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