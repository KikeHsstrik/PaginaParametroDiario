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

