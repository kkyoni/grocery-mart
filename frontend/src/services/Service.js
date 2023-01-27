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
    getSortingProduct(sort, category_id) {
        return axios.get(API_BASE_URL + 'products-sorting/' + sort + '/' + category_id);
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
    getProducts(id) {
        return axios.get(API_BASE_URL + 'get-products/' + id);
    }
    getChat(id) {
        return axios.get(API_BASE_URL + 'get-chat/' + id);
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
    getsiteLogo() {
        return axios.get(API_BASE_URL + 'get-sitelogo/');
    }
    VerifyOtp(data) {
        return axios.post(API_BASE_URL + 'verifyOtp/',data);
    }
    SendOtp(data) {
        return axios.post(API_BASE_URL + 'sendOtp/',data);
    }
    Login(data) {
        return axios.post(API_BASE_URL + 'login/',data);
    }
    CreateContact(data) {
        return axios.post(API_BASE_URL + 'add-contact/',data);
    }
    CreateSupport(data) {
        return axios.post(API_BASE_URL + 'add-support/',data);
    }
    CreateAddress(data) {
        return axios.post(API_BASE_URL + 'add-address/',data);
    }
    PromoCode(data) {
        return axios.post(API_BASE_URL + 'promocode/',data);
    }
    SaveCod(data) {
        return axios.post(API_BASE_URL + 'checkoutsavecod/',data);
    }
    TrackInvoice(data) {
        return axios.post(API_BASE_URL + 'track-now/',data);
    }
    SaveUserProfile(data) {
        return axios.post(API_BASE_URL + 'profile/',data);
    }
    CreateComment(data) {
        return axios.post(API_BASE_URL + 'add-Comment/',data);
    }
}

export default new Service();