import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import Service from "../../services/Service";
import { Button } from "reactstrap";
import { toast } from 'react-toastify';
class ProductsSingle extends Component {
	constructor(props) {
		super(props)
		this.state = {
			id: this.props.match.params.id,
			isLoading: true,
			photo: 'http://127.0.0.1:8000/storage/product/',
			productsdetail: {}
		}
	}
	async componentDidMount() {
		Service.getProductsSingle(this.state.id).then(res => {
			this.setState({
				isLoading: true,
			});
			setTimeout(() => {
				this.setState({ isLoading: false, productsdetail: res.data.productsdetail });
			}, 1000);
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
		toast.success("Add To Cart", { position: toast.POSITION.TOP_RIGHT });
	}
	render() {
		const { name, description, productimage, price } = this.state.productsdetail;
		return (
			<div>
				<Title isLoadingPage={this.state.isLoading} />
                <Header />
				<div className="banner banner2">
					<div className="container">
						<h2>Single Page</h2>
					</div>
				</div>
				<div className="breadcrumb_dress">
					<div className="container">
						<ul>
							<li><Link to={"/"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
								<i>/</i></li>
							<li>Single Page</li>
						</ul>
					</div>
				</div>
				<div className="single py-5">
					<div className="container py-lg-5 py-4">
						<div className="row align-items-center">
							<div className="col-lg-4 col-md-8 single-right-left ">
								{productimage && <img src={this.state.photo + productimage[0]?.image} alt={productimage[0]?.image} className="img-fluid" />}
							</div>
							<div className="col-md-8 single-right">
								<h3>{name}</h3>
								<div className="rating1">
									<span className="starRating">
										<input id="rating5" type="radio" name="rating" value="5" />
										<label for="rating5">5</label>
										<input id="rating4" type="radio" name="rating" value="4" />
										<label for="rating4">4</label>
										<input id="rating3" type="radio" name="rating" value="3" checked />
										<label for="rating3">3</label>
										<input id="rating2" type="radio" name="rating" value="2" />
										<label for="rating2">2</label>
										<input id="rating1" type="radio" name="rating" value="1" />
										<label for="rating1">1</label>
									</span>
								</div>
								<div className="description">
									<h5><i>Description</i></h5>
									<p>{description}</p>
								</div>
								<div className="simpleCart_shelfItem">
									<p><i className="item_price">₹ {price}</i></p>
									<Button className="w3ls-cart" onClick={() => this.onAddCartHandler(this.state.productsdetail)}>Add to cart</Button>
								</div>
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
export default ProductsSingle;