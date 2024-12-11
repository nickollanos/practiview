@extends('layouts.app')
@section('title', 'Instrumento de Evaluación')
@section('class', 'Evaluación')

@section('content')

<!-- Navbar -->
@include('layouts.nav')

<!-- Main Content (con margen superior suficiente para el navbar fijo) -->
<main class="container mx-auto px-4 py-8 mt-20">
    <!-- Tarjetas -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-solid border-[#059212]">
        <div class="flex p-4">
            <!-- Título -->
            <div class="flex flex-col justify-center">
                <strong class="text-xl font-extrabold font-poppins text-[#0C0C0C] text-opacity-70">Instrumento de Evaluación</strong>
            </div>
        </div>
        
        <div class="px-4 pb-6">
            <!-- Formulario para llenar el instrumento de evaluación -->
            <form  method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="evaluacion" class="block text-gray-700 text-sm font-bold mb-2">Comentarios de Evaluación</label>
                    <textarea name="evaluacion" id="evaluacion" rows="4" class="w-full border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins" placeholder="Escribe tus comentarios aquí..."></textarea>
                </div>

                <div class="mb-4">
                    <label for="calificacion" class="block text-gray-700 text-sm font-bold mb-2">Calificación</label>
                    <select name="calificacion" id="calificacion" class="w-full border-2 border-[#059212] py-2 px-3 rounded-lg font-poppins">
                        <option value="1">Aprobado</option>
                        <option value="2">No Aprobado</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="firma" class="block text-gray-700 text-sm font-bold mb-2">Firma Digital</label>
                    <div class="border-2 border-[#059212] rounded-lg p-4">
                        <!-- Área para dibujar la firma -->
                        <canvas id="firmaCanvas" class="w-full h-32 bg-gray-100 border-2 border-[#059212]"></canvas>
                        <div class="mt-2 flex justify-between">
                            <button type="button" id="limpiarFirma" class="bg-red-500 text-white py-1 px-4 rounded-lg">Limpiar Firma</button>
                            <button type="button" id="guardarFirma" class="bg-green-500 text-white py-1 px-4 rounded-lg">Guardar Firma</button>
                        </div>
                    </div>
                    <input type="hidden" name="firma" id="firmaInput">
                </div>

                <button type="submit" class="w-full bg-[#059212] hover:bg-green-600 text-white text-xl font-bold py-2 rounded-lg mt-6">Enviar Evaluación</button>
            </form>
        </div>
    </div>
</main>

@endsection

@include('layouts.footer')

@section('js')
<script>
// Script para manejar la firma digital
const canvas = document.getElementById('firmaCanvas');
const ctx = canvas.getContext('2d');
let drawing = false;

// Establecer tamaño del canvas
canvas.width = window.innerWidth - 40; // Ajustar al tamaño disponible
canvas.height = 100;

canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
canvas.addEventListener('mouseup', stopDrawing);
canvas.addEventListener('mouseleave', stopDrawing);

function startDrawing(event) {
    drawing = true;
    draw(event);
}

function draw(event) {
    if (!drawing) return;

    ctx.lineWidth = 2;
    ctx.lineCap = 'round';
    ctx.strokeStyle = '#0C0C0C';

    ctx.lineTo(event.clientX - canvas.offsetLeft, event.clientY - canvas.offsetTop);
    ctx.stroke();
}

function stopDrawing() {
    drawing = false;
    ctx.beginPath();
}

// Limpiar la firma
document.getElementById('limpiarFirma').addEventListener('click', () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    document.getElementById('firmaInput').value = '';
});

// Guardar la firma
document.getElementById('guardarFirma').addEventListener('click', () => {
    const dataUrl = canvas.toDataURL();
    document.getElementById('firmaInput').value = dataUrl;
});
</script>
@endsection
