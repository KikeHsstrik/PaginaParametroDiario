/* Formulario denuncia ciudadana */

$(document).ready(function() {
  $('input[type="radio"]').click(function() {
    if($(this).attr('id') == 'opcion1') {
      $('#formulario1').show();
      $('#formulario2').hide();
    } else {
      $('#formulario2').show();
      $('#formulario1').hide();
    }
  });
});


$(document).ready(function(){
  $("input[type='radio']").click(function(){
    if($("#opcion1").is(":checked")) {
      $("#form-si").show();
      $("#form-no").hide();
    } else {
      $("#form-no").show();
      $("#form-si").hide();
    }
  });
});

(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()



/* 
  $(document).ready(function() {
    // Configuramos Splide
    var splide = new Splide('#myCarousel', {
        type: 'loop',
        perPage: 1,
        autoplay: true,
        interval: 3000,
        pauseOnHover: false,
        arrows: true,
        pagination: true,
    });

    // Inicializamos el carrusel
    splide.mount();

    // Configurar intervalo de cambio de imagen
    $('.carousel').carousel({
      interval: 3000 // Cambia cada 5 segundos
    });

    // Controlar botones de navegación
    $('.carousel-control-prev').click(function(){
      $('.carousel').carousel('prev');
    });

    $('.carousel-control-next').click(function(){
      $('.carousel').carousel('next');
    });
  });

 */

  var elem = document.querySelector('.main-carousel');
var flkty = new Flickity( elem, {
  // options
  cellAlign: 'left',
  contain: true
});

// element argument can be a selector string
//   for an individual element
var flkty = new Flickity( '.main-carousel', {
  // options
});



///Barra de inicio 
//Mostrar hora y fecha

//Mostrar fecha
var fechaActual = new Date().toLocaleDateString(); //Obtenemos la fecha actual
document.getElementById("fecha").innerHTML = fechaActual; //Mostramos la fecha actual en la página


//Mostrar hora
function actualizarHora() {
  var horaActual = new Date().toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
  document.getElementById("hora").innerHTML = horaActual;
}

actualizarHora(); //Llamamos a la función para mostrar la hora actual al cargar la página

//Usamos setInterval para actualizar la hora cada segundo
setInterval(actualizarHora, 1000);





function obtenerUbicacion() {
  navigator.geolocation.getCurrentPosition(function(position) {
    var latitud = position.coords.latitude;
    var longitud = position.coords.longitude;

    const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitud}&lon=${longitud}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        const city = data.address.city; // nombre de la ciudad
        const state = data.address.state; // nombre del estado

        // Muestra la ubicación del usuario en el sitio web
        document.getElementById("ubicacion").innerHTML = `${city}, ${state}`;

        // Obtiene el clima y lo muestra en el sitio web
        obtenerClima(latitud, longitud);
      })
      .catch(error => console.error(error));
  });
}

obtenerUbicacion();



function obtenerClima(latitud, longitud) {
  // Construye la URL de la solicitud de OpenWeatherMap
  const url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitud}&lon=${longitud}&appid=f56a8a51ea2f3c50408221cb309688d6&units=metric&lang=es`;

  // Hace la solicitud a OpenWeatherMap utilizando fetch
  fetch(url)
    .then(response => response.json())
    .then(data => {
      // Obtiene la temperatura y la descripción del clima de la respuesta
      const temp = Math.round(data.main.temp);
      const desc = data.weather[0].description;

      // Muestra la temperatura y la descripción del clima en el sitio web
      document.getElementById("Clima").innerHTML = `${temp}°C ${desc}`;
    })
    .catch(error => console.error(error));
}



