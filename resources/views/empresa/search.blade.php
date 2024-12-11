@forelse ($empresas as $empresa)
    <div
        class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-2 max-h-44 border border-solid border-[#059212]">
        <!-- Imagen circular -->
        <div class="w-16 h-16 rounded-full border-[3px] border-solid border-[#059212] overflow-hidden">
            <img src="{{ url('images/empresa.png') }}" alt="Usuario" class="w-full h-full object-cover">
        </div>
        <div class="flex flex-col space-y-2">
            <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                <h1 class="text-lg font-bold text-gray-800">{{ $empresa->nombre }}</h1>
            </div>

            <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                <h1 class="text-sm font-medium text-gray-600">Zona: {{ $empresa->zona->nombre }}</h1>
            </div>

            <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                <div class="flex items-center justify-center space-x-2"> <!-- Reducido space-x-4 a space-x-2 -->
                    <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                        <a href="{{ url('empresa/' . $empresa->id) }}">
                            <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                        </a>
                    </div>
                    @if (Auth::user()->perfiles->first()->perfil === 'administrador')
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{ url('empresa/' . $empresa->id . '/edit') }}">
                                <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="javascript:;" class="btn-delete" data-fullname="{{ $empresa->nombre }}"
                                data-action="desactivate">
                                <img src="{{ asset('images/delete-icon.svg') }}" alt="Desactivar" class="w-4 h-4">
                            </a>
                            <!-- Formulario oculto -->
                            <form action="{{ url('empresa/' . $empresa->id . '/updateEstado') }}" method="POST"
                                style="display: none">
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
@empty
    No found 🤒
@endforelse

<script>
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
            url: '/empresa/search',
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
        @if (session('message'))
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
