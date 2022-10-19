<x-admin title="Banner">
    <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <x-input name="title" label="Tiêu đề" />
                <x-input name="description" label="Mô tả" />
                <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Lưu</button>
            </div>
            <div class="col-lg-6">
                <x-input name="image" type="file" label="Hình ảnh" />
                <img src="" width="100" alt="">
            </div>
        </div>
    </form>
    <table class="table mt-3">
        <thead class="bg-info text-lifht">
            <tr>
                <th>#</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banner as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <img src="/storage/banner/{{ $item->image }}" width="200" alt="">
                    </td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{route('admin.banner.delete',$item->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$banner->links()}}
</x-admin>
