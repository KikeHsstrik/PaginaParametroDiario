@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Inicio')
@section('content')
<style>
    .masthead {
padding-top: 25px;
  padding-bottom: 6rem;
}
.masthead .masthead-heading {
  font-size: 2.75rem;
  line-height: 2.75rem;
}
.masthead .masthead-subheading {
  font-size: 1.25rem;
}
.masthead .masthead-avatar {
  width: 15rem;
}

@media (min-width: 992px) {
  .masthead {
    padding-top: 25px;
    padding-bottom: 6rem;
  }
  .masthead .masthead-heading {
    font-size: 4rem;
    line-height: 3.5rem;
  }
  .masthead .masthead-subheading {
    font-size: 1.5rem;
  }
}
</style>


    <div class="masthead text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar" src="\img\admin.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-black text-uppercase mb-0">Bienvenido!!</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line text-black ">-----------------------------</div>
                    <div class="divider-custom-icon">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m6.516 14.323-1.49 6.452a.998.998 0 0 0 1.529 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822 0L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107zm2.853-4.326a.998.998 0 0 0 .832-.586L12 5.43l1.799 3.981a.998.998 0 0 0 .832.586l3.972.315-3.271 2.944c-.284.256-.397.65-.293 1.018l1.253 4.385-3.736-2.491a.995.995 0 0 0-1.109 0l-3.904 2.603 1.05-4.546a1 1 0 0 0-.276-.94l-3.038-2.962 4.09-.326z"></path></svg>
                    </div>
                    <div class="divider-custom-line text-black ">-----------------------------</div>
                </div>
                <!-- Masthead Subheading-->
                <p class="font-weight-bold masthead-subheading text-black font-weight-light mb-0">PARÁMETRO DIARIO</p>
            </div>
        </div>


@endsection