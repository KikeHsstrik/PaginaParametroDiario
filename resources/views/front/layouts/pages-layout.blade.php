<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>@yield('pageTitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    @yield('meta_tags')
    <link rel="shortcut icon" href="{{ blogInfo()->blog_favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ blogInfo()->blog_favicon }}" type="image/x-icon">

    <!-- theme meta -->
    <meta name="theme-name" content="reporter" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
{{-- 
    <link
        href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"> --}}

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="/front/plugins/bootstrap/bootstrap.min.css">
    @stack('stylesheets')

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="/front/css/style.css">
    <link rel="stylesheet" href="{{ asset('css\2nd_Styles.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    
 


</head>

<body>

   @include('front.layouts.inc.header')

    <main>
        <section class="section">
            <div class="container">
                @yield('content')
            </div>
        </section>
    </main>

  @include('front.layouts.inc.footer')


    <!-- # JS Plugins -->
    <script src="/front/plugins/jquery/jquery.min.js"></script>
    <script src="/front/plugins/bootstrap/bootstrap.min.js"></script>
    @stack('scripts')
    <!-- Main Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/front/js/script.js"></script>

</body>

</html>