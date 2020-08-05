@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Заказы@endslot
        {{-- @slot('parent') Главная @endslot --}}
          @slot('active')Список заказчиков @endslot
          @endcomponent

         <hr>

          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Дата</th>
              <th>Имя</th>
              <th>Номер</th>
              <th>Сообщение</th>
              <th>Авто</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($orders as $order)
                <tr>
                  <td>{{$order->created_at}}</td>
                  <td>{{$order->name}}</td>
                   <td>{{$order->number}}</td>
                  <td>{{$order->message}}</td>
                  <td><a href="{{route('admin.catalog.buyout')}}">{{$order->catalog->id ?? ''}} - {{$order->catalog->title ?? ''}}</a></td>
                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.order.destroy', $order)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <!--<a href="{{route('admin.order.edit', $order)}}"><i class="far fa-edit"></i></a>-->
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5">
                  <ul class="pagination float-right">
                    {{$orders->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
