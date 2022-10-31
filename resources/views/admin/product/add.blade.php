<x-admin title="Thêm sản phẩm">
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <x-input name="name" label="Tên sản phẩm" />
                <div class="form-group">
                    <label class="form-label">Danh mục</label>
                    <select class="form-select" name="categoryId">
                        <option value="" selected disabled>Chọn 1 danh mục</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="editor" class="form-label">Mô tả</label>
                    <textarea name="description" id="editor"></textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <a href="{{ route('admin.product') }}" class="btn btn-secondary mt-3"><i
                        class="fas fa-chevron-circle-left"></i> Trở lại</a>
                <button class="btn btn-success mt-3">Lưu dữ liệu</button>
            </div>
            <div class="col-lg-6">
                <x-input name="price" type="number" label="Giá" />
                <x-input name="discountPrice" type="number" label="Giảm giá (%)" />
                <x-input name="inStock" type="number" label="Số lượng" />
                <x-input name="image" id="fileImageProduct" type="file" label="Hình ảnh" />
                <img src="" id="imageProduct" width="200" alt="">
            </div>
        </div>
        </div>
    </form>
    @section('script')
        <script>
            CKEDITOR.replace('editor');

            let fileImageProduct = document.getElementById('fileImageProduct');
            fileImageProduct.onchange = (e) => {
                let imageProduct = document.getElementById('imageProduct')
                url = URL.createObjectURL(fileImageProduct.files[0]);
                imageProduct.setAttribute('src', url)
            }
        </script>
    @endsection
</x-admin>
