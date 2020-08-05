@extends('admin.layouts.app_admin')

@section('content')


  <div class="container">
<a href="{{route('admin.parser.index')}}" type="button" class="btn btn-primary">Добавить парсер</a>
<hr>
@if (isset($parameters))


<div class="row">
  <div class="col-md-4">
@forelse ($parameters as $parameter)
  <div class="row">
    <div class="col-md-8">
            <form action="{{route('admin.parser.cars.all', $parameter)}}" method="get">
              @if ($parameter == $parameter_select)
                <button type="submit" class="btn btn-link btn-parameter-active">{{$parameter->site->title}} - {{$parameter->title}}</button>
                @else
                  <button type="submit" class="btn btn-link btn-parameter">{{$parameter->site->title}} - {{$parameter->title}}</button>
              @endif
      </form>
    </div>
    <div class="col-md-4">
      <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.parser.parameter.destroy', $parameter)}}" method="post">
        @csrf
        @if ($parameter->action == 'parse')
          <a   href="{{route('admin.parser.parameter.pause', $parameter)}}"><i class="fas fa-pause"></i></a>
        @elseif ($parameter->action == 'pause')
          <a   href="{{route('admin.parser.parameter.pause', $parameter)}}"><i class="fas fa-play"></i></a>
        @endif
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-link btn-parameter"><i class="fas fa-times"></i></button>
      </form>
    </div>
  </div>
@empty

@endforelse
  </div>
  <div class="col-sm-8">
    <nav class="nav">
  <a class="nav-link" href="{{route('admin.parser.cars.all', $parameter_select)}}">Все</a>
  <a class="nav-link" href="{{route('admin.parser.cars.favorites', $parameter_select)}}">Избранные</a>
</nav>
<hr>
    @forelse ($links as $link)
      <div class="row">
        <div class="col-md-2">
          <p>{{$link->created_at}}</p>
        </div>
        <div class="col-md-2">
          <p>{{$link->id}}</p>
        </div>
                <div class="col-md-6">
          <a href="{{$link->link}}">{{$link->link}}</a>
        </div>
        <div class="col-md-1">
          <form action="{{route('admin.parser.cars.star', $link)}}" method="get">
            <input type="hidden" name="_method" value="delete">
                      @if ($link->star == 0)
              <button type="submit" class="btn btn-link float-right btn-parameter"><i class="far fa-star"></i></button>
            @elseif ($link->star == 1)
              <button type="submit" class="btn btn-link float-right btn-like"><i class="fas fa-star"></i></button>
            @endif
          </form>
                </div>
        <div class="col-md-1">
          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.parser.cars.destroy', $link)}}" method="post">
            <input type="hidden" name="_method" value="delete">
            @csrf
            <button type="submit" class="btn btn-link float-right btn-parameter"><i class="fas fa-times"></i></button>
          </form>
        </div>
      </div>
    @empty
<p>Пусто</p>
    @endforelse
    <br>
    <div class="pagination float-right ">
      {{$links->links()}}
    </div>
</div>

  </div>
  @endif
</div>
@endsection
