import React, { Component } from "react";
import { Link } from 'react-router-dom';
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
import { toast } from 'react-toastify';
class Products extends Component {
	constructor(props) {
		super(props)
		this.state = {
			id: this.props.match.params.id,
			product: [],
			temp: [],
			loading: false,
			photo: 'http://127.0.0.1:8000/storage/product/',
			visible: 6,
			isLoading: true,
			isLoadingButton: false,
			AddCartDetails: false,
			ShowingResults: 0,
			singleFetchedProduct: {}
		}
		this.loadmore = this.loadmore.bind(this);
	}
	catagoryDataFromChildComp = (data) => this.setState({ product: data });
	brandDataFromChildComp = (data) => this.setState({ product: data });
	priceDataFromChildComp = (data) => this.setState({ product: data });
	sortDataFromChildComp = (data) => this.setState({ product: data });

	componentWillReceiveProps(nextProps) {
		this.setState({
			isLoading: true,
		});
		setTimeout(() => {
			this.setState({ isLoading: false, visible:6 });
		}, 1000);
		this.ChangeProduct(nextProps.match.params.id);
	}
	componentDidMount() {
		this.setState({
			isLoading: true,
		});
		setTimeout(() => {
			this.setState({ isLoading: false });
		}, 1000);
		this.ChangeProduct(this.state.id);
	}

	ChangeProduct(id) {
		Service.getProducts(id).then((res) => {
			if (res.data.status === 'success') {
				this.setState({ product: res.data.product, ShowingResults: res.data.product_count, connection: true, notrecordloading: true });
			} else {
				this.setState({ product: [], connection: true, notrecordloading: false });
			}
		});
	}

	loadmore() {
		this.setState({
			isLoading: true,
		});
		setTimeout(() => {
			this.setState({ isLoading: false });
		}, 1000);
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
			let currentProduct = productDetails.filter(x => x.id === item.id);
			let index = productDetails.findIndex(x => x.id === item.id);
			if (currentProduct.length > 0) {
				let quantity = currentProduct[0].qty;
				let price = Number(currentProduct[0].price);
				let main_price = Number(currentProduct[0].main_price);
				quantity = quantity + 1;
				price = price + main_price;
				currentProduct[0].qty = quantity;
				currentProduct[0].price = Number.parseFloat(price).toFixed(2);
				productDetails[index] = currentProduct[0];
				this.setState({ product_cart: productDetails });
				localStorage.setItem('product_details', JSON.stringify(productDetails));
				toast.success("Add To Cart", { position: toast.POSITION.TOP_RIGHT });
			} else {
				productDetails.push(item);
				localStorage.setItem('product_details', JSON.stringify(productDetails));
				toast.success("Add To Cart", { position: toast.POSITION.TOP_RIGHT });
			}
		}
		this.setState({
			isLoading: true,
		});
		setTimeout(() => {
			this.setState({ AddCartDetails: true, isLoading: false });
		}, 1000);
		toast.success("Add To Cart", { position: toast.POSITION.TOP_RIGHT });
	}
	render() {
		// console.log("jaymin",this.state.product);
		const { name, description, productimage, price } = this.state.singleFetchedProduct;
		const { isLoadingButton } = this.state.isLoadingButton;
		var product_HTMLTABLE = "";
		if (this.state.connection) {
			if (this.state.notrecordloading) {
				product_HTMLTABLE =
					this.state.product.slice(0, this.state.visible).map((item, index) => {
						return (
							<div key={index} className="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles mt-3">
								<div className="agile_ecommerce_tab_left mobiles_grid">
									<div className="hs-wrapper hs-wrapper2" style={{ zIndex: "0" }}>
										{item.productimage.map((type, i) => {
											return <img key={i} src={this.state.photo + type.image} alt={type.image} className="img-fluid" />
										})}
										<div className="w3_hs_bottom w3_hs_bottom_sub1">
											<ul>
												<li>
													<Link onClick={() => this.handleViewProduct(item.id)} data-bs-toggle="modal"
														data-bs-target="#myModal17"><i className="fas fa-eye"></i></Link>
												</li>
											</ul>
										</div>
									</div>
									<h5><Link to={`/single-products/${item.id}`}>{item.name}</Link></h5>
									<div className="simpleCart_shelfItem">
										<p><i className="item_price">₹ {item.price}</i></p>
										<Button className="w3ls-cart" onClick={() => this.onAddCartHandler(item)}>
										{isLoadingButton ? (<span>please wait...</span>) : (<span>Add to cart</span>)}
										</Button>
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
				product_HTMLTABLE = <img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" />
			}
		} else {
			product_HTMLTABLE = <img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" />
		}
		return (
			<div>
				<Title isLoadingPage={this.state.isLoading} />
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
								<SliderCategory />
								<Brand parentBrandCallback={this.brandDataFromChildComp} />
								<Price parentPriceCallback={this.priceDataFromChildComp} />
							</div>
							<div className="col-md-8 w3ls_mobiles_grid_right">
								<div className="row">
									<div className="col-md-6 w3ls_mobiles_grid_right_left">
										<div className="w3ls_mobiles_grid_right_grid1">
											<img src="../assets/images/pbg1.jpg" alt="pbg1" className="img-fluid radius-image" />
											<div className="w3ls_mobiles_grid_right_grid1_pos1">
												<h3>Best<span> Price</span> on Vegetables</h3>
											</div>
										</div>
									</div>
									<div className="col-md-6 w3ls_mobiles_grid_right_left">
										<div className="w3ls_mobiles_grid_right_grid1">
											<img src="../assets/images/pbg2.jpg" alt="pbg2" className="img-fluid radius-image" />
											<div className="w3ls_mobiles_grid_right_grid1_pos">
												<h3>Best Deals <span> For New</span>Products</h3>
											</div>
										</div>
									</div>
								</div>
								<Sorting parentSortCallback={this.sortDataFromChildComp} ShowResults={this.state.ShowingResults} category_id={this.props.match.params.id} />
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
				<div className="modal fade" id="myModal17" tabIndex={-1} aria-labelledby="myModal17" aria-hidden="true">
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