<x-home title="Trang chủ">
    @foreach ($product as $item)
        <li class="col-lg-3 col-md-4 col-6 body__menu-list-item">
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
</x-home>
