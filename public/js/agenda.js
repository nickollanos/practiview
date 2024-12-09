document.addEventListener('DOMContentLoaded', function() {
    // Referencia al formulario
    let formulario = document.querySelector("form");

    // Configuración de FullCalendar
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es",
        contentHeight: 'auto',  // Ajusta la altura automáticamente
        headerToolbar: {
            left: 'prev,next today',  // Botones de navegación
            center: 'title',          // Título central
            right: 'dayGridMonth,timeGridWeek,listWeek' // Vistas disponibles
        },
        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día',
            list: 'Agenda'
        },
        events: baseURL+"/evento/mostrar",
        
        // Mostrar modal al hacer clic en una fecha
        dateClick: function(info) {
            formulario.reset();
            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;
            $("#evento").modal("show");
        },

        eventClick: function(info) {
            var evento = info.event;
            console.log(evento);

            // Enviar datos con Axios
            axios.post(baseURL+"/evento/editar/"+info.event.id)
                .then((respuesta) => {
                    formulario.id.value = respuesta.data.id;
                    formulario.title.value = respuesta.data.title;
                    formulario.descripcion.value = respuesta.data.descripcion;
                    formulario.start.value = respuesta.data.start;
                    formulario.end.value = respuesta.data.end;
                    $("#evento").modal("show");
                })
                .catch(error => {
                    if(error.response){
                        console.log(error.response.data);
                    }
                });
        }
    });

    // Renderizar el calendario
    calendar.render();

    // Manejar el evento del botón "Guardar"
    document.getElementById("btnGuardar").addEventListener("click", function() {
        enviarDatos("/evento/agregar");
    });

    // Manejar el evento del botón "Eliminar"
    document.getElementById("btnEliminar").addEventListener("click", function() {
        enviarDatos("/evento/borrar/" + formulario.id.value);
    });   
    
    // Manejar el evento del botón "Modificar"
    document.getElementById("btnModificar").addEventListener("click", function() {
        enviarDatos("/evento/actualizar/" + formulario.id.value);
    });

    function enviarDatos(url) {
        const datos = new FormData(formulario);
        const nuevaURL = baseURL + url;
        
        // Enviar datos con Axios
        axios.post(nuevaURL, datos)
            .then((respuesta) => {
                calendar.refetchEvents();
                $("#evento").modal("hide");
            })
            .catch(error => {
                if(error.response){
                    console.log(error.response.data);
                }
            });
    }
});
