@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Bienvenida a Parametro Diario')
@section('content')
<link href="{{ asset('css\2nd_styles.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<style>
  body {
  font-family: 'Montserrat', sans-serif !important;
}
h1, h2, h3, h4, h5, h6 {
  font-family: 'Montserrat', sans-serif  !important;
}


</style>

<div class="row">
   <!-- News With Sidebar Start -->
   <div class="container-fluid mt-4">
    <div class="container">
        <div class="row">
            
            <section  id="formulario_denuncia_anonima_sii" class="col-lg-8">
              <section class="d-flex justify-content-center align-items-center">
                
                <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-12   p-4"> 
                  <div class="container ">
                    <p class="h2 d-block mb-3 text-secondary text-center text-uppercase font-weight-bold">¡Ciudadano!</p>
                    <p class="h4 d-block mb-3 text-secondary text-center text-uppercase font-weight-bold">Denuncia las Irregularidades.</p>
                    
                    <div class="">
                      <div class="container">
                        <form id="selecciones" class="form-group">
                         
                          
                            <p class="h6 d-block mb-3 text-secondary" href="">¿Desea que su información sea anónima?</p>
                            @if(session('success'))
                            <h6 class="alert alert-success">{{session('success')}}</h6>
                            @endif
                            
                              @if(count($errors)>0)
                            
                              @foreach($errors->all() as $error)
        
                              <h6 class="alert alert-danger">{{$error}}</h6>
        
                            
                              @endforeach
        
                            @endif
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="yes">
                                <label class="form-check-label" for="opcion1">
                                    <p class="h6 d-block mb-3 text-secondary" href=""> Sí</p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="no">
                                <label class="form-check-label" for="opcion2">
                                    <p class="h6 d-block mb-3 text-secondary" href=""> No</p>
                                </label>
                            </div>
                        </form>
                        <div id="form-si" class="mt-3 border-top border-dark" style="display:none;">
                          <form class="row mt-3 g-3 needs-validation" novalidate id="form-select-si" action="{{route('addDenuncia')}}" method="POST">
                            @csrf
                        
                                 <div class="col-md-12">
                                  <label for="texto_denuncia_anonima_si" class="form-label h6 d-block text-secondary text-uppercase font-weight-bold">Denuncia</label>
                                  <textarea type="text" class="form-control"  name="texto_denuncia_anonima_si" 
                                  id="texto_denuncia_anonima_si" placeholder="Escribe tu denuncia aqui (Requerido)"  rows="3" required></textarea>
                                  <div class="invalid-feedback">
                                    Por favor, escriba una denuncia válida, Este campo es obligatorio.
                                  </div> 
                                </div>
                                <div class="col-md-12">
                                  <label for="num_tel_denuncia_anonima_si"  class="form-label h6 d-block text-secondary"> Teléfono: </label>
                                  <input class="form-control" type="tel" class="form-control" pattern="[0-9]{12}" id="num_tel_denuncia_anonima_si"
                                  name="num_tel_denuncia_anonima_si" placeholder="52 xxx xxx xxxx" required>
                                  <small class="form-text text-muted">Ingrese el teléfono en formato 52 xxx xxx xxxx.</small>
                                  <div class="invalid-feedback">
                                    Por favor, escriba un telefono válido, Este campo es obligatorio.
                                  </div>
                                </div>
        
                              <div class="mt-3 text-center align-content-center justify-content-center">
                                <button type="submit" class="btn btn-success" >Enviar Denuncia</button>
                            </div>
                            
                          
                          </form>
                          
                        </div>
                        <div id="form-no" class="border-top border-dark" style="display:none;">
                          <form class="row mt-3 g-3 needs-validation" novalidate id="form-select-si"  action="{{route('addDenunciano')}}"  method="POST">
                            @csrf
                        
                         
                            <div class="col-md-12">
                              <label for="texto_denuncia_anonima_no" class="form-label h6 d-block text-secondary">Denuncia</label>
                              <textarea type="text" class="form-control"  name="texto_denuncia_anonima_no" 
                              id="texto_denuncia_anonima_no" placeholder="Escribe tu denuncia aqui (Requerido)"  rows="3" required></textarea>
                              <div class="invalid-feedback">
                                Por favor, escriba una denuncia válida, Este campo es obligatorio.
                              </div> 
                            </div>
                            <div class="col-md-6">
                              <label for="nombre_usuario_denuncia_anonima_no" 
                              class="form-label h6 d-block text-secondary">Nombre:</label>
                              <input type="text" pattern="[A-Za-z]+" name="nombre_usuario_denuncia_anonima_no" class="form-control h6 d-block text-secondary" class="form-label"
                               id="nombre_usuario_denuncia_anonima_no" placeholder="Escribe tu nombre (Requerido)" required>
                              <div class="invalid-feedback">
                                Por favor, escriba un nombre válida.
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="apellido_usuario_denuncia_anonima_no"  
                              class="form-label h6 d-block text-secondary">Apellidos:</label>
                              <input type="text" pattern="[A-Za-z]+" name="apellido_usuario_denuncia_anonima_no" class="form-control h6 d-block text-secondary" class="form-label"
                              id="apellido_usuario_denuncia_anonima_no"  placeholder="Escribe tu apellido (Requerido)" required>
                              <div class="invalid-feedback">
                                Por favor, escriba sus apellidos.
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="dirección_usuario_denuncia_anonima_no" 
                              class="form-label h6 d-block text-secondary text-center">Dirección:</label>
                              <input type="text" class="form-control h6 d-block text-secondary" class="form-label"
                              id="dirección_usuario_denuncia_anonima_no" name="dirección_usuario_denuncia_anonima_no"  placeholder="Escribe la dirección (Requerido)" required>
                              <div class="invalid-feedback">
                                Por favor, escriba una dirección.
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="lugar_usuario_denuncia_anonima_no" 
                              class="form-label h6 d-block text-secondary text-center">Lugar:</label>
                              <input type="text"  name="lugar_usuario_denuncia_anonima_no" class="form-control h6 d-block text-secondary" class="form-label"
                              id="lugar_usuario_denuncia_anonima_no" placeholder="Escribe el lugar (Requerido)" required>
                              <div class="invalid-feedback">
                                Por favor, escriba un lugar.
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="num_tel_denuncia_anonima_no"  class="form-label h6 d-block text-secondary"> Teléfono: </label>
                              <input class="form-control" type="tel" class="form-control" pattern="[0-9]{12}" id="num_tel_denuncia_anonima_no"
                              name="num_tel_denuncia_anonima_no" placeholder="52 xxx xxx xxxx" required>
                              <small class="form-text text-muted">Ingrese el teléfono en formato 52 xxx xxx xxxx.</small>
                              <div class="invalid-feedback">
                                Por favor, escriba un telefono válido, Este campo es obligatorio.
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="correo_usuario_denuncia_anonima_no"  class="form-label h6 d-block text-secondary"> Correo electronico: </label>
                              <input class="form-control" type="email" class="form-control" id="correo_usuario_denuncia_anonima_no"
                              name="correo_usuario_denuncia_anonima_no" placeholder="Ingresa un correo eléctronico" required>
                              <small class="form-text text-muted">Ingrese un correo en formato ejemplo@gmai.com</small>
                              <div class="invalid-feedback">
                                Por favor, escriba un correo válido, Este campo es obligatorio.
                              </div>
                            </div>
 
                            <div class="mt-3 text-center align-content-center justify-content-center">
                              <button type="submit" class="btn btn-success" >Enviar Denuncia</button>
                          </div>
                          </form>
                        </div>
                    </div>
                  
                    </div>
                    
                   
                    
                    
                  </div>
                                        
        
                </div>
            </section>      


                 
                              
             </section>



                
            <div class="col-lg-4">
              
                <div class="mb-3">
                    <div class="color-titulo mb-0">
                        <h4 class="m-0 text-uppercase text-white  text-center font-weight-bold">Participación Ciudadana</h4>
                    
                    
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <p class="h3 d-block mb-3 text-center text-secondary font-weight-bold" href="">Participación Ciudadana</p>
                        <p class="h5  d-block mb-3  text-center text-secondary" href="">Denuncia irregularidades</p>
                       <div class="mb-3 text-center" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                          </svg>
                         
                       </div>
                       <p class="h5  d-block mb-3 text-center text-secondary" href="">(771) 47 82350
                        Ext. 1199</p>
                     
                        <div class="bg-white p-3 pt-5">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px; height">
                                <img class="img-fluid"  src="img\denuncia.jpg" alt="">
                       
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                                   
                                    
                                </div>
                            </div>
                         
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
           


            
        </div>
    </div>

  </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"> </script>    
<script  src="{{ asset('js/main.js') }}"></script>
@endsection