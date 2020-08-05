@extends('layouts.my_app')

@section('og_title', "Каталог - Автолидер Брест | Autolider Brest")
@section('title', "Каталог - Автолидер Брест | Autolider Brest")
@section('meta_keyword', "автолидер, брест, автолидер брест, autolider brest, autolider, brest,  купить, каталог, машина, авто, автомобиль, подержанный, кредит, лизинг")
@section('meta_description', "Продаем подержанные автомобили. Покупая машину у нас, Вы имеете возможность оформить ее в лизинг либо кредит.")

@section('content')
  <div class="container">
    <h3 class="centered">Покупая машину у нас, Вы имеете возможность оформить ее в <span class="bold">лизинг</span> либо <span class="bold">кредит</span>.</h3>

    <br>
    <div class="row">
      <div class="col-md-3 centered">
        <img class="rounded-circle partners "  src="{{asset('/storage/mogo.png')}}">
      </div>
      <div class="col-md-9">
        <p> За время договора лизинга  Вы выкупаете авто поэтапно и в итоге получаете собственный автомобиль. Вам предоставляется выгодный лизинг на сумму от 500 до 17000 USD сроком от 1 до 7 лет. Чтобы оформить договор, не нужна справка о доходах или страхование КАСКО — лишь ваш паспорт.
</p>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-3 centered">
        <img class="rounded-circle partners "  src="{{asset('/storage/ideabank.png')}}">
      </div>
      <div class="col-md-9">
        <p>Набор документов минимален. Кредит на сумму до 10 000,00 BYN доступен без залога, без справки о доходах и поручителей. Взять автокредит без первоначального взноса на большую сумму просто также без залога и поручителей, а в качестве справки о доходах можно предоставить документ на любом бланке, в том числе, бланке для другого банка.
</p>
      </div>
    </div>
    <br>
    <h2 class="centered">Автомобили, которые у нас в наличии</h2>
    @forelse ($catalogs as $catalog)
      <br>
      <div class="card">

        <div class="card-header">
          <div class="row">
            <div class="col-lg-9">
              <h4 class="bold">
                <a href="{{route('auto', $catalog->id)}}">{{$catalog->title}}</a>
              </h4>
            </div>
            <div class="col-lg-3 text-right">
              <h5 class="bold">{{$catalog->price}} рублей</h5>
              <h5 class="bold gray">$ {{$catalog->usd_price}}</h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3">
              @foreach ($images as $image)
                @if ($image->catalog_id == $catalog->id)
                  <a href="{{route('auto', $catalog->id)}}"><img class="img-thumbnail"  src="{{asset('/storage/' . $image->path)}}"  alt="Card image cap"></a>
                @endif
              @endforeach
            </div>
            <div class="col-lg-5">
              <p >{{$catalog->short_description}}</p>
            </div>
            <div class="col-lg-2 centered">
              <h5>{{$catalog->manufactured}} г.в.</h5>
            </div>
            <div class="col-lg-2 centered">
              <h5>{{$catalog->mileage}} км</h5>
            </div>
          </div>
        </div>
      </div>
      <br>

    @empty

    @endforelse
    <div class="pagination float-right ">
      {{$catalogs->links()}}
    </div>
    <br><br>
  </div>
@endsection
