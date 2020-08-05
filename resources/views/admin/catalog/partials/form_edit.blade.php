<div class="row">
  <div class="col-sm-5">
    <label for="title">Наименование</label>
    <input type="text" class="form-control" name="title" placeholder="Марка авто" value="{{$catalog->title ?? ""}}" required>
  </div>
  <div class="col-sm-2">
    <label for="manufactured">Год выпуска</label>
    <input type="text" class="form-control" name="manufactured" placeholder="Год выпуска" value="{{$catalog->manufactured ?? ""}}" required>
  </div>
  <div class="col-sm-2">
    <label for="mileage">Пробег</label>
    <input type="text" class="form-control" name="mileage" placeholder="Пробег" value="{{$catalog->mileage ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="price">Цена</label>
    <input type="text" class="form-control" name="price" placeholder="Цена" value="{{$catalog->price ?? ""}}" required>
  </div>
</div>

<br>
<div class="row">
  <div class="col-sm-2">
    @if ($catalog->air_conditioning == 1)
      <p>Кондиционер <input type="checkbox" name="air_conditioning" value="1" checked></p>
      @else
        <p>Кондиционер <input type="checkbox" name="air_conditioning" value="1"></p>
    @endif
  </div>
    <div class="col-sm-2">
      @if ($catalog->leather_interior == 1)
        <p>Кожаный салон <input type="checkbox" name="leather_interior" value="1" checked></p>
      @else
        <p>Кожаный салон <input type="checkbox" name="leather_interior" value="1"></p>
      @endif
  </div>
  <div class="col-sm-3">
       @if ($catalog->alloy_wheels == 1)
         <p>Легкосплавные диски <input type="checkbox" name="alloy_wheels" value="1" checked></p>
       @else
         <p>Легкосплавные диски <input type="checkbox" name="alloy_wheels" value="1"></p>
       @endif
  </div>
  <div class="col-sm-2">
    @if ($catalog->xenon == 1)
      <p>Ксенон <input type="checkbox" name="xenon" value="1" checked></p>
    @else
      <p>Ксенон <input type="checkbox" name="xenon" value="1"></p>
    @endif
  </div>
  <div class="col-sm-2">
    @if ($catalog->speakerphone == 1)
      <p>Громкая связь <input type="checkbox" name="speakerphone" value="1" checked></p>
    @else
      <p>Громкая связь <input type="checkbox" name="speakerphone" value="1"></p>
    @endif
  </div>
</div>

<hr>
<div class="row">
  <div class="col-sm-2">
    @if ($catalog->parking_sensors == 1)
      <p>Парктроник <input type="checkbox" name="parking_sensors" value="1" checked></p>
    @else
      <p>Парктроник <input type="checkbox" name="parking_sensors" value="1"></p>
    @endif
  </div>
  <div class="col-sm-2">
    @if ($catalog->heated_seats == 1)
      <p>Подогрев сидений <input type="checkbox" name="heated_seats" value="1" checked></p>
    @else
      <p>Подогрев сидений <input type="checkbox" name="heated_seats" value="1"></p>
    @endif
  </div>
  <div class="col-sm-3">
    @if ($catalog->stabilization_control)
      <p>Система контроля стабилизации <input type="checkbox" name="stabilization_control" value="1" checked></p>
    @else
      <p>Система контроля стабилизации <input type="checkbox" name="stabilization_control" value="1"></p>
    @endif
  </div>
  <div class="col-sm-2">
    @if ($catalog->navigation)
      <p>Навигация <input type="checkbox" name="navigation" value="1" checked></p>
    @else
      <p>Навигация <input type="checkbox" name="navigation" value="1"></p>
    @endif
  </div>
</div>
<hr>
<label for="">Статус</label>
@if ($catalog->status == 'published')
  <p><input type="radio" name="status" value="published" checked>Опублковано</p>
  <p><input type="radio" name="status" value="not_published">Не опублковано</p>
  <p><input type="radio" name="status" value="buyout">Выкуп</p>
@elseif ($catalog->status == 'not_published')
  <p><input type="radio" name="status" value="published">Опублковано</p>
  <p><input type="radio" name="status" value="not_published" checked>Не опублковано</p>
  <p><input type="radio" name="status" value="buyout">Выкуп</p>
@elseif ($catalog->status == 'buyout')
  <p><input type="radio" name="status" value="published">Опублковано</p>
  <p><input type="radio" name="status" value="not_published">Не опублковано</p>
  <p><input type="radio" name="status" value="buyout" checked>Выкуп</p>
@endif

<hr>
<label for="">Краткое описание</label>
<textarea class="form-control"  name="short_description" rows="3" cols="20">{{$catalog->short_description ?? ""}}</textarea>
<br>
<label for="">Описание</label>
<textarea class="form-control"  name="description" rows="5" cols="50">{{$catalog->description ?? ""}}</textarea>
<br>
<label for="">Мета слова</label>
<textarea class="form-control" id="editor-body" name="meta_keywords" rows="5" cols="50">{{$catalog->meta_keywords ?? ""}}</textarea>
<br>
<label for="">Мета описание</label>
<textarea class="form-control" id="editor-body" name="meta_description" rows="5" cols="50">{{$catalog->meta_description ?? ""}}</textarea>
<br>
@foreach ($images as $image)
  <div class="row">
    <div class="col-6">
        <div class="pics">
            <div class="image"><input id="{{$image->id}}" class="image-checkbox" type="checkbox"><label class="image-label" for="{{$image->id}}" style="background-image: url({{asset('/storage/' . $image->path)}}); background-size: contain;"></label></div>
          </div>
      <!--<img class="img-thumbnail"  src="{{asset('/storage/' . $image->path)}}"  alt="Card image cap">-->
    </div>
    <div class="col-6">
      <p><input type="checkbox" name="image" value="{{$image->id}}">Удалить</p>
      @if ($image->main == 1)
        <p><input type="radio" name="main_image" value="{{$image->id}}" checked>Основная</p>
      @else
        <p><input type="radio" name="main_image" value="{{$image->id}}">Основная</p>
      @endif
    </div>
    <br>
    
   </div>
@endforeach
<br>
<label class="text-center">Основная фотография</label>
<input type="file"  name="new_main_image" class="form-control-file">
<br>
<label class="text-center">Фотографии</label>
<input type="file"  name="images[]" class="auto-image" multiple>
<br>

<input class="btn btn-primary" type="submit"  value="Сохранить">
