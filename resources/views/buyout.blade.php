@extends('layouts.my_app')

@section('og_title', "Выкуп авто - Автолидер Брест | Autolider Brest")
@section('title', "Выкуп авто - Автолидер Брест | Autolider Brest")
@section('meta_keyword', "автолидер, брест, автолидер брест, autolider brest, autolider, brest, срочный, срочно, автовыкуп, скупка, выкуп, продать, машина, авто, автомобиль, Беларусь, РБ, аварийный, исправный, целый, битый, дтп")
@section('meta_description', "Срочный выкуп авто в Бресте. Продать машину с нами легко: выкупаем за час|целые и битые|даем 95% стоимости|бесплатно выезжаем по РБ|заключаем договор")


@section('content')
  <div class="container">

    <h2 class="centered">Срочный выкуп Вашего авто</h2>
    <p class="p-select">Рынок подержанных автомобилей переживает кризисные времена: новые авомобили значительно подешевели, поэтому подержанные машины продать быстро и выгодно очень сложно. Но что делать, если деньги нужны уже сейчас?
        </p>
        <p class="p-select">Автолидер Брест купит у Вас автомобиль быстро и максимально выгодно.</p>
    <ul>
      <li class="style">Выкупаем автомобиль за час</li>
      <li class="style">Работаем по всей Беларуси</li>
      <li class="style">Даем 95% рыночной стоимости (зависит от состояния и ликвидности автомобиля)</li>
      <li class="style">Бесплатно выезжаем по всей Беларуси</li>
      <li class="style">Платим наличными на месте</li>
      <li class="style">Выкупаем целые, с техническими проблемами и битые автомобили</li>
      <li class="style">Даём юридические гарантии (заключаем договор)</li>
      <li class="style">Работаем 24 часа 7 дней в неделю</li>
    </ul>

    <div class="row">
      <div class="col-12">
      <h3 class="centered">Схема выкупа Вашего автомобиля<br></h3>
        <br>
        <div class="color-yellow">
          <h4 class="display bold">Оформите <a class="application" href="{{route('buyout.application')}}">заявку</a><br>или позвоните нам</h4>
          <h1 class=" display color-yellow"><img class="arrow-img"  src="{{asset('/storage/arrow.png')}}"></h1>
          <h4 class="display bold">Осматриваем<br>автомобиль</h4>
          <h1 class=" display color-yellow"><img class="arrow-img"  src="{{asset('/storage/arrow.png')}}"></h1>
          <h4 class="display bold">Согласовываем<br>цену</h4>
          <h1 class=" display color-yellow"><img class="arrow-img"  src="{{asset('/storage/arrow.png')}}"></h1>
          <h4 class="display bold">Заключаем договор<br>купли-продажи</h4>
          <h1 class=" display color-yellow"><img class="arrow-img"  src="{{asset('/storage/arrow.png')}}"></h1>
          <h4 class="display bold">Платим<br>наличными</h4></div>
        </div>
      </div>
 
  </div>
@endsection
