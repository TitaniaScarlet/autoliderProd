@extends('admin.layouts.app_admin')


  @section('content')

    <div class="container">


  @component('admin.components.breadcrumb')
    @slot('title')Редактирование пользователя@endslot
        @slot('active')Пользователи@endslot
  @endcomponent

  <form class="form-horizontal" action="{{route('admin.user_managment.user.update', $user)}}" method="post">
    @method('PUT')
      @csrf
      @include('admin.user_managment.users.partials.form_edit')
  </form>
    </div>
  @endsection
