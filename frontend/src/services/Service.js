import axios from 'axios';
const API_BASE_URL = "http://127.0.0.1:8000/api/";
class Service {
    getSinglecategorys(id) {
        return axios.get(API_BASE_URL + 'singlecategorys/' + id);
    }
    getSinglebrand(id) {
        return axios.get(API_BASE_URL + 'singlebrand/' + id);
    }
    getSingleProduct(id) {
        return axios.get(API_BASE_URL + 'singleproduct/' + id);
    }
    singleUserOrder(id) {
        return axios.get(API_BASE_URL + 'singleuserorder/' + id);
    }
    getUserOrder(user_id) {
        return axios.get(API_BASE_URL + 'userorder/' + user_id);
    }
    getUserAddress(id) {
        return axios.get(API_BASE_URL + 'useraddress/' + id);
    }
    UserAddressDelete(address_id, user_id) {
        return axios.get(API_BASE_URL + 'useraddressdelete/' + address_id + '/' + user_id);
    }
    UserAddressSelect(address_id, user_id) {
        return axios.get(API_BASE_URL + 'useraddressselect/' + address_id + '/' + user_id);
    }
    UserEditAddress(address_id) {
        return axios.get(API_BASE_URL + 'usereditaddress/' + address_id);
    }
    getProductsSingle(id) {
        return axios.get(API_BASE_URL + 'productssingle/' + id);
    }
    getSortingProduct(sort) {
        return axios.get(API_BASE_URL + 'productssorting/' + sort);
    }
    getProductPrice(min, max) {
        return axios.get(API_BASE_URL + 'productsprice/' + min + '/' + max);
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
}

export default new Service();