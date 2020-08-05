@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">
    <nav aria-label="breadcrumb">
      <h2>Каталог</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.catalog.index')}}">Все</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.catalog.index')}}">Опубликовано</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.catalog.not_published')}}">Не опубликовано</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.catalog.buyout')}}">Выкуп</a></li>
    </ol>
    </nav>

    {{-- @component('admin.components.breadcrumb')
      @slot('title')Создание позиции каталога@endslot
        @slot('parent')Главная@endslot
          @slot('active')Каталог@endslot
          @endcomponent --}}

          <form class="form-horizontal" action="{{route('admin.catalog.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.catalog.partials.form')
          </form>

        </div>

      @endsection
