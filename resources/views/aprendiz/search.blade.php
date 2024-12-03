<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-2">
    @foreach ($aprendices as $aprendiz)
        <div
            class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-1 max-h-44 border border-solid border-[#059212]">
            <!-- Imagen circular -->
            <div class="w-16 h-16 rounded-full overflow-hidden">
                <img src="{{ $aprendiz->foto_perfil }}" alt="Usuario" class="w-full h-full object-cover">
            </div>

            <!-- Información -->
            <div class="flex flex-col space-y-2">
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-lg font-bold text-gray-800">{{ $aprendiz->nombre }}</h1>
                </div>
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <h1 class="text-sm font-medium text-gray-600">Estado: {{ $aprendiz->estado->estado }}</h1>
                </div>
                <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{ url('aprendiz.show', $aprendiz->id) }}">
                                <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{ url('aprendiz.edit', $aprendiz->id) }}">
                                <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                            <a href="{{ url('aprendiz.delete', $aprendiz->id) }}">
                                <img src="{{ asset('images/delete-icon.svg') }}" alt="Eliminar" class="w-4 h-4">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="flex items-center justify-center space-x-4 space-y-2 p-1 max-h-12 mb-4">
    @if ($aprendices->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-4">
            @if ($aprendices->onFirstPage())
                <span class="cursor-not-allowed">
                    <img src="{{ asset('images/izquierda-icong.svg') }}" alt="Izquierda" class="w-4 h-4">
                </span>
            @else
                <a href="{{ $aprendices->previousPageUrl() }}">
                    <img src="{{ asset('images/izquierda-icon.svg') }}" alt="Izquierda" class="w-4 h-4">
                </a>
            @endif

            <span class="text-gray-700 font-bold">
                Página {{ $aprendices->currentPage() }} de {{ $aprendices->lastPage() }}
            </span>

            @if ($aprendices->hasMorePages())
                <a href="{{ $aprendices->nextPageUrl() }}">
                    <img src="{{ asset('images/derecha-icon.svg') }}" alt="derecha" class="w-4 h-4">
                </a>
            @else
                <span class="cursor-not-allowed">
                    <img src="{{ asset('images/derecha-icong.svg') }}" alt="derecha" class="w-4 h-4">
                </span>
            @endif
        </nav>
    @endif
</div>
