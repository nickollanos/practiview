@extends('layouts.app')
@section('title', 'EDIT-INSTRUCTOR')
@section('class', 'EDIT-INSTRUCTOR')

@section('content')

    <!-- Navbar -->
    @include('layouts.nav')

    <main class="container flex items-start justify-center mb-8">
        <div class="flex flex-col items-center justify-center w-full py-8">
            <div
                class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto mt-8 mb-8 sm:mb-0 border border-solid border-[#059212]">
                <form action="{{ url('instructor/' . $usuario->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                            <img id="upload" class="w-full h-full object-cover rounded-full"
                                src="{{ asset('images/' . $usuario->foto_perfil) }}" alt="Perfil">

                            <!-- Border -->
                            <img class="w-full h-full object-cover rounded-full z-0 absolute top-0 left-0" id="border"
                                src="{{ asset('images/border-camera.svg') }}" alt="Border">

                            <!-- Input de selección de archivo, oculta pero sobrepuesta -->
                            <input id="photo" type="file" name="foto_perfil" accept="image/*"
                                class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-20"
                                accept="image/png, image/jpeg, image/jpg">

                            <input type="hidden" name="originphoto" value="{{ $usuario->foto_perfil }}">
                        </div>
                    </div>

                    <!-- Campo Nombre -->
                    <div>
                        <div>
                            <label for="nombre" class="text-self font-poppins font-bold mb-1">Nombre:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-nombre.svg') }}" alt="Nombre" class="w-10 h-10">
                            </div>
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none"
                                value="{{ old('nombre', $usuario->nombre) }}">
                        </div>
                    </div>

                    <!-- Campo Apellido -->
                    <div>
                        <div>
                            <label for="nombre" class="text-self font-poppins font-bold mb-1">Apellido:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-nombre.svg') }}" alt="Apellido" class="w-10 h-10">
                            </div>
                            <input type="text" name="apellido" id="apellido" placeholder="Apellido Completo" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none"
                                value="lopez">
                        </div>
                    </div>

                    <!-- Tipo de documento -->
                    <div>
                        <div>
                            <label for="nombre" class="text-self font-poppins font-bold mb-1">Tipo de Documento:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-documento.svg') }}" alt="Document" class="c">
                            </div>
                            <select name="tipo_documento_id" id="tipo_documento_id" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                                @foreach ($tipo_documentos as $tipo_documento)
                                    <option value="{{ $tipo_documento['id'] }}"
                                        @if (old('tipo_documento_id') == $tipo_documento['id']) selected @endif>
                                        {{ $tipo_documento['detalle'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- numero documento -->
                    <div>
                        <div>
                            <label for="numero_documento" class="text-self font-poppins font-bold mb-1">Número de
                                Documento:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-doc.svg') }}" alt="doc" class="w-8 h-10">
                            </div>
                            <input type="text" name="numero_documento" id="numero_documento"
                                placeholder="Número de Documento" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none"
                                value="{{ old('numero_documento', $usuario->numero_documento) }}">
                        </div>
                    </div>

                    <!-- Campo Fecha nacimiento -->
                    <div>
                        <div>
                            <label for="fecha_nacimiento" class="text-self font-poppins font-bold mb-1">Fecha de
                                Nacimiento:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-fecha.svg') }}" alt="fecha" class="w-10 h-10">
                            </div>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                                placeholder="Fecha de Nacimiento" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none"
                                value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}">
                        </div>
                    </div>

                    <!-- Campo Numero de telefono -->
                    <div>
                        <div>
                            <label for="telefono" class="text-self font-poppins font-bold mb-1">Número de Telefono:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-telefono.svg') }}" alt="telefono" class="w-8 h-8">
                            </div>
                            <input type="text" name="telefono" id="telefono" placeholder="Número de Teléfono" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none"
                                value="{{ old('telefono', $usuario->telefono) }}">
                        </div>
                    </div>

                    <!-- Campo Correo -->
                    <div>
                        <div>
                            <label for="email" class="text-self font-poppins font-bold mb-1">Correo
                                Electrónico:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-emails.svg') }}" alt="email" class="w-8 h-8">
                            </div>
                            <input type="email" name="email" id="email" placeholder="Correo Electrónico"
                                required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none"
                                value="{{ old('email', $usuario->email) }}">
                        </div>
                    </div>

                    <!-- Campo Sexo -->
                    <div>
                        <div>
                            <label for="nombre" class="text-self font-poppins font-bold mb-1">Genero:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-2 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-sexo.svg') }}" alt="sexo" class="v">
                            </div>
                            <select name="sexo_id" id="sexo_id" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                                @foreach ($sexos as $sexo)
                                    <option value="{{ $sexo['id'] }} @if (old('sexo_id') == $sexo['id']) selected @endif">
                                        {{ $sexo['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Campo Direccion -->
                    <div>
                        <div>
                            <label for="direccion" class="text-self font-poppins font-bold mb-1">Dirección:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-direccion.svg') }}" alt="direccion" class="w-8 h-8">
                            </div>
                            <input type="text" name="direccion" id="direccion" placeholder="Dirección" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none"
                                value="{{ old('direccion', $direccion) }}">
                        </div>
                    </div>

                    <!-- Campo Rol -->
                    <div>
                        <div>
                            <label for="nombre" class="text-self font-poppins font-bold mb-1">Rol:</label>
                        </div>
                        <div
                            class="bg-[#EBE9D6] mt-1 mb-4 flex items-center border rounded shadow focus-within:ring focus-within:ring-green-300 w-full h-10">
                            <div class="p-2">
                                <img src="{{ asset('images/ico-documento.svg') }}" alt="Document" class="c">
                            </div>
                            <select name="rol" id="rol" required
                                class="bg-[#EBE9D6] w-full py-2 px-3 text-gray-700 font-poppins leading-tight focus:outline-none border-none">
                                <option value="">Rol</option>
                                @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}"
                                    @if (old('rol', isset($instructorRoles[0]) ? $instructorRoles[0] : null) == $rol->nombre) selected @endif>
                                    {{ $rol->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Botón Ingresar -->
                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-[#059212] hover:bg-green-700 text-white font-bold font-poppins py-2 px-4 rounded focus:outline-none focus:shadow-outline w-[15rem]">
                            Actualizar Usuario
                        </button>
                    </div>

                    <!-- Botón Cancelar -->
                    <div class="flex justify-center mt-4">
                        <button type="submit"
                            class="bg-[#6b6d6b] hover:bg-[#8c8f8c] text-white font-bold font-poppins py-2 px-4 rounded focus:outline-none focus:shadow-outline w-[15rem]">
                            <a href="{{ url()->previous() }}">
                                Cancelar
                            </a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>


@endsection

@include('layouts.footer')

@section('js')
    <script>
        const photoInput = document.getElementById('photo');
        const uploadImage = document.getElementById('upload');

        //--------------------------------------

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
