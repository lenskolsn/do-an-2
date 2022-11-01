<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $attributes['title'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon"
        href="https://images.squarespace-cdn.com/content/v1/571e9052b6aa601c46010a10/1534446770563-GVBF37CZ6BLRFNHEC3Y8/Logo+for+Leaf+Logic+Wellness+Tea+Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/home/css/grid.css" />
    <link rel="stylesheet" href="/home/css/base.css" />
    <link rel="stylesheet" href="/home/css/main.css" />
    <link rel="stylesheet" href="/home/css/login.css" />
    <link rel="stylesheet" href="/home/css/responsive.css" />
    <link rel="stylesheet" href="/home/fonts/fontawesome-free-6.2.0-web/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mali&display=swap');

        * {
            font-family: 'Mali', cursive;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }
    </style>
    @yield('style')
</head>

<body>
    <div class="app">
        <!-- Start header -->
        <div id="header">
            <!-- Nav bar -->
            <div class="header__navbar-wrap">
                <div class="grid wide">
                    <div class="header__navbar hide-on-mobile-and-tablet">
                        <ul class="header__navbar-list">
                            <li class="header__navbar-item">
                                <img src="/home/img/header__navbar-logo.webp" alt=""
                                    class="header__navbar-img" />
                            </li>
                            <li class="header__navbar-item">
                                <a href="#" class="header__navbar-link-left">Hotline:</a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="#"
                                    class="header__navbar-link-left header__navbar-link-number">0354632349</a>
                            </li>
                        </ul>

                        <ul class="header__navbar-list">
                            <li class="header__navbar-item navbar-item-display">
                                <form action="{{ route('home.search') }}" method="get">
                                    <a href="#" class="header__navbar-link-right">
                                        <i class="header__navbar-icon bx bx-search" style="font-weight: 600"></i>
                                        Tìm kiếm
                                    </a>
                                    <div class="header__navbar-search">
                                        <input class="header__navbar-search-input" type="text "
                                            placeholder="Tìm kiếm..." name="key" />
                                        <button style="border: none; background: none;"><i
                                                class="header__navbar-search-icon bx bx-search"
                                                style="font-weight: 600"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul>

                        <ul class="header__navbar-list">
                            @if (Auth::guard('customer')->check())
                                <li class="header__navbar-item navbar-item-display">
                                    <a href="" class="header__navbar-link-right">
                                        <img style="border-radius: 50%; margin-right: 5px;"
                                            src="/storage/avatar/{{ Auth::guard('customer')->user()->avatar }}"
                                            width="30" height="30" alt="">
                                        {{ Auth::guard('customer')->user()->fullName }}
                                    </a>
                                    <div class="user__notify">
                                        <ul class="user__notify-list">
                                            <li class="user__notify-item">
                                                <a href="{{ route('home.info') }}" class="user__notify-link">Thông
                                                    tin</a>
                                            </li>
                                            <li class="user__notify-item">
                                                <a href="{{ route('home.logout') }}" class="user__notify-link">Đăng
                                                    xuất</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li class="header__navbar-item navbar-item-display">
                                    <a href="#" class="header__navbar-link-right">
                                        <i class="header__navbar-icon bx bxs-user"></i>
                                        Tài Khoản
                                    </a>
                                    <div class="user__notify">
                                        <ul class="user__notify-list">
                                            <li class="user__notify-item">
                                                <a href="{{ route('home.register') }}" class="user__notify-link">Đăng
                                                    ký</a>
                                            </li>
                                            <li class="user__notify-item">
                                                <a href="{{ route('home.login') }}" class="user__notify-link">Đăng
                                                    nhập</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            <li class="header__navbar-item navbar-item-display">
                                <a href="#" class="header__navbar-link-right">
                                    <i class="header__navbar-icon bx bx-shopping-bag"></i>
                                    <span class="header__navbar-icon-quantity">{{ $cart->total_quantity }}</span>
                                    Giỏ hàng
                                </a>
                                <div class="header__cart-no-cart">
                                    @if (!empty($cart->items))
                                        <div class="header__cart-no-cart-img">
                                            @foreach ($cart->items as $item)
                                                <div
                                                    class="row d-flex align-items-center m-0 p-0 border-bottom mb-2 py-2">
                                                    <div class="col-lg-4">
                                                        <img src="/storage/images/{{ $item['image'] }}" width="60"
                                                            alt="">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h4>{{ $item['name'] }}</h4>
                                                        <h4 class="fw-bold">{{ number_format($item['price']) }}đ X
                                                            {{ $item['quantity'] }}</h4>
                                                    </div>
                                                    <div class="col-lg-4 text-center">
                                                        <a href="{{ route('home.giohang.remove', $item['id']) }}"><i
                                                                class="fas fa-times text-danger"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-end py-2">
                                            <p class="fw-bold" id="total_price">Tổng cộng:
                                                {{ number_format($cart->total_price) }}đ</p>
                                            <a href="{{ route('home.giohang') }}"
                                                class="btn rounded-pill w-100 fs-4 p-2 text-light"
                                                style="background: rgb(71 151 177);"><i
                                                    class="fas fa-shopping-cart"></i> Đến trang giỏ hàng</a>
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <img src="/home/img/empty-cart.webp" width="300" alt="" />
                                        </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- category -->
            <div class="grid wide">
                <div class="header__category hide-on-mobile-and-tablet">
                    <ul class="header__category-list">
                        <li class="header__category-item">
                            <a href="{{ route('home') }}" id="{{ request()->routeIs('home') ? 'active' : '' }}"
                                class="header__category-link">Trang chủ</a>
                        </li>
                        <li class="header__category-item">
                            <a href="{{ route('home.about') }}"
                                id="{{ request()->routeIs('home.about') ? 'active' : '' }}"
                                class="header__category-link">Giới thiệu</a>
                        </li>

                        <li class="header__category-item">
                            <a id="{{ request()->routeIs('home.product') ? 'active' : '' }}" href=""
                                class="header__category-link">Sản phẩm
                                <i class="header__category-icon bx bxs-down-arrow"></i>
                            </a>

                            <ul class="header__category-menu">
                                @foreach ($category as $item)
                                    <li class="header__category-menu-item">
                                        <a href="{{ route('home.product', $item->id) }}"
                                            class="header__category-menu-link">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <div class="header_-category-img">
                        <a href="" class="header__category-link">
                            <img src="/home/img/logo.png" width="100" height="100" id="abc"
                                alt="" />
                        </a>
                        {{-- <span>Lensko - LSN</span> --}}
                    </div>
                    <ul class="header__category-list">
                        <li class="header__category-item">
                            <a href="{{ route('home.news') }}"
                                id="{{ request()->routeIs('home.news') || request()->routeIs('home.new_detail') ? 'active' : '' }}"
                                class="header__category-link">Tin tức</a>
                        </li>
                        <li class="header__category-item">
                            <a id="{{ request()->routeIs('home.menu') ? 'active' : '' }}"
                                href="{{ route('home.menu') }}" class="header__category-link">Thực đơn</a>
                        </li>
                        <li class="header__category-item">
                            <a id="{{ request()->routeIs('home.contact') ? 'active' : '' }}"
                                href="{{ route('home.contact') }}" class="header__category-link">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- mobile-and-tablet-header -->

            <input type="radio" id="checkbox-hidden" name="display-on-mt" hidden />
            <input type="radio" id="checkbox-list-on-mt" name="display-on-mt" hidden />
            <label class="mt__header-overlay" for="checkbox-hidden"></label>
            <div class="mt__header-menu">
                <div class="mt__header-menu-heading">
                    @if (Auth::guard('customer')->check())
                        <a href="" class="mt__header-menu-login"><img
                                style="border-radius: 50%; margin-right: 5px;"
                                src="/storage/avatar/{{ Auth::guard('customer')->user()->avatar }}" width="30"
                                height="30" alt=""> {{ Auth::guard('customer')->user()->fullName }}</a>
                        <a href="" class="mt__header-menu-special">/</a>
                        <a href="{{ route('home.logout') }}" class="mt__header-menu-register">Đăng xuất</a>
                    @else
                        <a href="{{ route('home.login') }}" class="mt__header-menu-login">Đăng nhập</a>
                        <a href="" class="mt__header-menu-special">/</a>
                        <a href="{{ route('home.register') }}" class="mt__header-menu-register">Đăng ký</a>
                    @endif
                </div>
                <div class="mt__header-menu-list">
                    <li class="mt__header-menu-item">
                        <a href="{{ route('home') }}" class="mt__header-menu-link">Trang chủ</a>
                    </li>
                    <li class="mt__header-menu-item">
                        <a href="{{ route('home.about') }}" class="mt__header-menu-link">Giới thiệu</a>
                    </li>
                    <li class="mt__header-menu-item">
                        <a href="{{ route('home.menu') }}" class="mt__header-menu-link">Sản phẩm</a>
                    </li>
                    <li class="mt__header-menu-item">
                        <a href="{{ route('home.news') }}" class="mt__header-menu-link">Tin tức</a>
                    </li>
                    <li class="mt__header-menu-item">
                        <a href="{{ route('home.contact') }}" class="mt__header-menu-link">Liên hệ</a>
                    </li>
                </div>
            </div>

            <div class="grid wide">
                <div class="mt__header">
                    <div class="mt__header-item">
                        <div>
                            <label class="mt__header-icon" for="checkbox-list-on-mt"><i
                                    class="mt__header-icon bx bx-list-ul"></i></label>
                        </div>
                        <div class="mt__header-img">
                            <a href=""><img src="/home/img/logo.png" width="100" height="100"
                                    alt="" /></a>
                        </div>
                        <div class="header__navbar-item navbar-item-display">
                            <a href="#" class="header__navbar-link-right">
                                <i class="header__navbar-icon bx bx-shopping-bag"></i>
                                <span class="header__navbar-icon-quantity">{{ $cart->total_quantity }}</span>
                                Giỏ hàng
                            </a>
                            <div class="header__cart-no-cart">
                                @if (!empty($cart->items))
                                    <div class="header__cart-no-cart-img">
                                        <div class="row d-flex align-items-center m-0 p-0 border-bottom mb-2 py-2">
                                            @foreach ($cart->items as $item)
                                                <div class="col-4">
                                                    <img src="/storage/images/{{ $item['image'] }}" width="60"
                                                        alt="">
                                                </div>
                                                <div class="col-4">
                                                    <h4>{{ $item['name'] }}</h4>
                                                    <h4 class="fw-bold">{{ number_format($item['price']) }}đ X
                                                        {{ $item['quantity'] }}</h4>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <a href="{{ route('home.giohang.remove', $item['id']) }}"><i
                                                            class="fas fa-times text-danger"></i></a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-end py-2">
                                        <p class="fw-bold" id="total_price">Tổng cộng:
                                            {{ number_format($cart->total_price) }}đ</p>
                                        <a href="{{ route('home.giohang') }}"
                                            class="btn rounded-pill w-100 fs-4 p-2 text-light"
                                            style="background: rgb(71 151 177);"><i class="fas fa-shopping-cart"></i>
                                            Đến trang giỏ hàng</a>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <img src="/home/img/empty-cart.webp" width="100%" alt="" />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt__header-search">
                        <input type="text" placeholder="Tìm sản phẩm bạn mong muốn..." />
                        <i class="header__navbar-icon bx bx-search" style="font-weight: 600"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- body -->
        <div id="app__container">
            {{-- Product --}}
            <div class="body__menu-wrap">
                <div class="grid wide mt-3">
                    <p><a href="{{ route('home') }}" style="color: #4797B1;">Trang chủ</a> / <span
                            class="text-secondary">{{ $attributes['title'] }}</span></p>
                    @include('sweetalert::alert')
                    {{ $slot }}
                </div>
            </div>
        </div>

        <div id="footer">
            <div class="grid wide">
                <ul class="row footer__list align-items-center">
                    <li class="col l-4 m-12 c-12 footer__list-item">
                        <a href="" class="header__category-link footer-logo">
                            <img src="/storage/images/lsnlogo.jpg" class="rounded-circle" width="100"
                                height="100" alt="" />
                        </a>
                        <div class="footer__list-item-icon">
                            <a href="" class="footer__list-item-icon-link">
                                <i class="bx bxl-twitter"></i>
                            </a>
                            <a href="" class="footer__list-item-icon-link">
                                <i class="bx bxl-facebook-circle"></i>
                            </a>
                            <a href="" class="footer__list-item-icon-link">
                                <i class="bx bxl-tiktok"></i>
                            </a>
                            <a href="" class="footer__list-item-icon-link">
                                <i class="bx bxl-instagram"></i>
                            </a>
                            <a href="" class="footer__list-item-icon-link">
                                <i class="bx bxl-youtube"></i>
                            </a>
                        </div>
                    </li>
                    <li class="col l-4 m-6 c-12 footer__list-item">
                        <div class="footer__list-item-header">LIÊN HỆ VỚI CHÚNG TÔI</div>
                        <ul class="footer__list-item-text footer__list-item-desc--2">
                            <li class="footer__list-item-text-icon">
                                <i class="bx bxs-location-plus"></i>
                            </li>
                            <li class="footer__list-item-desc">
                                Địa chỉ: Tâng 6 toà nhà Ladeco, 266 Đội Cấn, phường Liễu Giai,
                                Hà Nội, Vietnam
                            </li>
                        </ul>
                        <ul class="footer__list-item-text">
                            <li class="footer__list-item-text-icon">
                                <i class="bx bxs-phone"></i>
                            </li>
                            <li class="footer__list-item-text-desc">
                                <p class="footer__list-item-desc">
                                    Hotline đặt bàn: 1900 6750
                                </p>
                                <p class="footer__list-item-desc">
                                    Hotline giao hàng: 1900 6750
                                </p>
                            </li>
                        </ul>
                    </li>
                    <li class="col l-4 m-6 c-12 footer__list-item">
                        <div class="footer__list-item-header">
                            ĐĂNG KÝ NHẬN KHUYẾN MÃI
                        </div>
                        <p class="footer__list-item-desc footer__list-item-desc--margin">
                            Đừng bỏ lỡ những sản phẩm và chương trình khuyến mãi hấp dẫn
                        </p>
                        <div class="footer__list-item-sign">
                            <input type="email" placeholder="Email của bạn" class="footer__list-item-sign-email" />
                            <button class="footer__list-item-sign-login">Đăng ký</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="go-to-head">
            <a href="#header" title="Lên đầu trang"><i class="bx bxs-chevron-up-circle"></i></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="/awesome-notifications/index.var.js"></script>
    @yield('script')
</body>

</html>
