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
                <img src="{{ asset('images') . '/' . Auth::user()->foto_perfil }}" alt="LogoUser"
                    class="w-10 h-10 rounded-full cursor-pointer border-[3px] border-solid border-[#059212]" id="user-menu-button">

                <!-- Menú desplegable del usuario -->
                <div class="absolute right-0 top-full mt-2 w-48 bg-white shadow-lg rounded-md hidden" id="user-menu">
                    <div class="px-4 py-2">
                        <h2 class="font-bold">{{ Auth::user()->nombre }}</h2>
                        <h2 class="text-gray-600">Rol: {{ Auth::user()->perfiles->first()->perfil }}</h2>
                    </div>
                    <ul>
                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"><a href="/mi-perfil">Mi perfil</a></li>
                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"><a href="{{ url('dashboard') }}">Menú
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
