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
                        <form action="{{route('categories.update', $category->id)}}" method="post">
                            @method('put')
                            @csrf
                            <input type="text" name="title" placeholder="Название" required value="{{$category->title}}"><br>
                            <textarea name="description"  placeholder="Описание">{{$category->description}}</textarea><br>
                            <input type="text" name="url" placeholder="URL" required value="{{$category->url}}"><br>
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
