@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Создание новой категории</div>
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                               <li style="color: red"> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{route('categories.store')}}" method="post">
                            @csrf
                            <input type="text" name="title" placeholder="Название" required><br>
                            <textarea name="description"  placeholder="Описание"></textarea><br>
                            <input type="text" name="url" placeholder="URL" required><br>
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
