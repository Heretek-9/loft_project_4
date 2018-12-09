@extends('layouts.gamemagaz')
@section('content')
<div class="content-middle">
<div class="content-head__container">
  <div class="content-head__title-wrap">
    <div class="content-head__title-wrap__title bcg-title">{{$product['title']}} в разделе {{$category['title']}}</div>
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
  <div class="product-container">
    <div class="product-container__image-wrap"><img src="/prod_img/{{$product['photo']}}" class="image-wrap__image-product"></div>
    <div class="product-container__content-text">
      <div class="product-container__content-text__title">{{$product['title']}}</div>
      <div class="product-container__content-text__price">
        <div class="product-container__content-text__price__value">
          Цена: <b>{{$product['price']}}</b>
          руб
        </div><a href="javascript:void(0);" class="btn btn-blue buyBtn">Купить</a>
      </div>
      <div class="product-container__content-text__description">
        {{$product['description']}}
      </div>
    </div>
  </div>
</div>
</div>
<div class="content-bottom">
<div class="line"></div>
<div class="content-head__container">
  <div class="content-head__title-wrap">
    <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
  </div>
</div>
<div class="content-main__container">
  <div class="products-columns">
    @foreach ($relatedProducts as $relatedProduct)
      <div class="products-columns__item">
        <div class="products-columns__item__title-product">
          <a href="/{{$relatedProduct['category']['url']}}/{{$relatedProduct['url']}}" class="products-columns__item__title-product__link">{{$relatedProduct['title']}}</a>
        </div>
        <div class="products-columns__item__thumbnail">
          <a href="/{{$relatedProduct['category']['url']}}/{{$relatedProduct['url']}}" class="products-columns__item__thumbnail__link">
            <img src="/prod_img/{{$relatedProduct['photo']}}" alt="Preview-image" class="products-columns__item__thumbnail__img">
          </a>
        </div>
        <div class="products-columns__item__description">
          <span class="products-price">{{$relatedProduct['price']}} руб</span>
          <a href="/{{$relatedProduct['category']['url']}}/{{$relatedProduct['url']}}" class="btn btn-blue">Подробнее</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
</div>

<div id="orderModal">
  <span>Оставить заявку</span>
  <a id="closeModal" href="javascript:void(0);">Закрыть Х</a><br><hr>

  <form action="{{url('/adduserorder')}}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{$product['id']}}">
    <span class="modalText">Имя:</span> <input type="text" name="user_name" required value="{{\Auth::user()->name}}"><br>
    <span class="modalText">Email:</span> <input type="text" name="user_email" required value="{{\Auth::user()->email}}"><br>
    <input type="submit">
  </form>
</div>
<div id="screenBlock"></div>

@endsection
