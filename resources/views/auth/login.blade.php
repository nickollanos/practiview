@extends('layouts.app')
@section('title', 'LOGIN')
@section('class', 'LOGIN')

@section('content')

<main class="container flex items-center justify-center">
    <form class="bg-white shadow-lg rounded-lg px-6 pt-4 pb-8 w-[90%] max-w-md sm:w-[25rem] border border-[#059212] mx-auto mt-8 mb-8" action="{{ route('login') }}"
        method="POST">
        @csrf
        @if ( count( $errors->all()) > 0 )
        @foreach ( $errors->all() as $message )
        <li> {{ $message }} </li>
        @endforeach
        @endif
        <!-- Imagen en círculo -->
        <div class="flex justify-center">
            <div class="w-[8rem] h-[8rem] sm:w-[12rem] sm:h-[12rem] overflow-hidden">
                <img src="{{ asset('images/logo.svg') }}" alt="Perfil" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Campo Correo -->
        <div class="bg-[#EBE9D6] mt-4 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300">
            <div class="p-2">
                <img src="{{ asset('images/ico-email.svg') }}" alt="Email Icon" class="w-6 h-6">
            </div>
            <input type="email" name="email" id="email" placeholder="Correo" required
                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
        </div>

        <!-- Campo Contraseña con ícono de ojo -->
        <div class="bg-[#EBE9D6] mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 relative">
            <div class="p-2">
                <img src="{{ asset('images/ico-lock.svg') }}" alt="Password Icon" class="w-6 h-6">
            </div>
            <input type="password" name="password" id="password" placeholder="Contraseña" required
                class="bg-[#EBE9D6] flex-1 py-2 px-3 text-gray-700 leading-tight focus:outline-none border-none">
            <div class="p-2 cursor-pointer">
                <img src="{{ asset('images/open-eye.svg') }}" alt="Toggle Password" id="eyeIcon" class="absolute right-2 top-2 w-6 h-6 cursor-pointer" onclick="togglePassword()">
            </div>
        </div>

        <!-- reCAPTCHA -->
        <div class="mb-4 flex justify-center">
            <div id="recaptcha" class="w-full">
                <div class="bg-[#EBE9D6] p-4 rounded text-center text-gray-500">
                    <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.site_key') }}"></div>
                </div>
            </div>
        </div>

        <!-- Enlace de recuperación -->
        <div class="mb-4 text-center">
            <a href="#" class="inline-block align-baseline font-bold text-sm text-gray-700 hover:text-gray-400">
                ¿Olvidaste tu contraseña?
            </a>
        </div>

        <!-- Botón Ingresar -->
        <div class="flex justify-center">
            <button type="submit"
                class="bg-[#059212] hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-[15rem]">
                Ingresar
            </button>
        </div>
    </form>


</main>

@endsection


@section('js')
<script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon"); // Asegúrate de que sea una etiqueta <img>

        if (passwordInput.type === "password") {
            // Cambiar a tipo texto
            passwordInput.type = "text";
            // Cambiar la imagen del ojo (cerrado)
            eyeIcon.setAttribute('src', '{{ asset("images/close-eye.svg") }}');
        } else {
            // Cambiar a tipo contraseña
            passwordInput.type = "password";
            // Cambiar la imagen del ojo (abierto)
            eyeIcon.setAttribute('src', '{{ asset("images/open-eye.svg") }}');
        }
    }

    //--------------------------------------
</script>
@endsection