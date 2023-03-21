
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