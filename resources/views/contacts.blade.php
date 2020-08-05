@extends('layouts.my_app')

@section('og_title', "Контакты - Автолидер Брест | Autolider Brest")
@section('title', "Контакты- Автолидер Брест | Autolider Brest")
@section('meta_keyword', "автолидер, брест, autolider, brest, автолидер брест, autolider brest, контакты, заяка, форма обратной связи, обратная связь")
@section('meta_description', "г. Брест, ул. Гродненская, 29/1, офис 7 (2 этаж). Телефоны: +375(29)243-243-5(МТС); +375(29)906-70-70(А1). Работаем с 9.00 до 21.00 без выходных")

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-12">
        <h3>Наши контакты</h3>
        <br>
        <h5><span class="bold">Адрес:</span> г. Брест, ул. Гродненская, 29/1, офис 7 (2 этаж)</h5>
        <div class="row">
          <div class="col-sm-2">
            <h5><span class="bold">Телефоны:</span></h5>
          </div>
          <div class="col-sm-10">
            <h5><img class="img-operator"  src="{{asset('/storage/unnamed.png')}}"> <a  href="tel:+375 29 243-243-5">+375 (29) 243-243-5</a></h5>
            <h5><img class="img-operator"  src="{{asset('/storage/A1.jpg')}}"> <a href="tel:+375 29 906-70-70">+375 (29) 906-70-70</a></h5>
          </div>
        </div>
        <h5><span class="bold">Режим работы:</span> 9.00 - 21.00 без выходных </h5>
        <h5><span class="bold">Email:</span> <a href="mailto:autoliderbrest24@gmail.com">AutoliderBrest24@gmail.com</a></h5>
        <h5><span class="bold">Мы в соцсетях: <a class="vk" href="https://vk.com/widget_community.php?act=a_subscribe_box&oid=-188297581&state=1"><img class="img-operator"  src="{{asset('/storage/vk.png')}}"></a> <a  href="https://www.instagram.com/autoliderbrest.by/" class="vk"><img class="img-operator"  src="{{asset('/storage/inst.png')}}"></a></span></h5>
                     <hr>
        <h4 class="bold">Подбор авто</h4>
        <h5>ИП Левонюк Игорь Владимирович</h5>
        <h5><span class="bold ">Свидетельство о государственной регистрации:</span> №291615791 от 16.09.2019 (выдан Администрацией Московского района г. Бреста)</h5>
        <h5><span class="bold ">УНП:</span> 291615791</h5>
        <h5><span class="bold ">Почтовый адрес:</span> 224002, Брестская область, г. Брест, ул. Рокоссовского, 1 "B", кв. 26</h5>
          <h5><span class="bold ">Банковские реквизиты:</span><br>
        ЗАО Банк ВТБ(Беларусь)<br>
        Региональная дирекция №500<br>
        Брестская область, г. Брест, ул. Московская, 208-1<br>
        УНП 101165625<br>
        БИК SLANBY22<br>
        S.W.I.F.T.: SLANBY22<br>
        Р/С №BY10SLAN30133246000000100000
        </h5>
<hr>
        <h4 class="bold">Выкуп и продажа авто</h4>
        <h5>ИП Данилюк Сергей Викторович</h5>
        <h5><span class="bold ">Свидетельство о государственной регистрации:</span> №291555793 от 16.01.2019 (выдан Администрацией Московского района г. Бреста)</h5>
        <h5><span class="bold ">УНП:</span> 291555793</h5>
        <h5><span class="bold ">Почтовый адрес:</span> г. Брест, ул. Луцкая, 60, кв. 76</h5>
        <h5><span class="bold ">Банковские реквизиты:</span><br>
        ЗАО Банк ВТБ(Беларусь)<br>
        Региональная дирекция №500<br>
        Брестская область, г. Брест, ул. Московская, 208-1<br>
        УНП 101165625<br>
        БИК SLANBY22<br>
        S.W.I.F.T.: SLANBY22<br>
        Р/С №BY48SLAN30133245900000100000
        </h5>


      </div>
      <div class="col-md-5 col-12">

        <h3 class="centered">Форма обратной связи</h3>
        <br>
        <contact-component></contact-component>
      </div>
    </div>
  </div>
@endsection
