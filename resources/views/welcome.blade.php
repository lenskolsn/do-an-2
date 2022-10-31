<x-home title="Trang chủ">
    <div id="vueDataProducts" class="row">
        <li class="col-lg-3 col-md-4 col-6 body__menu-list-item mb-3" v-for="item in products">
            <a :href="`/chi-tiet/${item.id}`" class="body__menu-list-link">
                <div class="body__menu-list-link-img-btn m-auto">
                    <img :src="`/storage/images/${item.image}`" />
                    <a id="btn_add_cart" class="btn w-100 mt-3 fs-4" style="background: #4797b1; color: white;"
                        :href="`/gio-hang/add/${item.id}`">
                        Thêm vào giỏ hàng
                    </a>
                </div>

                <p class="body__menu-list-link-desc">@{{ item.name }}</p>
                <p class="body__menu-list-link-price" v-if="item.discountPrice">
                    Giá: <span> @{{ new Intl.NumberFormat('vi-VN').format(item.price - (item.price * item.discountPrice / 100)) }}đ </span>
                    <span style="text-decoration: line-through;" class="text-secondary"> @{{ new Intl.NumberFormat('vi-VN').format(item.price) }}đ </span>
                </p>
                <p class="body__menu-list-link-price" v-else>
                    Giá: <span> @{{ new Intl.NumberFormat('vi-VN').format(item.price) }}đ </span>
                </p>
            </a>
        </li>
    </div>
    @section('script')
        <script>
            const app = new Vue({
                el: '#app',
                data: {
                    products: [],
                    categories: [],
                    categoryId: null
                },
                methods: {
                    handleGetProduct(id) {
                        this.categoryId = id;
                        axios.get('/api/products/' + id)
                            .then(res => {
                                this.products = res.data;
                            })
                            .catch(err => {
                                console.log(err);
                            })
                    },
                    getProducts() {
                        axios.get('/api/products')
                            .then(res => {
                                this.products = res.data;
                            })
                            .catch(err => {
                                console.log(err);
                            })
                    },
                    getCategory() {
                        axios.get('/api/categories')
                            .then(res => {
                                this.categories = res.data;
                                this.categoryId = res.data[0].id;
                            })
                            .catch(err => {
                                console.log(err);
                            })
                    }
                },
                mounted() {
                    this.getProducts();
                    this.getCategory();
                }
            });
        </script>
    @endsection
</x-home>
