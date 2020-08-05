@extends('layouts.my_app')

@section('title', $catalog->title . " - Автолидер Брест | Autolider Brest")
@section('meta_keyword', $catalog->meta_keywords)
@section('meta_description', $catalog->meta_description)

@section('content')

  <div class="container">
    <h4 class="bold">{{$catalog->title}}, {{$catalog->manufactured}} г.в., {{$catalog->mileage}} км</h4>
    <h5 class="bold">{{$catalog->price}} рублей</h5>
    <h5 class="bold gray">$ {{$catalog->usd_price}}</h5>

    <br>
    <!-- Button trigger modal -->
    @foreach ($catalog->images as $active_image)
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#ModalCenter{{$active_image->id}}">
        <img class="image-carousel-label" src="{{asset('/storage/' . $active_image->path)}}" alt="First slide">
      </button>

      <!-- Modal -->
      <div class="modal fade" id="ModalCenter{{$active_image->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle {{$active_image->id}}" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div id="carouselIndicators{{$active_image->id}}" class="carousel slide" data-ride="carousel" class="">
                <div class="carousel-inner image-carousel">
                  @foreach ($images as $image)
                    @if ($image->id == $active_image->id)
                      <div class="carousel-item active ">
                        <img class="d-block w-100 " src="{{asset('/storage/' . $active_image->path)}}" alt="First slide">
                      </div>
                    @else
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('/storage/' . $image->path)}}" alt="Second slide">
                      </div>
                    @endif
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselIndicators{{$active_image->id}}" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicators{{$active_image->id}}" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    @endforeach
    {{-- <div class="row"> --}}

    {{-- <div class="col-lg-2">
    <div class="pics">
    <div class="image">
    <input id="{{$image->id}}" class="image-checkbox" type="checkbox"><label class="image-label" for="{{$image->id}}" style="background-image: url({{asset('/storage/' . $image->path)}});  background-size: contain;">

  </label>
</div>
</div>
</div> --}}
{{-- </div> --}}
<br>
<div class="row">
  <div class="col-lg-4">
    @if ($catalog->air_conditioning == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Кондиционер</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Кондиционер</p>
    @endif
    @if ($catalog->leather_interior == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Кожаный салон</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Кожаный салон</p>
    @endif
    @if ($catalog->alloy_wheels == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Легкосплавные диски</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Легкосплавные диски</p>
    @endif
    @if ($catalog->xenon == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Ксенон</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Ксенон</p>
    @endif
    @if ($catalog->parking_sensors == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Паркотроник</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Паркотроник</p>
    @endif
  </div>
  <div class="col-lg-4">
    @if ($catalog->heated_seats == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Подогрев сидений</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Подогрев сидений</p>
    @endif
    @if ($catalog->stabilization_control == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Система контроля стабилизации</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Система контроля стабилизации</p>
    @endif
    @if ($catalog->navigation == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Навигатор</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Навигатор</p>
    @endif
    @if ($catalog->speakerphone == 1)
      <p><img class="cross-ok"  src="{{asset('/storage/ok.png')}}"> Громкая связь</p>
    @else
      <p><img class="cross-ok"  src="{{asset('/storage/cross.png')}}"> Громкая связь</p>
    @endif
  </div>
</div>
<br>
<p class="short-description">{{$catalog->description}}</p>
</div>
@endsection
