@extends('layouts.my_app')

@section('og_title', "Автолидер Брест | Autolider Brest")
@section('title', "Автолидер Брест | Autolider Brest")
@section('meta_keyword', "автолидер, брест, автолидер брест, autolider, brest, autolider brest,  срочный, срочно, автовыкуп, выкуп, помощь, продать, подбор, подобрать, найти, авто, автомобиль, машина, купить, каталог, качество, профессиональный, автоподбор, разовый осмотр, эксперт на день, авто под ключ, Москва, Московская область, МО, Беларусь, РБ, диагностика, кредит, лизинг")
@section('meta_description', "Срочный выкуп авто. Профессиональная помощь в подборе автомобиля в Бресте. Выезжаем по всей РБ. Продажа подержанных автомобилей")

@section('content')
  <div class="overflow">


    <div id="headerwrap">
      <div class="row">
        <div class="col-lg-4 float-left">
          <ul><a href="{{route('selection')}}"><h1 class="color-yellow">Подбор авто в Бресте:<br></h1></a>
            <li class="circle button-menu"><img class="circle-img"  src="{{asset('/storage/circleOk.png')}}"> Профессионально</li>
            <li class="circle button-menu"><img class="circle-img"  src="{{asset('/storage/circleOk.png')}}"> Результативно</li>
            <li class="circle button-menu"><img class="circle-img"  src="{{asset('/storage/circleOk.png')}}"> Безопасно</li>
          </ul>
          <br>
          <h1 class="centered color-yellow">ЗВОНИТЕ!<br>+375 (29) 243-243-5 <br>
            +375 (29) 906- 70-70</h1>

          </div>
        </div>

        <div class="row">
          <div class="col-12 centered ">
            <a href="{{route('buyout')}}"><h1 class="color-yellow">Срочный выкуп авто: <br></h1></a>
            <br>
            <div class="color-yellow">
              <h4 class="display button-menu">Оформите <a class="buyout" href="{{route('buyout.application')}}">заявку</a><br>или позвоните нам</h4>
              <h1 class=" display color-yellow"><img class="arrow-img"  src="{{asset('/storage/arrow.png')}}"></h1>
              <h4 class="display button-menu">Заключаем договор<br>купли-продажи</h4>
              <h1 class=" display color-yellow"><img class="arrow-img"  src="{{asset('/storage/arrow.png')}}"></h1>
              <h4 class="display button-menu">Платим<br>наличными</h4></div>
            </div>
          </div>
        </div>
        <br>
        <h2 class="bold centered">Наши услуги</h2>
<div class="container">
    <p class="p-select"><a class="btn-link btn-link-select bold main-title" href="{{route('selection')}}">Подбор авто </a> - поможем найти автомобиль Вашей мечты в Бресте и других городах Беларуси! Проведем полную диагностику авто перед покупкой с помощью профессионального диагностического оборудования, а также поможем с оформлением документов. Оставьте <a  class="btn-link btn-link-select  bold" href="#" data-toggle="modal" data-target="#applicationModalCenter">заявку</a>
  на нашем сайте или <a class="btn-link btn-link-select bold" href="tel:+375 29 243-243-5">позвоните</a> нам.</p>
  <!-- Button trigger modal -->
  <br>
  <div class="container w">
    <div class="row centered">
      <div class="col-lg-2 col-sm-4">
        <img class="rounded-circle"  src="{{asset('/storage/look.png')}}">
        <h5 class=" ">Разовый<br>осмотр</h5>
      </div>
      <div class="col-lg-3 col-sm-4">
        <img class="rounded-circle"  src="{{asset('/storage/24.png')}}">
        <h5 class="">Эксперт<br>на день</h5>
      </div>
      <div class="col-lg-2 col-sm-4">
        <img class="rounded-circle"  src="{{asset('/storage/key.png')}}">
        <h5 class="">Авто<br>под ключ</h5>
      </div>
      <div class="col-lg-3 col-sm-4">
        <img class="rounded-circle"  src="{{asset('/storage/rus.png')}}">
        <h5 class="">Авто<br>из Москвы и МО</h5>
      </div>
      <div class="col-lg-2 col-sm-4">
        <img class="rounded-circle"  src="{{asset('/storage/eu.jpg')}}">
        <h5 class="">Авто<br>из Европы</span></h5>
      </div>
    </div>
  </div>
  <br>
  <h4 class="bold">У нас вы можете рассчитать таможенную пошлину на автомобиль из Европы: <button class="btn btn-select" type="button" data-toggle="collapse" data-target="#calculatorStartExample" aria-expanded="false" aria-controls="calculatorStartExample">
    <span class="calculator">Таможенный калькулятор</span>
