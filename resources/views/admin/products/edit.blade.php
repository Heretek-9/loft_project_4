@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактирование категории</div>
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                               <li style="color: red"> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="text" name="title" placeholder="Название" required value="{{$product->title}}"><br>
                            <textarea name="description"  placeholder="Описание">{{$product->description}}</textarea><br>
                            <input type="text" name="url" placeholder="URL" required value="{{$product->url}}"><br>
                            
                            Категория: 
                            <select name="category_id">
                                @foreach ($categories as $category)
                                    @if($product->category_id == $category->id)
                                        <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif
                                @endforeach
                            </select><br>

                            <input type="number" name="price" required placeholder="Цена" value="{{$product->price}}"><br>

                            @if($product->photo)
                                Старое фото: <img style="max-height: 300px" src="{{url('/prod_img/'.$product->photo)}}"><br>
                            @endif
                            <input type="file" name="photo"><br>

                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
