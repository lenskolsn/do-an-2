<div class="row py-5">
    <div class="col-lg-4">
        <ul class="list-group list-group-light">
            <h2>Trang tài khoản</h2>
            <li class="list-group-item px-3 my-2 border-0">Xin chào, <strong class="text-primary">{{Auth::guard('customer')->user()->fullName}} !</strong></li>
            <li class="list-group-item px-3 my-2 border-0"><a href="{{route('home.info')}}" class="text-dark">Thông tin tài khoản</a></li>
            <li class="list-group-item px-3 my-2 border-0"><a href="{{route('home.my_order')}}" class="text-dark">Đơn hàng của bạn</a></li>
            <li class="list-group-item px-3 my-2 border-0"><a href="{{route('home.changePassword')}}" class="text-dark">Đổi mật khẩu</a></li>
          </ul>
    </div>
    <div class="col-lg-8 shadow">
        {{$slot}}
    </div>
</div>