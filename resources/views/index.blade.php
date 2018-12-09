@extends('layouts.gamemagaz')
@section('content')
<div class="content-middle">
  <div class="content-head__container">
    <div class="content-head__title-wrap">
      <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
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
  <div class="content-main__container">
    <div class="products-columns">
      @foreach ($products as $product)
        <div class="products-columns__item">
          <div class="products-columns__item__title-product">
            <a href="/{{$product['category']['url']}}/{{$product['url']}}" class="products-columns__item__title-product__link">{{$product['title']}}</a>
          </div>
          <div class="products-columns__item__thumbnail">
            <a href="/{{$product['category']['url']}}/{{$product['url']}}" class="products-columns__item__thumbnail__link">
              <img src="/prod_img/{{$product['photo']}}" alt="Preview-image" class="products-columns__item__thumbnail__img">
            </a>
          </div>
          <div class="products-columns__item__description">
            <span class="products-price">{{$product['price']}} руб</span>
            <a href="/{{$product['category']['url']}}/{{$product['url']}}" class="btn btn-blue">Подробнее</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<div class="content-bottom"></div>
@endsection