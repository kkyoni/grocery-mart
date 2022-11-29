import React, { Component } from "react";
import { Link } from 'react-router-dom';
import axios from "axios";
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import SliderCategory from "../Slider/SliderCategory";
import Brand from "../Slider/Brand";
import Price from "../Slider/Price";
import Service from "../../services/Service";
import { Button } from "reactstrap";
import Sorting from "../Slider/Sorting";
class Products extends Component {
	constructor(props) {
		super(props)
		this.state = {
			product: [],
			temp: [],
			loading: false,
			photo: 'http://127.0.0.1:8000/storage/product/',
			visible: 6,
			Data: false,
			isLoadingButton: false,
			AddCartDetails: false,
			singleFetchedProduct: {}
		}
		this.loadmore = this.loadmore.bind(this);
	}

	catagoryDataFromChildComp = (data) => this.setState({ product: data });
	brandDataFromChildComp = (data) => this.setState({ product: data });
	priceDataFromChildComp = (data) => this.setState({ product: data });
	sortDataFromChildComp = (data) => this.setState({ product: data });
	async componentDidMount() {
		const res = await axios.get('http://127.0.0.1:8000/api/getproducts');
		if (res.data.status === 'success') {
			if (res.data.product.length === 0) {
				this.setState({ product: [], dataLoaded: true, error: false, Data: false });
			} else {
				this.setState({ product: res.data.product, dataLoaded: true, error: false, Data: true });
			}
		}
	}
	loadmore() {
		this.setState((old) => {
			return { visible: old.visible + 6 };
		});
	}
	handleViewProduct(id) {
		Service.getSingleProduct(id).then(res => {
			this.setState({ singleFetchedProduct: res.data.product[0] });
		})
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
	}
	viewProducts(id) {
		this.props.history.push(`/single-products/${id}`);
	}
	render() {
		const { name, description, productimage, price } = this.state.singleFetchedProduct;
		const { isLoadingButton } = this.state.isLoadingButton;
		var product_HTMLTABLE = "";
		if (this.state.dataLoaded) {
			if (this.state.Data) {
				product_HTMLTABLE =
					this.state.product.slice(0, this.state.visible).map((item, index) => {
						return (
							<div key={index} className="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles mt-3">
								<div className="agile_ecommerce_tab_left mobiles_grid">
									<div className="hs-wrapper hs-wrapper2">
										{item.productimage.map((type, i) => {
											return <img key={i} src={this.state.photo + type.image} alt={type.image} className="img-fluid" />
										})}
										<div className="w3_hs_bottom w3_hs_bottom_sub1">
											<ul>
												<li>
													<a href="javascript:void(0)" onClick={() => this.handleViewProduct(item.id)} data-bs-toggle="modal"
														data-bs-target="#myModal17"><i className="fas fa-eye"></i></a>
												</li>
											</ul>
										</div>
									</div>
									<h5><Link onClick={() => this.viewProducts(item.id)}>{item.name}</Link></h5>
									<div className="simpleCart_shelfItem">
										<p><i className="item_price">₹ {item.price}</i></p>
										<Button className="w3ls-cart" onClick={() => this.onAddCartHandler(item)}>
											{isLoadingButton ? (
												<i class="fa fa-refresh fa-spin"></i>
											) : (
												<span>Add to cart</span>
											)}</Button>
									</div>
									{item.new_offer === 'new' ? (
										<div className="mobiles_grid_pos">
											<h6>New</h6>
										</div>
									) : ("")}
								</div>
							</div>
						);
					});
			} else {
				product_HTMLTABLE = <div><h2>Not Data Found ...</h2></div>
			}
		} else {
			product_HTMLTABLE = <div><h2>Loading ...</h2></div>;
		}
		return (
			<div>
				<Title />
				<Header CartDetails={this.state.AddCartDetails} />

				<div className="banner banner2">
					<div className="container">
						<h2>Top Selling <span>Kitchen Products</span> Flat <i>25% Discount</i></h2>
					</div>
				</div>

				<div className="breadcrumb_dress">
					<div className="container">
						<ul>
							<li><Link to={"/"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
								<i>/</i></li>
							<li>Products</li>
						</ul>
					</div>
				</div>

				<div className="mobiles py-5">
					<div className="container py-lg-4 py-3">
						<div className="row w3ls_mobiles_grids">
							<div className="col-md-4 w3ls_mobiles_grid_left">
								<SliderCategory parentCategoryCallback={this.catagoryDataFromChildComp} />
								<Brand parentBrandCallback={this.brandDataFromChildComp} />
								<Price parentPriceCallback={this.priceDataFromChildComp} />
							</div>
							<div className="col-md-8 w3ls_mobiles_grid_right">
								<div className="row">
									<div className="col-md-6 w3ls_mobiles_grid_right_left">
										<div className="w3ls_mobiles_grid_right_grid1">
											<img src="assets/images/pbg1.jpg" alt="pbg1" className="img-fluid radius-image" />
											<div className="w3ls_mobiles_grid_right_grid1_pos1">
												<h3>Best<span> Price</span> on Vegetables</h3>
											</div>
										</div>
									</div>
									<div className="col-md-6 w3ls_mobiles_grid_right_left">
										<div className="w3ls_mobiles_grid_right_grid1">
											<img src="assets/images/pbg2.jpg" alt="pbg2" className="img-fluid radius-image" />
											<div className="w3ls_mobiles_grid_right_grid1_pos">
												<h3>Best Deals <span> For New</span>Products</h3>
											</div>
										</div>
									</div>
								</div>

								<Sorting parentSortCallback={this.sortDataFromChildComp} />

								<div className="row w3ls_mobiles_grid_right_grid3">
									{product_HTMLTABLE}
									<br />
									<div className="mt-5">
										{this.state.visible < this.state.product.length &&
											<div className="bottom-content-team text-center">
												<button className="btn btn-primary" type="button" onClick={this.loadmore}>Load More</button>
											</div>
										}
									</div>

								</div>


							</div>
						</div>
					</div>
				</div>

				<div className="modal fade" id="myModal17" tabindex="-1" aria-labelledby="myModal17" aria-hidden="true">
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

				<Newsletter />
				<Footer />
			</div>
		)
	}
}

export default Products;