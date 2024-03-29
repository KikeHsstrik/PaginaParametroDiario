@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Agregar nueva noticia')
@section('content')
  
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Añadir Nueva Noticia
        </h2>
      </div>
    </div>
  </div>

  <form action="{{ route('author.posts.create') }}" method="post" id="addPostForm" enctype="multipart/form-data">
    @csrf
      <div class="card">
        <div class="card-body">
           <div class="row">
            <div class="col-md-9">
                <div class="mb-3">
                    <label class="form-label">Título de la Noticia</label>
                    <input type="text" class="form-control" name="post_title" placeholder="Ingrese el título de la noticia">
                    <span class="text-danger error-text post_title_error"></span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contenido de la Noticia</label>
                    <textarea class="ckeditor form-control" name="post_content" rows="6" placeholder="Contenido.." id="post_content"></textarea>
                    <span class="text-danger error-text post_content_error"></span>
                  </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <div class="form-label">Categoría de la noticia</div>
                    <select class="form-select" name="post_category">
                      <option value="">No seleccionado</option>
                      @foreach(\App\Models\SubCategory::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->subcategory_name }}</option>
                      @endforeach
                    </select>
                    <span class="text-danger error-text post_category_error"></span>
                  </div>
                  <div class="mb-3">
                    <div class="form-label">Imagen de portada</div>
                    <input type="file" class="form-control" name="featured_image">
                    <span class="text-danger error-text featured_image_error"></span>
                  </div>
                  <div class="image_holder mb-2" style="max-width: 250px">
                        <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img=''>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label" >Etiqueta de noticia</label>
                    <input type="text" class="form-control" name="post_tags" placeholder="Escribe una etiqueta..">
                  </div>
                  <button type="submit" class="btn btn-primary">Guardar Noticia</button>
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

        
        $('form#addPostForm').on('submit', function(e){
            e.preventDefault();
            toastr.remove();
            var post_content = CKEDITOR.instances.post_content.getData();
            var form = this;
            var fromdata = new FormData(form);
                fromdata.append('post_content', post_content);

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