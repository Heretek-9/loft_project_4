@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <a href="{{url('/admin/categories')}}">Категории</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/products')}}">Товары</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      Заказы &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/settings')}}">Настройки</a>
                    </div>
                    <div class="card-body">
                       <table class="table">
                           <tr>
                              <th>id</th>
                              <th>Имя пользователя</th>
                              <th>Email пользователя</th>
                              <th>Товар</th>
                           </tr>

                           @forelse ($orders as $order)
                               <tr>
                                  <td>{{$order->id}}</td>
                                  <td>{{$order->user_name}}</td>
                                  <td>{{$order->user_email}}</td>
                                  <td>{{$order->product->title}}</td>
                               </tr>
                           @empty
                            <tr>
                              <td colspan="5">
                                Заказы отсутствуют
                              </td>
                            </tr>
                           @endforelse
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
