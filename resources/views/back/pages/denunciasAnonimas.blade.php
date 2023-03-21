@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Denuncias')
@section('content')
 <style>
  #btn-eliminar {
  position: relative; 
}

#btn-eliminar:hover::before {
  content: "Eliminar"; 
  position: absolute;
  top: -25px; 
  left: 50%; 
  transform: translateX(-50%); 
  background-color: #333; 
  color: #fff; 
  padding: 5px 10px; 
  border-radius: 5px; 
}
</style>  
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">Denuncias que son anónimas</h2>
      </div>
    </div>
  </div>
   
<div class="container w-100  border p-4">
  <p class="font-weight-bold p-3 mb-2 bg-primary text-white text-center">

    REGISTRO DE DENUNCIAS ANÓNIMAS</p>
    <table class="table table-striped">
      <thead>
       <tr class="">
          <th scope="col" class="bg-success  text-white text-center">#ID</th>
          <th scope="col" class="bg-success text-white text-center">Denuncia</th>
          <th scope="col" class="bg-success text-white text-center">Numero de telefono denunciante</th>
          <th scope="col" class="bg-success text-white text-center">Fecha de denuncia</th>
          <th scope="col" class="bg-success text-white text-center"></th>
       </tr>
      </thead>
      <tbody>
        @foreach($denuncias_anonimas as $denuncia_si_anonima)
         <tr>
         <td>{{ $denuncia_si_anonima->id }}</td>
         <td>{{ $denuncia_si_anonima->texto_denuncia_anonima_si }}</td>
         <td>{{ $denuncia_si_anonima->num_tel_denuncia_anonima_si }}</td>
         <td>{{ $denuncia_si_anonima->created_at }}</td>
    <td>

      <form action="{{ route('author.denunciasAnonimas.eliminar', $denuncia_si_anonima->id) }}" method="POST" id="form-eliminar">
        @csrf
        @method('DELETE')
        <button id="btn-eliminar" type="submit" class="btn btn-danger" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(245, 239, 239, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
          </path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg></button>
    </form>
     </td>      
           </tr>
     @endforeach
      </tbody>
   </table>
</div>
@endsection

@push('scripts')

<script>
     document.getElementById("btn-eliminar").addEventListener("click", function(event) {
        event.preventDefault(); // Evita que el formulario se envíe automáticamente

        swal.fire({
            title: "¿Estás seguro?",
            text: "¿Desea eliminar esta denuncia?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("form-eliminar").submit(); // Envía el formulario de eliminación si se confirma la acción
            }
        });
    });
</script>
@endpush
 
     

