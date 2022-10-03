<x-only-header title="Đăng nhập tài khoản">
    <div class="box">
        <form action="{{ route('home.login.store') }}" method="post">
            @csrf
            <div class="box-item">
                <h4>Đăng nhập</h4>
                <input name="email" value="{{old('email')}}" placeholder="Email" type="email">
                @error('email')
                <span style="color: red; font-size: 13px;">{{ $message }}</span>
                @enderror
                <input name="password" value="{{old('password')}}" placeholder="Mật khẩu" type="password">
                @error('password')
                <span style="color: red; font-size: 13px;">{{ $message }}</span>
                @enderror
                <button>ĐĂNG NHẬP</button>
                <p>Nếu bạn chưa có tài khoản, đăng ký <a href="{{ route('home.register') }}">tại đây</a></p>
            </div>
        </form>
    </div>
</x-only-header>
