@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      Категории &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/products')}}">Товары</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/orders')}}">Заказы</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/settings')}}">Настройки</a>
                    </div>
                    <div class="card-body">
                        <a href="{{route('categories.create')}}" class="btn">Создать</a>
                    </div>
                    <div class="card-body">
                       <table class="table">
                           <tr>
                              <th>id</th>
                              <th>Название</th>
                              <th>Описание</th>
                              <th>URL</th>
                              <th>Действия</th>
                           </tr>

                           @forelse ($categories as $category)
                               <tr>
                                  <td>{{$category->id}}</td>
                                  <td>{{$category->title}}</td>
                                  <td>{{$category->description}}</td>
                                  <td>{{$category->url}}</td>
                                  <td>
                                      <a href="{{route('categories.edit', [$category->id])}}" class="btn">Редактировать</a><br>
                                      <a href="{{route('categories.drop', $category->id)}}" class="btn">Удалить</a>
                                  </td>
                               </tr>
                           @empty
                             <tr>
                               <td colspan="5">
                                 Категории отсутствуют
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
