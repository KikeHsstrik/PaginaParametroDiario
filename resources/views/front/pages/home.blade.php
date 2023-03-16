@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Bienvenido a Parametro Diario')
@section('meta_tags')
    <meta name="robots" content="index,follow"/>
    <meta name="title" content="{{ blogInfo()->blog_name }}"/>
    <meta name="description" content="{{ blogInfo()->blog_description }}"/>
    <meta name="author" content="{{ blogInfo()->blog_name }}"/>
    <link rel="canonical" href="{{ Request::root() }}">
    <meta property="og:title" content="{{ blogInfo()->blog_name }}"/>
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ blogInfo()->blog_description }}"/>
    <meta property="og:url" content="{{ Request::root() }}">
    <meta property="og:image" content="{{ blogInfo()->blog_logo }}"/>
    <meta name="twitter:domain" content="{{ Request::root() }}"/>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" property="og:title" itemprop="name" content="{{ blogInfo()->blog_name }}">
    <meta name="twitter:description" property="og:description" itemprop="description" content="{{ blogInfo()->blog_description }}">
    <meta name="twitter:image" content="{{ blogInfo()->blog_logo }}"/>
@endsection
@section('content')

<div class="container-fluid mt-3 pt-3">
  <div class="container">
    
  </div>
</div>



<div class="container-fluid mt-3 pt-3">
  <div class="container">
  <div class="row">
     

{{--       <div class="col-lg-8">
        <h2 class="section-title mb-3">Mejores Noticias</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/1.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="font-weight-bold text-light bg-dark">"Las autoridades han anunciado un nuevo plan para abordar el problema de ..."</h5>
                <p class="font-weight-bold text-light  text-capitalize">"La situación en [nombre de lugar] sigue siendo tensa después de ..."</p>
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5 mb-3">Ver noticia</button>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5 mb-2">Ver noticia</button>
                <h5 class="font-weight-bold text-light bg-dark">"El gobierno ha aprobado un nuevo</h5>
                <p class="font-weight-bold text-light ">"Los expertos están preocupados por el aumento en los casos de [enfermedad] en todo el mundo.</p>
               
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/3.jpg" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="font-weight-bold text-light bg-dark">"Los residentes de [nombre de lugar] han</h5>
                <p class="font-weight-bold text-light ">"El famoso [nombre de celebridad] ha sorprendido a sus fans con su última declaración sobre ..."</p>
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5 mb-2">Ver noticia</button>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
   
      </div>  --}}
      <div class="col-lg-4">
        <div class="widget-blocks">
        <div class="row">
      
          @if(recommended_posts())
          <div class="col-lg-12 col-md-6">
            <div class="widget">
              <h2 class="section-title mb-3">Recomendados</h2>
              <div class="widget-body">
                <div class="widget-list">
                  @foreach(recommended_posts() as $item)
                  <a class="media align-items-center" href="{{ route('read_post',$item->post_slug) }}">
                    <img loading="lazy" decoding="async" src="/storage/images/post_images/thumbnails/thumb_{{$item->featured_image}}" alt="Post Thumbnail" class="w-100">
                    <div class="media-body ml-3">
                      <h6 style="margin-top:-5px">{{ $item->post_title }}</h6>
                      <p class="mb-0 small">{!! Str::ucfirst(words($item->post_content,7)) !!}</p>
                    </div>
                  </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif
        
      
        
        </div>
        </div>
        </div>
  </div>
  </div>
 </div> 
