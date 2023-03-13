@extends('front.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Welcome to Larablog')
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
  <div class="row">
      
      <div class="col-lg-6 px-0">
          <div class="position-relative overflow-hidden" style="height: 500px;">
              <img class="img-fluid w-100 h-100" src="img\image4.png" style="object-fit: cover;">
              <div class="overlay">
                  <div class="mb-2">
                      <a class="badge color-verde2-default text-uppercase font-weight-semi-bold p-2 mr-2"
                          href="">Local</a>
                      <a class="text-white" href=""><small>Febrero 11, 2023</small></a>
                  </div>
                  <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">En Tulancingo hay 200 combis con sistemas de videovigilancia</a>
              </div>
          </div>
          
      </div>
      <div class="col-lg-6 px-0">
          <div class="row mx-0">
              <div class="col-md-6 px-0">
                  <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="img\image4.png" style="object-fit: cover;">
                      <div class="overlay">
                          <div class="mb-2">
                              <a class="badge color-verde2-default text-uppercase font-weight-semi-bold p-2 mr-2"
                                  href="">Local</a>
                              <a class="text-white" href=""><small>Febrero 11, 2023</small></a>
                          </div>
                          <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">En Tulancingo hay 200 combis con sistemas de videovigilancia</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 px-0">
                  <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="img\image5.png" style="object-fit: cover;">
                      <div class="overlay">
                          <div class="mb-2">
                              <a class="badge color-verde2-default text-uppercase font-weight-semi-bold p-2 mr-2"
                                  href="">Local</a>
                              <a class="text-white" href=""><small>Febrero 10, 2023</small></a>
                          </div>
                          <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Benjamín Rico inauguró el programa Primero tu Salud</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 px-0">
                  <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="img\image6.jpg" style="object-fit: cover;">
                      <div class="overlay">
                          <div class="mb-2">
                              <a class="badge color-verde2-default text-uppercase font-weight-semi-bold p-2 mr-2"
                                  href="">Local</a>
                              <a class="text-white" href=""><small>Febrero 9, 2023</small></a>
                          </div>
                          <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Conoce a la Cholondrina, bailarina que se viralizó con Medio Metro</a>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 px-0">
                  <div class="position-relative overflow-hidden" style="height: 250px;">
                      <img class="img-fluid w-100 h-100" src="img\image7.png" style="object-fit: cover;">
                      <div class="overlay">
                          <div class="mb-2">
                              <a class="badge color-verde2-default text-uppercase font-weight-semi-bold p-2 mr-2"
                                  href="">Local</a>
                              <a class="text-white" href=""><small>Febrero 7, 2023</small></a>
                          </div>
                          <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Entregaron tarjetas a productores en Actopan</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
 </div> 
<div class="row no-gutters-lg mt-3">
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