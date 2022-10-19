<x-only-header title="{{$product->name}}">
<div class="row">
    <div class="col-lg-5 text-center">
        <img src="/storage/images/{{$product->image}}" width="80%" alt="">
    </div>
    <div class="col-lg-7">
        <h1 class="fw-bold">{{$product->name}}</h1>
        <i>{{$product->description ?? 'Mô tả đang cập nhật'}}</i>
        <h2>{{number_format($product->price)}}</h2>
    </div>
</div>
@section('script')
    <script>
    </script>
@endsection
</x-only-header>