<div class="row no-gutters-lg mt-1">
    <div class="col-12">
      <h2 class="section-title">Ultimas Noticias</h2>
    </div>
    <div class="col-lg-8 mb-5 mb-lg-0">
      <div class="row">
        <div class="col-12 mb-4">
            @if(single_latest_post())
          <article class="card article-card">
            <a href="{{ route('read_post', single_latest_post()->post_slug) }}">
              <div class="card-image">
                <div class="post-info"> <span class="text-uppercase">{{ date_formatter(single_latest_post()->created_at) }}</span>
                  <span class="text-uppercase">{{ readDuration(single_latest_post()->post_title,single_latest_post()->post_content) }} @choice('min|mins',readDuration(single_latest_post()->post_title,single_latest_post()->post_content)) Leer</span>
                </div>
                <img loading="lazy" decoding="async" src="/storage/images/post_images/{{single_latest_post()->featured_image}}" alt="Post Thumbnail" class="w-100">
              </div>
            </a>
            <div class="card-body px-0 pb-1">
              <h2 class="h1"><a class="post-title" href="{{ route('read_post', single_latest_post()->post_slug) }}">{{single_latest_post()->post_title}}</a></h2>
              <p class="card-text">{!! Str::ucfirst(words(single_latest_post()->post_content,35)) !!}</p>
              <div class="content"> <a class="read-more-btn" href="{{ route('read_post', single_latest_post()->post_slug) }}">Leer Noticia completo</a>
              </div>
            </div>
          </article>
          @endif
        </div>

       @foreach(latest_home_6posts() as $item)
        <div class="col-md-6 mb-4">
          <article class="card article-card article-card-sm h-100">
            <a href="{{ route('read_post',$item->post_slug) }}">
              <div class="card-image">
                <div class="post-info"> <span class="text-uppercase">{{ date_formatter($item->created_at) }}</span>
                  <span class="text-uppercase">{{ readDuration($item->post_title,$item->post_content) }} @choice('min|mins', readDuration($item->post_title,$item->post_content)) Leer</span>
                </div>
                <img loading="lazy" decoding="async" src="/storage/images/post_images/thumbnails/resized_{{$item->featured_image}}" alt="Post Thumbnail" class="w-100">
              </div>
            </a>
            <div class="card-body px-0 pb-0">
              <ul class="post-meta mb-2">
                <li> <a href="{{ route('category_posts',$item->subcategory->slug) }}">{{ $item->subcategory->subcategory_name }}</a>
                </li>
              </ul>
              <h2><a class="post-title" href="{{ route('read_post',$item->post_slug) }}">{{$item->post_title}}</a></h2>
              <p class="card-text">{!! Str::ucfirst(words($item->post_content, 25)) !!}</p>
              <div class="content"> <a class="read-more-btn" href="{{ route('read_post',$item->post_slug) }}">Leer Noticia completo</a>
              </div>
            </div>
          </article>
        </div>
       @endforeach
      </div>
    </div>
    <div class="col-lg-4">
<div class="widget-blocks">
<div class="row">
  <div class="col-lg-12">
    <div class="widget">
      <div class="widget-body">
        <img loading="lazy" decoding="async" src="/front/images/news.jpeg" alt="" class="w-100 author-thumb-sm d-block">
        <h2 class="widget-title my-3">Somos un medio de comunicación enfocado a crear contenido por y para líderes de opinión. </h2>
        <p class="mb-3 pb-2">
          <br>
          Somos contenido libre, independiente, objetivo para
tomadores de decisión en el mundo de economía y finanzas.
        </a>
      </div>
    </div>
  </div>
  @if(recommended_posts())
  <div class="col-lg-12 col-md-6">
    <div class="widget">
      <h2 class="section-title mb-3">Recomendados</h2>
      <div class="widget-body">
        <div class="widget-list">
          @foreach(recommended_posts() as $item)
          <a class="media align-items-center" href="{{ route('read_post',$item->post_slug) }}">
            <img loading="lazy" decoding="async" src="/storage/images/post_images/thumbnails/thumb_{{$item->featured_image}}" alt="Post Thumbnail" class="w-100">
            <div class="media-body ml-3">
              <h3 style="margin-top:-5px">{{ $item->post_title }}</h3>
              <p class="mb-0 small">{!! Str::ucfirst(words($item->post_content,7)) !!}</p>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endif

<x-categories-list/>

</div>
</div>
</div>
  </div>

@endsection