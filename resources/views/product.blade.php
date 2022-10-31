<x-only-header title="{{ $category->name }}">
    <h1 style="text-transform: uppercase;">{{ $category->name }}</h1>
    @if ($category->product->count() == null)
        <div style="text-align: center;">
            <img width="200" src="/home/img/productFound.png" alt="">
            <p>Chưa có sản phẩm!</p>
        </div>
    @else
        <ul class="row body__menu-list">
            @foreach ($product as $item)
                <li class="col-lg-3 col-md-4 col-6 body__menu-list-item">
                    <a href="{{ route('home.product_detail', $item->id) }}" class="body__menu-list-link">
                        <div class="body__menu-list-link-img-btn">
                            <img src="/storage/images/{{ $item->image }}" alt="" />
                            <a id="btn_add_cart" class="btn w-100 mt-3 fs-4" style="background: #4797b1; color: white;" 
                                href="{{ route('home.giohang.add', $item->id) }}">
                                Thêm vào giỏ hàng
                            </a>
                        </div>
                        <p class="body__menu-list-link-desc">{{ $item->name }}</p>
                        <p class="body__menu-list-link-price">
                            Giá:
                            @if ($item->discountPrice)
                                <span>{{ number_format($item->price - ($item->price * $item->discountPrice) / 100) }}đ</span>
                                <span style="text-decoration: line-through;">{{ number_format($item->price) }}đ</span>
                            @else
                                <span> {{ number_format($item->price) }}đ </span>
                            @endif
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</x-only-header>
