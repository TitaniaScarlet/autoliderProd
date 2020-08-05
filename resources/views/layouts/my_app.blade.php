<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153979253-1"></script>
{{-- <script type="text/javascript" src="{{asset('resources/js/qb/qb/js/qb.js')}}"></script> --}}
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153979253-1');
</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(56545447, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56545447" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

    <meta name="google-site-verification" content="aLysSfuZPfpMPtpyWlZ3xTp5AufyPFrOg7CyR5wdE5A" />
    <!--<meta name="yandex-verification" content="dc86095f4ca6a562" />-->
    <meta name='wmail-verification' content='d7edd8f153140333b801128acf300a7c' />
    <meta name="yandex-verification" content="dc86095f4ca6a562" />


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{asset('/storage/meta.png')}}">
    <meta property="og:title" content="@yield('og_title')">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
<meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">




<link rel="shortcut icon" href="{{asset('/storage/favicon.ico')}}" type="image/x-icon">
</head>
<body>
    <div id="app">
      <div class="">
        <nav class="navbar navbar-expand-lg navbar-inverse shadow-sm ">
  <a class="navbar-brand" href="{{ url('/') }}">
<img class="card-img-top img-brand"  src="{{asset('/storage/embllastwhite.png')}}">
</a>
<button class="button-menu navbar-toggler float-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
<span><img class="img-operator"  src="{{asset('/storage/menu.png')}}"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto element-center">

@if ($page == 1)
<li class="nav-item active"><a class="nav-link nav"  href="{{route('start')}}">Главная</a></li>
@else
<li class="nav-item "><a class="nav-link nav"  href="{{route('start')}}">Главная</a></li>
@endif

@if ($page == 2)
<li class="nav-item active"><a class="nav-link nav"  href="{{route('selection')}}">Подбор авто</a></li>
@else
<li class="nav-item"><a class="nav-link nav"  href="{{route('selection')}}">Подбор авто</a></li>
@endif

@if ($page == 3)
<li class="nav-item active"><a class="nav-link nav"  href="{{route('buyout')}}">Выкуп авто</a></li>
@else
<li class="nav-item"><a class="nav-link nav"  href="{{route('buyout')}}">Выкуп авто</a></li>
@endif

@if ($page == 4)
<li class="nav-item active"><a class="nav-link nav"  href="{{route('catalog')}}">Каталог</a></li>
@else
<li class="nav-item"><a class="nav-link nav"  href="{{route('catalog')}}">Каталог</a></li>
@endif

      {{-- @if ($page == 6)
      <li class="nav-item active"><a class="nav-link nav"  href="{{route('calculator')}}">Калькулятор</a></li>
      @else
      <li class="nav-item"><a class="nav-link nav"  href="{{route('calculator')}}">Калькулятор</a></li>
      @endif --}}

@if ($page == 5)
<li class="nav-item active"><a class="nav-link nav"  href="{{route('contacts')}}">Контакты</a></li>
@else
<li class="nav-item"><a class="nav-link nav"  href="{{route('contacts')}}">Контакты</a></li>
@endif
</ul>
</div>
<h6 class="color navbar-tel">
  <img class="img-operator"  src="{{asset('/storage/unnamed.png')}}"> <a class="nav-tel" href="tel:+375 29 243-243-5">+375 (29) 243-243-5</a><br>
  <img class="img-operator"  src="{{asset('/storage/A1.jpg')}}"> <a class="nav-tel" href="tel:+375 29 906-70-70">+375 (29) 906-70-70</a>  <br>
9.00-21.00 без выходных</h6>
      </nav>
</div>
        <main class="py-4">
            @yield('content')
        </main>
        <footer id="footer" >

          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <p><span class="bold">Автолидер Брест</span> - Помощь в подборе автомобиля. Срочный выкуп авто. Продажа автомобилей</p>
                <p>9.00-21.00 без выходных</p>
              </div>
              <div class="col-md-4 float-right">
                <p><img class="img-operator"  src="{{asset('/storage/unnamed.png')}}"><a  href="tel:+375 29 243-243-5">+375 (29) 243-243-5</a></p>
                <p><img class="img-operator"  src="{{asset('/storage/A1.jpg')}}"><a  href="tel:+375 29 906-70-70">+375 (29) 906-70-70</a></p>
                <p><a href="mailto:autoliderbrest24@gmail.com">AutoliderBrest24@gmail.com</a></p>
                <p>Мы в соцсетях: <a  href="https://vk.com/widget_community.php?act=a_subscribe_box&oid=-188297581&state=1" class="vk"><img class="img-operator"  src="{{asset('/storage/vk.png')}}"></a> <a  href="https://www.instagram.com/autoliderbrest.by/" class="vk"><img class="img-operator"  src="{{asset('/storage/inst.png')}}"></a></p>
              </div>
                          </div>

          </div>
          <p class="float-right made">Made by <a href="http://titaniascarlet.github.io./">Dubitskaya Olga</a></p>
        </footer>
      </div>


</body>
</html>
