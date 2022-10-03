require('./bootstrap');
window.Vue = require('vue').default;
Vue.use(require('vue-resource'));
// Đăng ký component
Vue.component('product-component', require('./components/ProductComponent.vue').default);
Vue.component('category-component', require('./components/CategoryComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
});
