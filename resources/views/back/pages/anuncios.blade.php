@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Agregar Anuncios')
@section('content')
 

<div class="page-header d-print-none">
    <div class="row align-items-center ">
      <div class="col">
        <h2 class="text-center ">Añadir Anuncios 📢</h2>
        
      </div>
    </div>
  </div>

  <form action="{{ route('author.posts.create') }}" method="post" id="addAnuncioForm" enctype="multipart/form-data">
    @csrf
      <div class="card">
        <div class="card-body">
           <div class="row">
            <div class="col-md-6">
                <div class="mb-6">
                    <label class="form-label text-center">Título del Anuncio</label>
                    <input type="text" class="form-control" name="post_title" placeholder="Ingrese el título del anuncio">
                    <span class="text-danger error-text post_title_error"></span>
                </div>
                <div class="mb-6 mt-3">
                    <div class="form-label">Imagen del Anuncio</div>
                    <input type="file" class="form-control" name="featured_image">
                    <span class="text-danger error-text featured_image_error"></span>
                  </div>
                  <div class="image_holder mb-2" style="max-width: 250px">
                    <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img=''>
              </div>
            </div>
            <div class="col-md-6">
                <div class="mb-6">
                    <div class="form-label">Categoría en donde aparezca el Anuncio</div>
                    <select class="form-select" name="post_category">
                      <option value="">No seleccionado</option>
                      @foreach(\App\Models\SubCategory::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->subcategory_name }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger error-text post_category_error"></span>
                  </div>
                  
                 
                  <div class="mb-6  mt-3">
                    <label for="" class="form-label" >Etiqueta de Anuncio</label>
                    <input type="text" class="form-control" name="post_tags" placeholder="Escribe una etiqueta..">
                  </div>


                
            </div>
           
                <div class="mb-12 text-center align-items-center">
                    <button type="submit" class="btn btn-primary">Guardar Anuncio</button>
                  </div>
                 
                </div>
           
        </div>
      </div>
  </form>


@endsection

@push('scripts')
<script src="/ckeditor/ckeditor.js"></script>
<script>
    $(function(){
        $('input[type="file"][name="featured_image"]').ijaboViewer({
            preview:'#image-previewer',
            imageShape:'rectangular',
            allowedExtensions:['jpg','jpeg','png'],
            onErrorShape:function(message,element){
                alert(message);
            },
            onInvalidType:function(message,element){
                alert(message);
            }
        });

        
        $('form#addAnuncioForm').on('submit', function(e){
            e.preventDefault();
            toastr.remove();
          
            var form = this;
            var fromdata = new FormData(form);
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:fromdata,
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(response){
                    toastr.remove();
                    if(response.code == 1){
                       $(form)[0].reset();
                       $('div.image_holder').find('img').attr('src','');
                       CKEDITOR.instances.post_content.setData('');
                       $('input[name="post_tags"]').amsifySuggestags();
                       toastr.success(response.msg);
                    }else{
                        toastr.error(response.msg);
                    }
                },
                error:function(response){
                    toastr.remove();
                    $.each(response.responseJSON.errors, function(prefix,val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }
            });
        });

    });
</script>
@endpush
 
     

