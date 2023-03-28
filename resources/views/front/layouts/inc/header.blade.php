
    <!-- Customized Bootstrap Stylesheet -->

    <link rel="stylesheet" href="{{ asset('css\2nd_Styles.css')}}">

    

<header class="navigation  fondo-verdecuadro">
     <div class="container-fluid d-none d-lg-block">

        <div class="row align-items-center color-verde1-default px-lg-5">
            <div class="col-lg-12">
                <nav class="navbar justify-content-center navbar-expand-sm color-verde1-default p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item">
                            <a class="nav-link text-dark medium px-3 font-weight-bold" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(245, 0, 0, 1);transform: ;msFilter:;"><path d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z"></path><path d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.005.021 4.438-4.388 8.423-6 9.73-1.611-1.308-6.021-5.294-6-9.735 0-3.309 2.691-6 6-6z"></path></svg>
                                 <span id="ubicacion"></span></a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link text-dark medium px-3 font-weight-bold" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(66, 119, 225);transform: ;msFilter:;"><path d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z"></path></svg>
                             <span id="fecha"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark medium px-3 font-weight-bold" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(16, 1, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M13 7h-2v5.414l3.293 3.293 1.414-1.414L13 11.586z"></path></svg>
                                <span id="hora"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark medium px-3 font-weight-bold" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(21, 138, 238, 0.99);transform: ;msFilter:;"><path d="M18.944 11.112C18.507 7.67 15.56 5 12 5 9.244 5 6.85 6.611 5.757 9.15 3.609 9.792 2 11.82 2 14c0 2.757 2.243 5 5 5h11c2.206 0 4-1.794 4-4a4.01 4.01 0 0 0-3.056-3.888zM18 17H7c-1.654 0-3-1.346-3-3 0-1.404 1.199-2.756 2.673-3.015l.581-.102.192-.558C8.149 8.274 9.895 7 12 7c2.757 0 5 2.243 5 5v1h1c1.103 0 2 .897 2 2s-.897 2-2 2z"></path></svg>
                                Clima:
                                 <span id="Clima"></span>
                              </a>
                              
                          </li>
                       
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row align-items-center color-verde2-default py-3 px-lg-5">
            <div class="col-lg-12">
                <a href="" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase  font-weight-bold text-center   text-white"> <img class="img-fluid" 
                        height="50px" width="70px" src="{{ asset('img/logo.png') }}" alt=""> Parámetro<span class="text-white   text-center font-weight-normal">  Diario</span></h1>
                </a>
            </div>
            
        </div>
    </div> 
    <div class="container">

        <nav class="navbar navbar-expand-lg  navbar-light px-0">
            <a class="navbar-brand order-1 py-0" href="/">
                <img loading="prelaod" decoding="async" class="img-fluid" src="{{ blogInfo()->blog_logo }}"
                    alt="{{ blogInfo()->blog_name }}" style="max-width: 100px">
            </a>
            
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button"
                    data-toggle="collapse" data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        
            <form action="{{ route('search_posts') }}" class="search order-lg-3 order-md-2 order-3 ml-auto">
                
                <input id="search-query" name="query" value="{{ Request('query') }}" type="search" placeholder="Buscar..." autocomplete="off">
            </form>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                   
                    <li class="nav-item"> <a class="nav-link font-weight-bold" href="/"> 
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgb(66, 70, 66);transform: ;msFilter:;">
                        <path d="M12.74 2.32a1 1 0 0 0-1.48 0l-9 10A1 1 0 0 0 3 14h2v7a1 1 0 0 0 1 
                        1h12a1 1 0 0 0 1-1v-7h2a1 1 0 0 0 1-1 1 1 0 0 0-.26-.68z"></path></svg> Inicio</a>
                    </li>
                    @foreach( \App\Models\Category::whereHas('subcategories', function($q){
                        $q->whereHas('posts');
                    })->orderBy('ordering','asc')->get() as $category )
                    <li class="nav-item dropdown "> <a class="nav-link dropdown-toggle  font-weight-bold" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $category->category_name }}
                        </a>
                        <div class="dropdown-menu"> 
                            @foreach( \App\Models\SubCategory::where('parent_category',$category->id)->whereHas('posts')->orderby('ordering','asc')->get() as $subcategory )
                            <a class="dropdown-item  font-weight-bold" href="{{ route('category_posts',$subcategory->slug) }}">{{ $subcategory->subcategory_name }}</a>
                            @endforeach
                        </div>
                    </li>;
                    @endforeach
                    @foreach( \App\Models\SubCategory::where('parent_category',0)->whereHas('posts')->orderBy('ordering','asc')->get() as $subcategory )
                    <li class="nav-item"> <a class="nav-link  font-weight-bold" href="{{ route('category_posts',$subcategory->slug) }}">{{ $subcategory->subcategory_name }}</a>
                    </li>
                    @endforeach
                    <li class="nav-item"><a class="nav-link  font-weight-bold" href="{{ route('denuncia_ciudadana') }}" >Denuncia Ciudadana</a> </li>
                   
                </ul>
            </div>
        </nav>
    </div>
</header>
