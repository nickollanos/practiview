document.addEventListener('DOMContentLoaded', function() {
    // Modal toggle
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModal');
    const closeModalBtns = [document.getElementById('closeModal'), document.getElementById('closeModalFooter')];

    // Abrir modal
    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Cerrar modal
    closeModalBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    });

    // Resto del código (FullCalendar y Axios)
    let formulario = document.getElementById("eventForm");
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es",
        contentHeight: 'auto',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día',
            list: 'Agenda'
        },
        events: baseURL + "/evento/mostrar",
        dateClick: function(info) {
            formulario.reset();
            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;
            modal.classList.remove('hidden');
        },
        eventClick: function(info) {
            var evento = info.event;
            axios.post(baseURL + "/evento/editar/" + info.event.id)
                .then((respuesta) => {
                    formulario.id.value = respuesta.data.id;
                    formulario.title.value = respuesta.data.title;
                    formulario.descripcion.value = respuesta.data.descripcion;
                    formulario.start.value = respuesta.data.start;
                    formulario.end.value = respuesta.data.end;
                    modal.classList.remove('hidden');
                })
                .catch(error => {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
        }
    });

    calendar.render();

    function enviarDatos(url) {
        const datos = new FormData(formulario);
        const nuevaURL = baseURL + url;
        axios.post(nuevaURL, datos)
            .then((respuesta) => {
                calendar.refetchEvents();
                modal.classList.add('hidden');
            })
            .catch(error => {
                if (error.response) {
                    console.log(error.response.data);
                }
            });
    }

    document.getElementById("btnGuardar").addEventListener("click", () => enviarDatos("/evento/agregar"));
    document.getElementById("btnModificar").addEventListener("click", () => enviarDatos("/evento/actualizar/" + formulario.id.value));
    document.getElementById("btnEliminar").addEventListener("click", () => enviarDatos("/evento/borrar/" + formulario.id.value));
});
