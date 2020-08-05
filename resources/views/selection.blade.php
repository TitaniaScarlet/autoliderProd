@extends('layouts.my_app')

@section('og_title', "Подбор авто - Автолидер Брест | Autolider Brest")
@section('title', "Подбор авто - Автолидер Брест | Autolider Brest")
@section('meta_keyword', "автолидер, брест, автолидер брест, autolider, brest, autolider brest, помощь, подбор, подобрать, найти, поиск, авто, машина, автомобиль, разовый осмотр, эксперт на день, авто под ключ, Москва, Московская область, МО, автоподбор, Беларусь, РБ, диагностика, брестская, область")
@section('meta_description', "Подбор автомобиля в Бресте. Компьютерная диагностика. Официальный договор. Разовый осмотр. Эксперт на день. Авто под ключ в РБ или в Москве и МО")

@section('content')

  <div class="container">
    <h2 class="centered">С чего начать подбор авто?</h2>

    <p class="p-select">Определитесь с желаемой моделью или несколькими. Проанализируйте диапазон цен на интересующие автомобили. При подборе авто, помните, самый дешёвый автомобиль не будет достойным. </p>
    <p class="p-select">Если вы решите подобрать автомобиль с помощью Автолидер Брест, в этом случае вы можете рассчитывать на такие преимущества:</p>
    <ul>
      <li class="style">Делаем полную проверку авто с помощью профессионального технического оборудования</li>
      <li class="style">Даем реальную оценку стоимости автомобиля и целесообразности его покупки</li>
      <li class="style">Знаем уловки недобросовестных продавцов авто</li>
      <li class="style">Умеем торговаться, как следствие экономим Ваши деньги</li>
      <li class="style">Заключаем официальный договор</li>
      <li class="style">Работаем по всей РБ</li>
    </ul>
    <h4 class="bold">У нас вы можете рассчитать таможенную пошлину на автомобиль из Европы: <button class="btn btn-select bold" type="button" data-toggle="collapse" data-target="#calculatorExample" aria-expanded="false" aria-controls="calculatorExample">
  <span class="calculator">Таможенный калькулятор</span>
  </button>
</h4>
<div class="collapse" id="calculatorExample">
  <div class="card card-body">
    <calculator-component></calculator-component>
  </div>
</div>
<br>
    <div class="row">
      <div class="col-md-4">
        @include('partials.inspection')
      </div>
      <div class="col-md-4">
        @include('partials.day')
      </div>
      <div class="col-md-4">
        @include('partials.key')
      </div>

    </div>
    <br>
    <div class="row">
      <div class="col-md-2">
      </div>

      <div class="col-md-4">
        @include('partials.moscow')
      </div>
      <div class="col-md-4">
        @include('partials.europe')
      </div>
      <div class="col-md-2">
      </div>

    </div>

  </div>


@endsection
