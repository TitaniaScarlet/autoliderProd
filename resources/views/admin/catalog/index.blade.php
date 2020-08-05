@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    {{-- @component('admin.components.breadcrumb')
    @slot('title') Каталог @endslot
    @slot('parent') Главная @endslot
    @slot('active') Товары @endslot
  @endcomponent --}}

  <nav aria-label="breadcrumb">
    <h2>Каталог</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.catalog.index')}}">Все</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.catalog.published')}}">Опубликовано</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.catalog.not_published')}}">Не опубликовано</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.catalog.buyout')}}">Выкуп</a></li>
    </ol>

  </nav>
  <hr>
  <a href="{{route('admin.catalog.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Добавить позицию</i></a>
  <br><br><br>
  <table class="table table-striped">
    <thead>
      <th>Дата</th>
      <th>ID</th>
      <th>Марка</th>
      <th>Год</th>
      <th>Пробег</th>
      <th>Цена</th>
      <th>Статус</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($catalogs as $catalog)
        <tr>
          <td>{{$catalog->created_at}}</td>
          <td>{{$catalog->id}}</td>
          <td>{{$catalog->title}}</td>
          <td>{{$catalog->manufactured}}</td>
          <td>{{$catalog->mileage}}</td>
          <td>{{$catalog->price}}</td>
          <td>
            @if ($catalog->status == 'published') Опубликовано
            @elseif ($catalog->status == 'not_published') Не опубликовано
            @elseif ($catalog->status == 'buyout') Выкуп
            @endif
          </td>
          <td class="text-right">
            <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.catalog.destroy', $catalog)}}" method="post">
              <input type="hidden" name="_method" value="delete">
              @csrf
              <a href="{{route('admin.catalog.edit', $catalog)}}"><i class="far fa-edit"></i></a>
              <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center"><h4>Данные отсутствуют</h4></td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7">
          <ul class="pagination float-right">
            {{$catalogs->links()}}
          </ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>
@endsection
