<br>
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
    <p>Кондиционер <input type="checkbox" name="air_conditioning" value="1"></p>
  </div>
  <div class="col-sm-2">
    <p>Кожаный салон <input type="checkbox" name="leather_interior" value="1"></p>
  </div>
  <div class="col-sm-3">
    <p>Легкосплавные диски <input type="checkbox" name="alloy_wheels" value="1"></p>
  </div>
  <div class="col-sm-2">
    <p>Ксенон <input type="checkbox" name="xenon" value="1"></p>
  </div>
  <div class="col-sm-2">
    <p>Громкая связь <input type="checkbox" name="speakerphone" value="1"></p>
  </div>
</div>

<hr>
<div class="row">
  <div class="col-sm-2">
    <p>Парктроник <input type="checkbox" name="parking_sensors" value="1"></p>
  </div>
  <div class="col-sm-2">
    <p>Подогрев сидений <input type="checkbox" name="heated_seats" value="1"></p>
  </div>
  <div class="col-sm-3">
    <p>Система контроля стабилизации <input type="checkbox" name="stabilization_control" value="1"></p>
  </div>
  <div class="col-sm-2">
    <p>Навигация <input type="checkbox" name="navigation" value="1"></p>
  </div>
</div>
<hr>
<label for="status">Статус</label>
<p><input type="radio" name="status" value="published">Опублковано</p>
<p><input type="radio" name="status" value="not_published">Не опублковано</p>
<br>
<label for="">Краткое описание</label>
<textarea class="form-control"  name="short_description" rows="3" cols="20">{{$catalog->short_description ?? ""}}</textarea>
<br>
<label for="">Описание</label>
<textarea class="form-control" id="editor-body" name="description" rows="5" cols="50">{{$catalog->description ?? ""}}</textarea>
<br>
<label for="">Мета слова</label>
<textarea class="form-control" id="editor-body" name="meta_keywords" rows="5" cols="50">{{$catalog->meta_keywords ?? ""}}</textarea>
<br>
<label for="">Мета описание</label>
<textarea class="form-control" id="editor-body" name="meta_description" rows="5" cols="50">{{$catalog->meta_description ?? ""}}</textarea>
<br>
<label class="text-center">Основная фотография</label>
<input type="file"  name="main_image" class="form-control-file">
<br>
<label class="text-center">Фотографии</label>
<input type="file"  name="images[]" class="form-control-file" multiple>

<br>
<input class="btn btn-primary" type="submit"  value="Сохранить">
