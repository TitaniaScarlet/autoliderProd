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
    <h2>{{$catalog->title}}</h2>

    </nav>

{{-- @component('admin.components.breadcrumb')
  @slot('title')Редактирование позиции каталога@endslot
    @slot('parent')Главная@endslot
      @slot('active')Каталог@endslot
@endcomponent --}}

<form class="form-horizontal" action="{{route('admin.catalog.update', $catalog)}}" method="post" enctype="multipart/form-data">
  @method('PUT')
    @csrf
    @include('admin.catalog.partials.form_edit')
</form>
  </div>
@endsection
