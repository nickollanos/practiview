@forelse ($aprendices as $aprendiz)
    <div
                        class="flex items-start space-x-4 bg-white shadow-lg rounded-lg p-1 max-h-44 border border-solid border-[#059212]">
                        <!-- Imagen circular -->
                        <div class="w-16 h-16 rounded-full border-[3px] border-solid border-[#059212] overflow-hidden">
                            <img src="{{ asset('images/' .  $aprendiz->foto_perfil) }}" alt="Usuario" class="w-full h-full object-cover">
                        </div>

                        <!-- Información -->
                        <div class="flex flex-col space-y-2">
                            <!-- Tarjeta 1 -->
                            <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                                <h1 class="text-lg font-bold text-gray-800">{{ ucwords($aprendiz->nombre) }}</h1>
                            </div>

                            <!-- Tarjeta 2 -->
                            <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                                <h1 class="text-sm font-medium text-gray-600">Estado: {{ $aprendiz->aprendiz->estadoAprendiz->nombre }}
                                </h1>
                            </div>

                            <!-- Tarjeta 3 -->
                            <div class="bg-white shadow rounded-lg p-2 border border-solid border-[#059212]">
                                <div class="flex items-center justify-center space-x-4">
                                    <div
                                        class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                                        <a href="{{ url('aprendiz/' . $aprendiz->id) }}">
                                            <img src="{{ asset('images/view-icon.svg') }}" alt="Ver" class="w-4 h-4">
                                        </a>
                                    </div>
                                    @if(Auth::user()->perfiles->first()->perfil === 'administrador')
                                    <div
                                        class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                                        <a href="{{ url('aprendiz/' . $aprendiz->id . '/edit') }}">
                                            <img src="{{ asset('images/edit-icon.svg') }}" alt="Editar" class="w-4 h-4">
                                        </a>
                                    </div>
                                    <div class="w-8 h-8 bg-[#059212] rounded-full flex items-center justify-center cursor-pointer">
                                        <a href="javascript:;" class="btn-delete" data-fullname="{{ $aprendiz->nombre }}" data-action="desactivate">
                                            <img src="{{ asset('images/delete-icon.svg') }}" alt="Desactivar" class="w-4 h-4">
                                        </a>
                                        <!-- Formulario oculto -->
                                        <form action="{{ url('aprendiz/' . $aprendiz->id . '/updateEstado') }}" method="POST" style="display: none">
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
