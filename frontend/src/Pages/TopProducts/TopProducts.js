import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Service from "../../services/Service";
import { Button } from "reactstrap";
import { toast } from 'react-toastify';
class TopProducts extends Component {
    constructor(props) {
        super(props)
        this.state = {
            product: [],
            loading: false,
            photo: 'http://127.0.0.1:8000/storage/product/',
            Data: false,
            isLoadingButton: false,
            singleFetchedProduct: {}
        }
    }
    async componentDidMount() {
        Service.getTopProducts().then((res) => {
            if (res.data.status === 'success') {
                this.setState({ product: res.data.product, connection: true, notrecordloading: true });
            } else {
                this.setState({ product: [], connection: true, notrecordloading: false });
            }
        });
    }
    onAddCartHandler = (item) => {
        const productDetails = JSON.parse(localStorage.getItem("product_details"));
        let products;
        if (!productDetails) {
            products = []
            products.push(item);
            localStorage.setItem('product_details', JSON.stringify(products))
        } else {
            products = JSON.parse(localStorage.getItem("product_details"))
            products.push(item);
            localStorage.setItem('product_details', JSON.stringify(products))
        }
        this.setState({ AddCartDetails: true })
        toast.success("Add To Cart", { position: toast.POSITION.TOP_RIGHT });
    }
    handleViewProduct(id) {
        Service.getSingleProduct(id).then(res => {
            this.setState({ singleFetchedProduct: res.data.product[0] });
        })
    }
    render() {
        const { name, description, productimage, price } = this.state.singleFetchedProduct;
        const { isLoadingButton } = this.state.isLoadingButton;
        var product_HTMLTABLE = "";
        if (this.state.connection) {
            if (this.state.notrecordloading) {
                product_HTMLTABLE =
                    this.state.product.map((item, index) => {
                        return (
                            <div key={index} className="col-md-3 agileinfo_new_products_grid mt-5">
                                <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                    <div className="hs-wrapper hs-wrapper1" style={{ zIndex: "0" }}>
                                        {item.productimage.map((type, i) => {
                                            return <img key={i} src={this.state.photo + type.image} alt={type.image} className="img-fluid" />
                                        })}
                                        <div className="w3_hs_bottom w3_hs_bottom_sub">
                                            <ul>
                                                <li>
                                                    <Link onClick={() => this.handleViewProduct(item.id)} data-bs-toggle="modal"
                                                        data-bs-target="#myModal13"><i className="fas fa-eye"></i></Link>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h5><Link to={`/single-products/${item.id}`}>{item.name}</Link></h5>
                                    <div className="simpleCart_shelfItem">
                                        <p><i className="item_price">₹ {item.price}</i></p>
                                        <Button className="w3ls-cart" onClick={() => this.onAddCartHandler(item)}>
                                            {isLoadingButton ? (<span>please wait...</span>) : (<span>Add To Cart</span>)}
                                        </Button>
                                    </div>
                                </div>
                            </div>
                        );
                    });
            } else {
                product_HTMLTABLE = <img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "100%", height: "1%" }} />
            }
        } else {
            product_HTMLTABLE = <img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "100%", height: "1%" }} />
        }
        return (
            <div>
                <div className="new-products py-5">
                    <div className="container py-md-5 py-4">
                        <h3>Top Products</h3>
                        <div className="row agileinfo_new_products_grids">
                            {product_HTMLTABLE}
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal13" tabIndex={-1} aria-labelledby="myModal13" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    {Object.keys(this.state.singleFetchedProduct).length > 0 &&
                                        <img
                                            src={`${this.state.photo}${productimage[0].image}`}
                                            alt={productimage[0].image}
                                            className="img-fluid"
                                        />}
                                </div>
                                {Object.keys(this.state.singleFetchedProduct).length > 0 && (
                                    <div className="col-md-7 modal_body_right">
                                        <h4>{name}</h4>
                                        <p>{description}</p>
                                        <div className="rating">
                                            <div className="rating-left">
                                                <img src="assets/images/star-.png" alt="star-" className="img-fluid" />
                                            </div>
                                            <div className="rating-left">
                                                <img src="assets/images/star-.png" alt="star-" className="img-fluid" />
                                            </div>
                                            <div className="rating-left">
                                                <img src="assets/images/star-.png" alt="star-" className="img-fluid" />
                                            </div>
                                            <div className="rating-left">
                                                <img src="assets/images/star.png" alt="star" className="img-fluid" />
                                            </div>
                                            <div className="rating-left">
                                                <img src="assets/images/star.png" alt="star" className="img-fluid" />
                                            </div>
                                            <div className="clearfix"> </div>
                                        </div>
                                        <div className="modal_body_right_cart simpleCart_shelfItem">
                                            <p><i className="item_price">₹ {price}</i></p>
                                            <Button className="w3ls-cart" onClick={() => this.onAddCartHandler(this.state.singleFetchedProduct)}>Add to cart</Button>
                                        </div>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default TopProducts;