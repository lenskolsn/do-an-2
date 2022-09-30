<template lang="">
    <div class="vueDataProduct">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{action}} sản phẩm
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" v-model="proData.name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Giá</label>
                                    <input type="text" class="form-control" v-model="proData.price">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Mô tả</label>
                                    <input type="text" class="form-control" v-model="proData.description">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Danh mục</label>
                                    <select name="" id="" class="form-select">
                                        <option value=""> -- Chọn 1 danh mục -- </option>
                                        <option value="" v-for="item in categories" :value="item.id" :key="item.id">{{item.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Hình ảnh</label>
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Đóng
                        </button>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-save"></i> Lưu
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <p>
            <button class="btn btn-success text-light btn-sm shadow" @click="showCreateModal">
                <i class="fas fa-plus"></i> Thêm mới
            </button>
            <button class="btn btn-info text-light btn-sm shadow" @click="getProduct">
                <i class="fas fa-undo"></i> Làm mới
            </button>
        </p>
        <table class="table shadow">
            <thead class="bg-info text-light">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th>Danh mục</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in products" :key="item.id">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.image }}</td>
                    <td>{{ item.price }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.categoryId }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning shadow">Sửa</button>
                        <button class="btn btn-sm btn-danger shadow">Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    let noti = new AWN({
        minDurations: {
            "async-block": 300,
            async: 300,
        },
    });
    export default {
        data() {
            return {
                products: [],
                categories: [],
                mCreate: {},
                action: "",
                proData: {
                    id: 0,
                    name: null,
                    price: null,
                    description: null,
                    categoryId: null,
                },
            };
        },
        methods: {
            getProduct() {
                noti.asyncBlock(
                    axios.get("/api/products"),
                    (res) => {
                        this.products = res.data;
                    },
                    (err) => {
                        noti.alert(err);
                    },
                    "Chờ xíu"
                );
            },
            getCategory() {
                    axios.get("/api/categories")
                    .then(res=>{
                        this.categories = res.data;
                    })
            },
            showCreateModal() {
                this.action = 'Thêm';
                this.mCreate.show();
            }
        },
        mounted() {
            this.mCreate = new bootstrap.Modal('#exampleModal');
            this.getCategory();
            this.getProduct();
        }
    };

</script>
