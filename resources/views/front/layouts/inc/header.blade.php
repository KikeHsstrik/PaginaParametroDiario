
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css\style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css\2nd_Styles.css')}}">


<header class="navigation">
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center color-verde1-default px-lg-5">
            <div class="col-lg-12">
                <nav class="navbar justify-content-center  navbar-expand-sm color-verde1-default  p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item">
                            <a class="nav-link text-dark medium px-3" href="#">Pachuca de Soto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark medium px-3" href="#">27/01/2023</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark medium px-3" href="#">Actualizado 09:20 AM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark medium px-3" href="#">Clima: Soleado</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-dark medium px-3" href="#">Hoy N/Circula: Martes 7 y 8 </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </div>
        <div class="row align-items-center color-verde2-default py-3 px-lg-5">
            <div class="col-lg-12">
                <a href="" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase  text-center  text-white"> <img class="img-fluid" 
                        height="50px" width="70px" src="{{ asset('img/logo.png') }}" alt=""> Parámetro<span class="text-white   text-center font-weight-normal">  Diario</span></h1>
                </a>
            </div>
            
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
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
                <input id="search-query" name="query" value="{{ Request('query') }}" type="search" placeholder="Search..." autocomplete="off">
            </form>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                    <li class="nav-item"> <a href="/" class="nav-link" href="about.html">Inicio</a>
                    </li>
                    @foreach( \App\Models\Category::whereHas('subcategories', function($q){
                        $q->whereHas('posts');
                    })->orderBy('ordering','asc')->get() as $category )
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $category->category_name }}
                        </a>
                        <div class="dropdown-menu"> 
                            @foreach( \App\Models\SubCategory::where('parent_category',$category->id)->whereHas('posts')->orderby('ordering','asc')->get() as $subcategory )
                            <a class="dropdown-item" href="{{ route('category_posts',$subcategory->slug) }}">{{ $subcategory->subcategory_name }}</a>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                    @foreach( \App\Models\SubCategory::where('parent_category',0)->whereHas('posts')->orderBy('ordering','asc')->get() as $subcategory )
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category_posts',$subcategory->slug) }}">{{ $subcategory->subcategory_name }}</a>
                    </li>
                    @endforeach
                    <li class="nav-item"> <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
