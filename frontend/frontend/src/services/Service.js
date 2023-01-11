import axios from 'axios';
const API_BASE_URL = "http://127.0.0.1:8000/api/";
class Service {
    getSinglecategorys(id) {
        return axios.get(API_BASE_URL + 'single-categorys/' + id);
    }
    getSinglebrand(id) {
        return axios.get(API_BASE_URL + 'single-brand/' + id);
    }
    getSingleProduct(id) {
        return axios.get(API_BASE_URL + 'single-product/' + id);
    }
    singleUserOrder(id) {
        return axios.get(API_BASE_URL + 'single-user-order/' + id);
    }
    getUserOrder(user_id) {
        return axios.get(API_BASE_URL + 'user-order/' + user_id);
    }
    getUserAddress(id) {
        return axios.get(API_BASE_URL + 'user-address/' + id);
    }
    UserAddressDelete(address_id, user_id) {
        return axios.get(API_BASE_URL + 'user-address-delete/' + address_id + '/' + user_id);
    }
    UserAddressSelect(address_id, user_id) {
        return axios.get(API_BASE_URL + 'user-address-select/' + address_id + '/' + user_id);
    }
    UserEditAddress(address_id) {
        return axios.get(API_BASE_URL + 'user-edit-address/' + address_id);
    }
    getProductsSingle(id) {
        return axios.get(API_BASE_URL + 'products-single/' + id);
    }
    getSortingProduct(sort) {
        return axios.get(API_BASE_URL + 'products-sorting/' + sort);
    }
    getProductPrice(min, max) {
        return axios.get(API_BASE_URL + 'products-price/' + min + '/' + max);
    }
    getSingleBlogById(id) {
        return axios.get(API_BASE_URL + 'blog-detail/' + id);
    }
    getComment(id) {
        return axios.get(API_BASE_URL + 'get-Comment/' + id);
    }
    getFaq() {
        return axios.get(API_BASE_URL + 'get-faq/');
    }
    getBlog() {
        return axios.get(API_BASE_URL + 'get-blog/');
    }
    getProducts() {
        return axios.get(API_BASE_URL + 'get-products/');
    }
    getBrand() {
        return axios.get(API_BASE_URL + 'get-brand/');
    }
    getCategories() {
        return axios.get(API_BASE_URL + 'get-categories/');
    }
    getTopProducts() {
        return axios.get(API_BASE_URL + 'get-top-products/');
    }
    getsiteLogo(){
        return axios.get(API_BASE_URL + 'get-sitelogo/');
    }
}

export default new Service();