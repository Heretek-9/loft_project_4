@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <a href="{{url('/admin/categories')}}">Категории</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/products')}}">Товары</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      <a href="{{url('/admin/orders')}}">Заказы</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
                      Настройки
                    </div>
                    <div class="card-body">
                      <form action="{{route('settings.store')}}" method="post">
                       @csrf
                       <table class="table">
                          <tr>
                            <th>Настройка</th>
                            <th>Значение</th>
                          </tr>
                          <tr>
                            <td>Почта администратора</td>
                            <td>
                              <input type="text" name='admin_email' value="{{$settings['admin_email']??'' }}">
                            </td>
                          </tr>
                       </table>
                       <input type="submit" value="Сохранить настройки">
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection