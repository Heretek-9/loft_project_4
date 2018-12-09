<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/order_modal.css">

  </head>
  <body>
    <div class="main-wrapper">
      <header class="main-header">
        <div class="logotype-container"><a href="/" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
        <nav class="main-navigation">
          <ul class="nav-list">
            <li class="nav-list__item"><a href="#" class="nav-list__item__link">Главная</a></li>
            <li class="nav-list__item"><a href="#" class="nav-list__item__link">Мои заказы</a></li>
            <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
            <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
          </ul>
        </nav>
        <div class="header-contact">
          <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
        </div>
        <div class="header-container">
          <div class="payment-container">
            <div class="payment-basket__status">
              <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
              <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">0</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
            </div>
          </div>
          <div class="authorization-block">

            @guest
                    <a class="nav-link btn" href="{{ route('login') }}">Войти</a>
                @if (Route::has('register'))
                    <a class="nav-link btn" href="{{ route('register') }}">Регистрация</a>
                @endif
            @else
                    
                        <a class="dropdown-item btn" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
            @endguest

          </div>
        </div>
      </header>
      <div class="middle">
        <div class="sidebar">
          <div class="sidebar-item">
            <div class="sidebar-item__title">Категории</div>
            <div class="sidebar-item__content">
              <ul class="sidebar-category">
                @foreach ($menuCategories as $menuCategory)
                  <li class="sidebar-category__item"><a href="/{{$menuCategory['url']}}" class="sidebar-category__item__link">{{$menuCategory['title']}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="sidebar-item">
            <div class="sidebar-item__title">Последние новости</div>
            <div class="sidebar-item__content">
              <div class="sidebar-news">
                <div class="sidebar-news__item">
                  <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-2.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                  <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                </div>
                <div class="sidebar-news__item">
                  <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-1.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                  <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                </div>
                <div class="sidebar-news__item">
                  <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-4.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                  <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="main-content">
            <div class="content-top">
              <div class="content-top__text">Купить игры недорого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
              <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
            </div>
            @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="footer__footer-content">
          <div class="random-product-container">
            @if($randomProduct)
            <div class="random-product-container__head">Случайный товар</div>
            <div class="random-product-container__content">
              <div class="item-product">
                <div class="item-product__title-product">
                  <a href="/{{$randomProduct['category']['url']}}/{{$randomProduct['url']}}" class="item-product__title-product__link">{{$randomProduct['title']}}</a>
                </div>
                <div class="item-product__thumbnail">
                  <a href="/{{$randomProduct['category']['url']}}/{{$randomProduct['url']}}" class="item-product__thumbnail__link">
                    <img src="/prod_img/{{$randomProduct['photo']}}" alt="Preview-image" class="item-product__thumbnail__link__img">
                  </a>
                </div>
                <div class="item-product__description">
                  <div class="item-product__description__products-price">
                    <span class="products-price">{{$randomProduct['price']}} руб</span>
                  </div>
                  <div class="item-product__description__btn-block">
                    <a href="/{{$randomProduct['category']['url']}}/{{$randomProduct['url']}}" class="btn btn-blue">Подробнее</a>
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
          <div class="footer__footer-content__main-content">
            <p>
              Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
              онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
              У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
              и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
              коды продления и многое друго. Также здесь всегда можно узнать последние новости
              из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
              актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
              что немаловажно, выгодно!
            </p>
          </div>
        </div>
        <div class="footer__social-block">
          <ul class="social-block__list bcg-social">
            <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
            <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
            <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="/js/order_modal.js"></script>
  </body>
</html>