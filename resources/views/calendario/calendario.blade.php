@extends('layouts.app')
@section('title', 'DASHBOARD')
@section('class', 'DASHBOARD')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg-white bg-opacity-60 shadow-lg rounded-lg p-6 border border-solid border-[#059212]">
                <!-- Calendario -->
                <div id="calendar" class="w-full rounded-lg border border-[#059212]"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Personalización del calendario */
    .fc {
        background-color: #f8f9fa !important; /* Fondo claro del calendario */
        border-radius: 8px !important; /* Bordes redondeados */
        padding: 10px;
        border: 2px solid #059212 !important; /* Borde verde */
    }

    .fc-daygrid-day-number {
        color: #059212 !important; /* Color verde para los números */
        font-weight: bold !important; /* Números en negrita */
    }

    .fc-toolbar-title {
        color: #059212 !important; /* Color verde para el título */
        font-weight: bold !important;
    }

    .fc-head {
        background-color: #059212 !important; /* Fondo verde para los días de la semana */
        color: white !important; /* Texto blanco */
        font-weight: bold !important; /* Texto en negrita */
    }

    .fc-daygrid-day {
        background-color: #ffffff !important; /* Fondo blanco para los días */
        border: 1px solid #059212 !important; /* Borde verde */
    }

    .fc-daygrid-day:hover {
        background-color: #e6ffe6 !important; /* Fondo verde claro al pasar el mouse */
        cursor: pointer;
    }

    .fc-daygrid-event {
        background-color: #059212 !important; /* Fondo verde para los eventos */
        color: white !important; /* Texto blanco */
        border-radius: 5px; /* Bordes redondeados */
        font-weight: bold !important;
        padding: 5px;
    }

    .fc-daygrid-event:hover {
        background-color: #06D001 !important; /* Fondo verde más claro al pasar el mouse */
    }
</style>
@endpush

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',                   // Idioma en español
            initialView: 'timeGridWeek',    // Vista predeterminada semanal
            slotMinTime: '08:00',           // Hora mínima
            slotMaxTime: '17:00',           // Hora máxima
            events: @json($events),
            headerToolbar: {                // Barra de herramientas
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay' // Botones para cambiar vista
            },
            buttonText: {                   // Personalización de texto en los botones
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día'
            }
        });
        calendar.render();
    });
</script>
@endpush
