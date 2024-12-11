@extends('layouts.app')
@section('title', 'INDEX-INSTRUCTOR')
@section('class', 'INDEX-INSTRUCTOR')

@section('content')

<!-- Navbar -->
@include('layouts.navsearch')


<!-- Main Content (con margen superior suficiente para el navbar fijo) -->
<main class="container mx-auto px-4 py-2 mt-2 space-y-12 pt-16 pb-16">
    <!-- Tarjetas superiores -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Tarjeta -->
        <div
            class="bg-[#EBE9D6] shadow-lg rounded-lg p-4 flex flex-col justify-between items-center border border-solid border-[#059212]">
            <h1 class="text-sm font-bold font-poppins text-[#0C0C0C] text-opacity-50">Cantidad de Instructores Activos</h1>
            <strong class="text-3xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-50">{{ $instructoresActivos }}</strong>
        </div>

        <div
            class="bg-[#EBE9D6] shadow-lg rounded-lg p-4 flex flex-col justify-between items-center border border-solid border-[#059212]">
            <h1 class="text-sm font-bold font-poppins text-[#0C0C0C] text-opacity-50">Cantidad de Gestores</h1>
            <strong class="text-3xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-50">{{ $cantidadGestores }}</strong>
        </div>

        <div
            class="bg-[#EBE9D6] shadow-lg rounded-lg p-4 flex flex-col justify-between items-center border border-solid border-[#059212]">
            <h1 class="text-sm font-bold font-poppins text-[#0C0C0C] text-opacity-50">Cantidad Instructores de Seguimiento</h1>
            <strong class="text-3xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-50">{{ $cantidadSeguimiento }}</strong>
        </div>

        <div
            class="bg-[#EBE9D6] shadow-lg rounded-lg p-4 flex flex-col justify-between items-center border border-solid border-[#059212]">
            <h1 class="text-sm font-bold font-poppins text-[#0C0C0C] text-opacity-50">Cantidad Instructores Academicos</h1>
            <strong class="text-3xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-50">{{ $cantidadInstructores }}</strong>
        </div>
    </div>



    <!-- Botón para agregar instructor -->
    <div class="flex items-center justify-center space-x-4">
        <a href="{{ url('instructor/create') }}"
            class="flex items-center bg-white hover:bg-gray-200 font-poppins text-[#0C0C0C] text-opacity-50 font-bold py-2 px-6 rounded-lg border border-solid border-[#059212]">
            <img src="{{ asset('images/add-icon.svg') }}" alt="Agregar" class="w-6 h-6 mr-2">
            <h1 class="text-xl font-bold">Agregar Instructor</h1>
        </a>
    </div>

    <!-- Loader de carga -->
    <div class="loader hidden absolute inset-0 flex justify-center items-center">
        <div
            class="w-16 h-16 border-4 border-t-4 border-gray-200 border-solid rounded-full animate-spin border-t-green-500">
        </div>
    </div>


    <!-- Tarjetas inferiores -->
    <section>
        <div id="list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-2">
            @foreach ($instructores as $instructor)
            <!-- Fila 1 -->
            <div
                class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-1 max-h-44 border border-solid border-[#059212]">
                <!-- Imagen circular -->
                <div class="w-16 h-16 rounded-full border-[3px] border-solid border-[#059212] overflow-hidden">
                    <img src="{{ asset('images/' .  $instructor->foto_perfil) }}" alt="Usuario" class="w-full h-full object-cover">
                </div>

                <!-- Información -->
                <div class="flex flex-col space-y-2">
                    <!-- Tarjeta 1 -->
                    <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                        <h1 class="text-lg font-bold text-gray-800">{{ $instructor->nombre }}</h1>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                        <h1 class="text-sm font-medium text-gray-600">
                            Rol: {{ $instructor->instructor->rol->isNotEmpty() ? $instructor->instructor->rol[0]['nombre'] : 'Sin rol' }}
                        </h1>


                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                        <div class="flex items-center justify-center space-x-4">
                            <div
                                class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                                <a href="{{ url('instructor/' . $instructor->id) }}">
                                    <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                                </a>
                            </div>
                            @if(Auth::user()->perfiles->first()->perfil === 'administrador')
                            <div
                                class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                                <a href="{{ url('instructor/' . $instructor->id . '/edit') }}">
                                    <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                                </a>
                            </div>
                            <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                                <a href="javascript:;" class="btn-delete" data-fullname="{{ $instructor->nombre }}" data-action="desactivate">
                                    <img src="{{ asset('images/delete-icon.svg') }}" alt="Desactivar" class="w-4 h-4">
                                </a>
                                <!-- Formulario oculto -->
                                <form action="{{ url('instructor/' . $instructor->id . '/updateEstado') }}" method="POST" style="display: none">
                                    <input type="hidden" name="action" value="desactivate">
                                    @csrf
                                    @method('PATCH')
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div id="pagination">
            <div class="flex items-center justify-center space-x-4 space-y-2 p-1 max-h-12 mb-4">
                <div class="flex items-center bg-white hover:bg-gray-200 font-poppins text-[#0C0C0C] text-opacity-50 font-bold py-2 px-6 rounded-lg border border-solid border-[#059212]">
                    @if ($instructores->lastPage() > 1)
                    @if ($instructores->hasPages())
                    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-4">
                        @if ($instructores->onFirstPage())
                        <span class="cursor-not-allowed">
                            <img src="{{ asset('images/izquierda-icong.svg') }}" alt="Izquierda" class="w-4 h-4">
                        </span>
                        @else
                        <a href="{{ $instructores->previousPageUrl() }} &estado= {{ $estadoVista }}">
                            <img src="{{ asset('images/izquierda-icon.svg') }}" alt="Izquierda" class="w-4 h-4">
                        </a>
                        @endif

                        <span class="text-gray-700 font-bold">
                            Página {{ $instructores->currentPage() }} de {{ $instructores->lastPage() }}
                        </span>

                        @if ($instructores->hasMorePages())
                        <a href="{{ $instructores->nextPageUrl() }} &estado= {{ $estadoVista }}">
                            <img src="{{ asset('images/derecha-icon.svg') }}" alt="derecha" class="w-4 h-4">
                        </a>
                        @else
                        <span class="cursor-not-allowed">
                            <img src="{{ asset('images/derecha-icong.svg') }}" alt="derecha" class="w-4 h-4">
                        </span>
                        @endif
                    </nav>
                    @endif
                    @else
                    <!-- Paginador estático con datos fijos -->
                    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-4">
                        <span class="cursor-not-allowed">
                            <img src="{{ asset('images/izquierda-icong.svg') }}" alt="Izquierda" class="w-4 h-4">
                        </span>

                        <span class="text-gray-700 font-bold">
                            Página 1 de 1
                        </span>

                        <span class="cursor-not-allowed">
                            <img src="{{ asset('images/derecha-icong.svg') }}" alt="derecha" class="w-4 h-4">
                        </span>
                    </nav>
                    @endif
                </div>
            </div>
        </div>


    </section>
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

    //------------------------------------------
    //------------------------

    $('body').on('keyup', '#qsearch', function(e) {
        e.preventDefault();

        let searchQuery = $(this).val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        $('.loader').removeClass('hidden'); // Muestra el loader
        $('#list').hide(); // Oculta la lista de resultados
        $('#agregar').hide();

        $.ajax({
            url: '/aprendiz/search',
            method: 'POST',
            data: {
                q: searchQuery,
                _token: _token
            },
            success: function(data) {
                console.log(data);

                $('#list').html(data); // Actualiza el contenedor con los datos
                //$('#pagination').html(data);
                $('.loader').addClass('hidden'); // Oculta el loader
                $('#list').fadeIn('slow'); // Muestra la lista con animación
                $('#agregar').fadeIn('slow');
            },
            error: function(xhr) {
                console.error('Error en la búsqueda:', xhr);
            },
        });
    });
    //--------------------------
    //-------------------------
    $(document).ready(function() {
        //----------------------------
        @if(session('message'))
        Swal.fire({
            position: "top",
            title: "{{ session('message') }}", // Usa comillas dobles para PHP
            icon: "success",
            toast: true,
            timer: 5000
        });
        @endif

        //--------------------------

        $('.btn-delete').on('click', function() {
            var $this = $(this);
            var $fullname = $this.attr('data-fullname');
            Swal.fire({
                title: "Estas seguro?",
                text: "Deseas desactivar a " + $fullname,
                icon: "",
                showCancelButton: true,
                confirmButtonColor: "#059212",
                cancelButtonColor: "#6b6d6b",
                confirmButtonText: "Si, desactivar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    $this.next('form').submit()
                }
            });
        })
    });
</script>
@endsection