</button>
</h4>
<div class="collapse" id="calculatorStartExample">
  <div class="card card-body">
    <calculator-component></calculator-component>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="applicationModalCenter" tabindex="-1" role="dialog" aria-labelledby="applicationModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applicationModalLongTitle">Укажите Ваше имя и номер телефона и мы вскоре с Вами свяжемся</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <selection-component message="Заявка на подбор"></selection-component>
      </div>
    </div>
  </div>
</div>

<hr>
<p class="p-select"><a class="btn-link btn-link-select bold main-title" href="{{route('buyout')}}">Срочный выкуп авто </a> - Продать машину с нами легко и быстро! Выкупаем автомобили в Бресте и других городах Беларуси в любом техническом состоянии за 1 час. Даем 95% рыночной стоимости! Оставьте <a class="btn-link btn-link-select bold" href="{{route('buyout.application')}}">заявку</a>
на нашем сайте или <a class="btn-link btn-link-select bold" href="tel:+375 29 243-243-5">позвоните</a> нам.</p>
<hr>
<p class="p-select"><a class="btn-link btn-link-select bold main-title" href="{{route('catalog')}}">Каталог авто </a> - Хотите купить б/у автомобиль? Мы поможем Вам! У нас большой выбор машин, поможем оформить лизинг или кредит.</p>
  <div class="container ">
    {{-- <h3 class=" bold centered">Наши партнеры<br></h3> --}}
    <br>
    <div class="row centered">
      <div class="col-sm-6">
        <img class="rounded-circle partners "  src="{{asset('/storage/mogo.png')}}">
      </div>
      <div class="col-sm-6">
        <img class="rounded-circle partners "  src="{{asset('/storage/ideabank.png')}}">
      </div>
    </div>
  </div>
<br class=""><hr><br>
</div>
        <h2 class="bold centered">Почему Автолидер Брест</h2>
        <br>
        <div class="container w">
          <div class="row centered">
            <div class="col-lg-2 col-sm-4">
              <img class="rounded-circle"  src="{{asset('/storage/contract.png')}}">
              <h5 class=" ">Заключаем<br>официальный <span class="bold">договор</span></h5>
            </div>
            <div class="col-lg-2 col-sm-4">
              <img class="rounded-circle"  src="{{asset('/storage/map.png')}}">
              <h5 class="">Работаем<br>по всей <span class="bold">РБ</span></h5>
            </div>
            <div class="col-lg-2 col-sm-4">
              <img class="rounded-circle"  src="{{asset('/storage/testing.png')}}">
              <h5 class="">Качественная<br><span class="bold">диагностика</span> авто</h5>
            </div>
            <div class="col-lg-2 col-sm-4">
              <img class="rounded-circle"  src="{{asset('/storage/time.png')}}">
              <h5 class="">Экономим<br>Ваше <span class="bold">время</span></h5>
            </div>
            <div class="col-lg-2 col-sm-4">
              <img class="rounded-circle"  src="{{asset('/storage/money.png')}}">
              <h5 class="">Торгуемся за каждый<br>Ваш <span class="bold">доллар</span></h5>
            </div>
            <div class="col-lg-2 col-sm-4">
              <img class="rounded-circle"  src="{{asset('/storage/help.png')}}">
              <h5 class="">Поможем с<br><span class="bold">оформлением</span> документов</h5>
            </div>
          </div>
        </div>
        <br>
      </div>



    @endsection
