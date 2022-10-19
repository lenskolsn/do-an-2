<x-only-header title="Thực đơn">
    <div class="row">
        @foreach ($category as $item)
            @if ($item->product->count() > 0)
                <h2 class="text-uppercase text-center fw-bold">{{ $item->name }}</h2>
                @foreach ($item->product as $pd)
                    <li class="col-lg-3 col-md-4 col-6 body__menu-list-item">
                        <a href="" class="body__menu-list-link">
                            <div class="body__menu-list-link-img-btn">
                                <img src="/storage/images/{{ $pd->image }}" alt="" />
                                <button class="body__menu-list-link-btn">
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                            <p class="body__menu-list-link-desc">{{ $pd->name }}</p>
                            <p class="body__menu-list-link-price">
                                Giá: <span> {{ number_format($pd->price) }}đ </span>
                            </p>
                        </a>
                    </li>
                @endforeach
            @endif
        @endforeach
    </div>
</x-only-header>
