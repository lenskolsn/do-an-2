<x-home title="Trang chủ">
    <div id="vueDataProducts" class="row">
        <li class="col-lg-3 col-md-4 col-6 body__menu-list-item" v-for="item in products">
            <a :href="`/chi-tiet/${item.id}`" class="body__menu-list-link">
                <div class="body__menu-list-link-img-btn">
                    <img :src="`/storage/images/${item.image}`" alt="" />
                    <button class="body__menu-list-link-btn">
                        Thêm vào giỏ hàng
                    </button>
                </div>

                <p class="body__menu-list-link-desc">@{{ item.name }}</p>
                <p class="body__menu-list-link-price">
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
                    handleGetProduct(id){
                        this.categoryId = id;
                        axios.get('/api/products/' + id)
                        .then(res=>{
                            this.products = res.data;
                        })
                        .catch(err=>{
                            console.log(err);
                        })
                    },
                    getProducts(){
                        axios.get('/api/products')
                        .then(res=>{
                            this.products = res.data;
                        })
                        .catch(err=>{
                            console.log(err);
                        })
                    },
                    getCategory(){
                        axios.get('/api/categories')
                        .then(res=>{
                            this.categories = res.data;
                            this.categoryId = res.data[0].id;
                        })
                        .catch(err=>{
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
