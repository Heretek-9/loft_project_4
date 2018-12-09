@extends('layouts.gamemagaz')
@section('content')
<div class="content-middle">
<div class="content-head__container">
  <div class="content-head__title-wrap">
    <div class="content-head__title-wrap__title bcg-title">Игры в разделе {{$category['title']}}</div>
  </div>
  <div class="content-head__search-block">
    <div class="search-container">
      <form class="search-container__form">
        <input type="text" class="search-container__form__input">
        <button class="search-container__form__btn">search</button>
      </form>
    </div>
  </div>
</div>
<div>{{$category['description']}}</div>
<div class="content-main__container">
  <div class="products-category__list">
    @foreach ($products as $product)
      <div class="products-category__list__item">
        <div class="products-category__list__item__title-product">
          <a href="/{{$category['url']}}/{{$product['url']}}">{{$product['title']}}</a>
        </div>
        <div class="products-category__list__item__thumbnail">
          <a href="/{{$category['url']}}/{{$product['url']}}" class="products-category__list__item__thumbnail__link">
            <img src="/prod_img/{{$product['photo']}}" alt="Preview-image">
          </a>
        </div>
        <div class="products-category__list__item__description">
          <span class="products-price">{{$product['price']}} руб.</span>
          <a href="/{{$category['url']}}/{{$product['url']}}" class="btn btn-blue">Подробнее</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
</div>
<div class="content-bottom"></div>
@endsection