@forelse ($fichas as $ficha)
@if ($ficha->programa_formacion->siglas)
<!-- Fila 1 -->
<div
    class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-1 max-h-44 border border-solid border-[#059212]">
    <!-- Imagen circular -->
    <div class="w-16 h-16 rounded-full border-[3px] border-solid border-[#059212] overflow-hidden flex items-center justify-center">
        <img src="{{ url('images/ficha-icon.svg') }}" alt="Usuario" class="w-8 h-8 object-cover">
    </div>


    <!-- Información -->
    <div class="flex flex-col space-y-2">
        <!-- Tarjeta 1 -->
        <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
            <h1 class="text-lg font-bold text-gray-800">{{ $ficha->numero_ficha }}</h1>
        </div>

        <!-- Tarjeta 2 -->
        <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
            <h1 class="text-sm font-medium text-gray-600">
                P.Formación:
                @if ($ficha->programa_formacion->siglas)
                {{ $ficha->programa_formacion->siglas }}
                @else
                Sin programa
                @endif
            </h1>

        </div>

        <!-- Tarjeta 3 -->
        <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
            <div class="flex items-center justify-center space-x-4">
                <div
                    class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                    <a href="{{ url('aprendiz/ficha/' . $ficha->id) }}">
                        <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
    @empty
    No found 🤒
@endforelse
