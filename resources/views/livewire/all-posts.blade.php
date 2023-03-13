<div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="" class="form-label">Buscar</label>
            <input type="text" class="form-control" placeholder="Buscar..." wire:model='search'>
        </div>
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">Categoría</label>
            <select class="form-select" wire:model='category'>
                <option value="">--- No seleccionado ---</option>
                @foreach (\App\Models\SubCategory::whereHas('posts')->get() as $category)
                    <option value="{{ $category->id }}">{{ $category->subcategory_name }}</option>
                @endforeach
                
            </select>
        </div>

        @if (auth()->user()->type == 1)
            
       
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">Autor</label>
            <select  class="form-select" wire:model='author'>
                <option value="">--- No seleccionado ---</option>
                @foreach(\App\Models\User::whereHas('posts')->get() as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        @endif
        <div class="col-md-2 mb-3">
            <label for="" class="form-label">Ordenar Por</label>
            <select class="form-select" wire:model='orderBy'>
                <option value="asc">Ascendente</option>
                <option value="desc">Descendente</option>
            </select>
        </div>

    </div>
   
   <div class="row row-cards">

    @forelse($posts as $post)
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <img src="/storage/images/post_images/thumbnails/resized_{{$post->featured_image}}" alt="" class="card-img-top">
            <div class="card-body p-2">
                <h3 class="m-0 mb-1">{{$post->post_title}}</h3>
            </div>
            <div class="d-flex">
                <a href="{{ route('author.posts.edit-post',['post_id'=>$post->id]) }}" class="card-btn">Editar</a>
                <a href="" wire:click.prevent='deletePost({{$post->id}})' class="card-btn">Borrar</a>
            </div>
        </div>
    </div>
    @empty
      <span class="text-danger">No se ha encontrado ningúna noticia</span>
    @endforelse

   </div>
   <div class="d-block mt-2">
    {{ $posts->links('livewire::simple-bootstrap') }}
   </div>

</div>
