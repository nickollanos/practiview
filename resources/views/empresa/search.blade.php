@forelse ($empresas as $empresa)
<div class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-2 max-h-44 border border-solid border-[#059212]">
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
                @if(Auth::user()->perfiles->first()->perfil === 'administrador')
                <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                    <a href="{{ url('empresa/' . $empresa->id . '/edit') }}">
                        <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                    </a>
                </div>
                <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                    <a href="javascript:;" class="btn-delete" data-fullname="{{ $empresa->nombre }}">
                        <img src="{{ asset('images/delete-icon.svg') }}" alt="Eliminar" class="w-4 h-4">
                    </a>
                    <form action="{{ url('empresa/' . $empresa->id) }}" method="POST" style="display: none">
                        @csrf
                        @method('delete')
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