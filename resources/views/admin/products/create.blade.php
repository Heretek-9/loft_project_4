@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание нового товара</div>
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                               <li style="color: red"> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="title" placeholder="Название" required><br>
                            <textarea name="description"  placeholder="Описание"></textarea><br>
                            <input type="text" name="url" placeholder="URL" required><br>
                            
                            Категория: 
                            <select name="category_id">
                                @foreach ($categories as $category)
                                     <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select><br>

                            <input type="number" name="price" required placeholder="Цена"><br>
                            <input type="file" name="photo"><br>

                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
