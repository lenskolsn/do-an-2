<x-admin title="Dashboard">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Danh mục</span>
                    <a href="{{ route('admin.category') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-danger">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Sản phẩm</span>
                    <a href="{{ route('admin.product') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Đơn hàng</span>
                    <a href="{{ route('admin.product') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-secondary">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Users</span>
                    <a href="{{ route('admin.product') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-warning">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Khách hàng</span>
                    <a href="{{ route('admin.product') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-dark">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Bài viết</span>
                    <a href="{{ route('admin.product') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Bình luận</span>
                    <a href="{{ route('admin.product') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box text-light" style="background: #B590CA;">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Banner</span>
                    <a href="{{ route('admin.product') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box text-light" style="background: #EC7272;">
                <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number h4">{{ $product_category }}</span>
                    <span class="info-box-text">Liên hệ</span>
                    <a href="{{ route('admin.product') }}" class="small-box-footer text-decoration-none text-light">Xem
                        chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</x-admin>
