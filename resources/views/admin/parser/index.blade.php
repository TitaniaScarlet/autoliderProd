@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
          <form class="form-horizontal" action="{{route('admin.parser.form')}}" method="get">
<label for="">Марка автомобиля</label>
            <select class="form-control" name="marka">
              @foreach ($markas as $marka)
                @if (isset($select_marka) && $select_marka == $marka['id'])
                  <option value="{{$marka['id'] ?? ""}}" selected>{{$marka['label'] ?? ""}}</option>
                  @else
                    <option value="{{$marka['id'] ?? ""}}">{{$marka['label'] ?? ""}}</option>
                @endif
              @endforeach
              </select>
              <br>

              @if (isset($models))
                <label for="">Модель автомобиля</label>

                <select class="form-control" name="model">
                  @foreach ($models as $model)
                        <option value="{{$model['id'] ?? ""}}">{{$model['label'] ?? ""}}</option>
                  @endforeach
                  </select>
<br>
                  <div class="row">
                  <div class="col-sm-6">
                    <label for="">Год от</label>
                    <input type="text" class="form-control" name="min_year">
                  </div>
                  <div class="col-sm-6">
                    <label for="">Год до</label>
                    <input type="text" class="form-control" name="max_year">
                  </div>
                  </div>
<br>
                  <div class="row">
                  <div class="col-sm-6">
                    <label for="">Минимальная цена, USD</label>
                    <input type="text" class="form-control" name="min_price">
                  </div>
                  <div class="col-sm-6">
                    <label for="">Максимальная цена, USD</label>
                    <input type="text" class="form-control" name="max_price">
                  </div>
                  </div>
<br>
                  <label for="">Название парсера</label>
                  <input type="text" class="form-control" name="title" required>
              @endif
              <br>
              <input class="btn btn-primary" type="submit"  value="Отправить">
          </form>


   {{-- @foreach ($models as $model)
    @foreach ($model as $key => $value)
      <p>{{$model['id']}} - {{$model['label']}}</p>
    @endforeach
   @endforeach --}}
          {{-- <parser-component></parser-component> --}}
  </div>
@endsection
