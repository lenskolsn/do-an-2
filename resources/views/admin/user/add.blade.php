<x-admin title="Thêm user">
    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <x-input name="name" label="Họ tên" />
                <x-input name="email" type="email" label="Email" />
                <x-input name="password" type="password" label="Mật khẩu" />
                <x-input name="confirm_password" type="password" label="Nhập lại mật khẩu" />
            </div>
            <div class="col-lg-6">
                <x-input name="avatar" id="fileImageUser" type="file" label="Avatar" />
                <img src="" id="imageUser" width="200" alt="">
            </div>
            <div class="col-lg-12">
                <a href="{{route('admin.user')}}" class="btn btn-sm btn-dark" id="saveBtn"><i class="fas fa-arrow-left"></i> Trở lại</a>
                <button class="btn btn-sm btn-primary" id="saveBtn"><i class="fas fa-save"></i> Lưu</button>
            </div>
        </div>
    </form>
    @section('script')
        <script>
            let fileImageUser = document.getElementById('fileImageUser');
            fileImageUser.onchange = (e) => {
                let imageUser = document.getElementById('imageUser')
                url = URL.createObjectURL(fileImageUser.files[0]);
                imageUser.setAttribute('src', url)
            }
        </script>
    @stop
</x-admin>
