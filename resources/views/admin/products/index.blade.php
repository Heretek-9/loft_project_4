@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <a href="{{url('/admin/categories')}}">Категории</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      Товары &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/orders')}}">Заказы</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/settings')}}">Настройки</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('products.create')}}" class="btn">Создать</a>
                    </div>
                    <div class="card-body">
                       <table class="table">
                           <tr>
                              <th>id</th>
                              <th>Название</th>
                              <th>Описание</th>
                              <th>URL</th>
                              <th>Категория</th>
                              <th>Цена</th>
                              <th>Фото</th>
                              <th>Действия</th>
                           </tr>

                           @forelse ($products as $product)
                               <tr>
                                  <td>{{$product->id}}</td>
                                  <td>{{$product->title}}</td>
                                  <td>{{$product->description}}</td>
                                  <td>{{$product->url}}</td>
                                  <td>{{$product->category->title}}</td>
                                  <td>{{$product->price}}</td>

                                  @if($product->photo)
                                    <td><img style="max-width: 120px;" src="{{url('/prod_img/'.$product->photo)}}"></td>
                                  @else
                                    <td></td>
                                  @endif
                                  <td>
                                      <a href="{{route('products.edit', [$product->id])}}" class="btn">Редактировать</a><br>
                                      <a href="{{route('products.drop', $product->id)}}" class="btn">Удалить</a>
                                  </td>
                               </tr>
                           @empty
                            <tr>
                              <td colspan="5">
                                Товары отсутствуют
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
