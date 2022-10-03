<x-only-header title="Tìm kiếm - {{ $key }}">
    @if ($product->count() == null)
        <div style="text-align: center;">
            <img width="200" src="/home/img/productFound.png" alt="">
            <p>Chưa có sản phẩm!</p>
        </div>
    @else
        <ul class="row body__menu-list">
            @foreach ($product as $item)
                <li class="col l-3 m-4 c-6 body__menu-list-item">
                    <a href="" class="body__menu-list-link">
                        <div class="body__menu-list-link-img-btn">
                            <img src="/storage/images/{{ $item->image }}" alt="" />
                            <button class="body__menu-list-link-btn">
                                Thêm vào giỏ hàng
                            </button>
                        </div>

                        <p class="body__menu-list-link-desc">{{ $item->name }}</p>
                        <p class="body__menu-list-link-price">
                            Giá: <span> {{ number_format($item->price) }}đ </span>
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</x-only-header>
