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
    getProductsSingle(id) {
        return axios.get(API_BASE_URL + 'productssingle/' + id);
    }
    getSortingProduct(sort) {
        return axios.get(API_BASE_URL + 'productssorting/' + sort);
    }
    getProductPrice(min, max) {
        return axios.get(API_BASE_URL + 'productsprice/' + min + '/' + max);
    }
}

export default new Service();