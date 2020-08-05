@extends('layouts.my_app')

@section('title', "Выкуп авто - Автолидер Брест | Autolider Brest")

@section('content')
  <div class="container">
    <h2 class="centered">Заявка на срочный выкуп Вашего автомобиля</h2>
    <br>
    <form class="form-horizontal" action="{{route('buyout.message')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-6">
          <label for="title">Имя</label>
          <input type="text" class="form-control" name="name" placeholder="Имя"  required>
        </div>
        <div class="col-lg-4">
          <label for="number">Номер телефона</label>
          <input type="text" class="form-control" name="number" placeholder="Номер телефона" maxlength="13" required>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-lg-5 col-sm-8">
          <label for="title">Наименование</label>
          <input type="text" class="form-control" name="title" placeholder="Марка авто"  required>
        </div>
        <div class="col-lg-2 col-sm-4">
          <label for="manufactured">Год выпуска</label>
          <input type="text" class="form-control" name="manufactured" placeholder="Год выпуска"  required>
        </div>
        <div class="col-lg-2 col-sm-4">
          <label for="mileage">Пробег, км</label>
          <input type="text" class="form-control" name="mileage" placeholder="Пробег"  required>
        </div>
        <div class="col-lg-3 col-sm-4">
          <label for="price">Цена, рублей</label>
          <input type="text" class="form-control" name="price" placeholder="Цена" maxlength="6" required>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-lg-2 col-md-4 col-sm-6">
          <p><input type="checkbox" name="air_conditioning" value="1"> Кондиционер </p>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <p><input type="checkbox" name="leather_interior" value="1"> Кожаный салон </p>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <p><input type="checkbox" name="alloy_wheels" value="1"> Легкосплавные диски </p>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <p><input type="checkbox" name="xenon" value="1"> Ксенон </p>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
          <p><input type="checkbox" name="speakerphone" value="1"> Громкая связь </p>
        </div>
      </div>

      <hr>
      <div class="row">
        <div class="col-lg-2 col-md-6">
          <p><input type="checkbox" name="parking_sensors" value="1"> Парктроник </p>
        </div>
        <div class="col-lg-3 col-md-6">
          <p><input type="checkbox" name="heated_seats" value="1"> Подогрев сидений </p>
        </div>
        <div class="col-lg-4 col-md-6">
          <p><input type="checkbox" name="stabilization_control" value="1"> Система контроля стабилизации </p>
        </div>
        <div class="col-lg-2 col-md-6">
          <p><input type="checkbox" name="navigation" value="1"> Навигация </p>
        </div>
      </div>
      <hr>
      <label for="">Описание</label>
      <textarea class="form-control"  name="description" rows="5" cols="50">{{$catalog->description ?? ""}}</textarea>
      <br>
      <label class="text-center">Фотографии</label>
      <input type="file"  name="images[]" class="form-control-file" multiple>

      <br>
      <input class="btn btn-select" type="submit"  value="Оформить заявку">

    </form>
  </div>
@endsection
