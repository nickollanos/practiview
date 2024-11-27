@extends('layouts.app')
@section('title', 'CREAR-INSTRUCTOR')
@section('class', 'CREAR-INSTRUCTOR')

@section('content')

<main class="container flex items-start justify-center mb-8">
    <div class="flex flex-col items-center justify-center w-full py-8">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto mt-8 mb-8 sm:mb-0 border border-solid border-[#059212]">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if (count($errors->all()) > 0)
                <ul class="text-red-500 text-sm mb-4">
                    @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Campo Foto de perfil-->
                <div class="flex justify-center mb-4">
                    <div class="w-[8rem] h-[8rem] sm:w-[12rem] sm:h-[12rem] overflow-hidden relative">
                        <!-- Imagen predeterminada -->
                        <img id="upload" class="w-full h-full object-cover rounded-full" src="{{ asset('images/logoCamera.svg') }}" alt="Perfil">

                        <!-- Border -->
                        <img class="w-full h-full object-cover rounded-full z-0 absolute top-0 left-0" id="border" src="{{ asset('images/border-camera.svg') }}" alt="Border">

                        <!-- Input de selección de archivo, oculta pero sobrepuesta -->
                        <input id="photo" type="file" name="foto_perfil" accept="image/*" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20">
                    </div>
                </div>

                <!-- Campo Nombre -->
                <div class="bg-[#EBE9D6] mt-4 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                    <div class="p-2">
                        <img src="{{ asset('images/ico-nombre.svg') }}" alt="Nombre" class="w-10 h-10">
                    </div>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" required
                        class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                </div>

                <!-- Tipo de documento -->
                <div class="bg-[#EBE9D6] mt-4 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                    <div class="p-2">
                        <img src="{{ asset('images/ico-documento.svg') }}" alt="Document" class="c">
                    </div>
                    <select name="tipo_documento_id" id="tipo_documento_id" required
                        class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                        <option value="">Tipo de Documento</option>
                        <option value="CC">Cedula de Ciudadania</option>
                        <option value="CE">Cedula de Extranjeria</option>
                        <option value="PP">Pasaporte</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="RC">Registro Civil</option>
                    </select>
                </div>

                <!-- numero documento -->
                <div class="bg-[#EBE9D6] mt-4 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                    <div class="p-2">
                        <img src="{{ asset('images/ico-doc.svg') }}" alt="doc" class="w-8 h-10">
                    </div>
                    <input type="text" name="numero_documento" id="numero_documento" placeholder="Número de Documento" required
                        class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                </div>

                <!-- Campo Fecha nacimiento -->
                <div class="bg-[#EBE9D6] mt-4 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                    <div class="p-2">
                        <img src="{{ asset('images/ico-fecha.svg') }}" alt="fecha" class="w-10 h-10">
                    </div>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" required
                        class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                </div>

                <!-- Campo Numero de telefono -->
                <div class="bg-[#EBE9D6] mt-4 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                    <div class="p-2">
                        <img src="{{ asset('images/ico-telefono.svg') }}" alt="telefono" class="w-8 h-8">
                    </div>
                    <input type="text" name="telefono" id="telefono" placeholder="Número de Teléfono" required
                        class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                </div>

                <!-- Campo Correo -->
                <div class="bg-[#EBE9D6] mt-4 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                    <div class="p-2">
                        <img src="{{ asset('images/ico-emails.svg') }}" alt="email" class="w-8 h-8">
                    </div>
                    <input type="email" name="email" id="email" placeholder="Correo Electrónico" required
                        class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                </div>

                <!-- Campo Sexo -->
                <div class="bg-[#EBE9D6] mt-4 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                    <div class="p-2">
                        <img src="{{ asset('images/ico-sexo.svg') }}" alt="sexo" class="v">
                    </div>
                    <select name="sexo_id" id="sexo_id" required
                        class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                        <option value="">Sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femennino</option>
                        <option value="O">Otros</option>
                    </select>
                </div>

                <!-- Botón Ingresar -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-[#059212] hover:bg-green-700 text-white font-bold font-poppins py-2 px-4 rounded focus:outline-none focus:shadow-outline w-[15rem]">
                        Agregar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>


@endsection

@section('footer')
@endsection

@section('js')
<script>
    const photoInput = document.getElementById('photo');
    const uploadImage = document.getElementById('upload');

    // Escuchar el evento cuando el usuario selecciona una foto
    photoInput.addEventListener('change', function(event) {
        const file = event.target.files[0]; // Obtén el archivo seleccionado

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Establecer la imagen seleccionada como el src de la imagen de perfil
                uploadImage.src = e.target.result;
            }

            // Leer el archivo como una URL
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection