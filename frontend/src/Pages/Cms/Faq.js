import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import Service from "../../services/Service";
class Faq extends Component {
	state = {
		faq: [],
		isLoading: true,
	}
	async componentDidMount() {
		this.setState({
			isLoading: true,
		});
		setTimeout(() => {
			this.setState({ isLoading: false });
		}, 1000);
		Service.getFaq().then((res) => {
			if (res.data.status === 'success') {
				this.setState({ faq: res.data.faq, connection: true, notrecordloading: true });
			} else {
				this.setState({ faq: [], connection: true, notrecordloading: false });
			}
		});
	}
	render() {
		var faq_HTMLTABLE = "";
		if (this.state.connection) {
			if (this.state.notrecordloading) {
				faq_HTMLTABLE =
					this.state.faq.map((item, key) => {
						return (
							<div className="w3l_faq_grid">
								<h3>{key}. {item.question}</h3>
								<p><b>Ans.</b> {item.answer}</p>
							</div>
						);
					});
			} else {
				faq_HTMLTABLE = <img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "100%", height: "1%" }} />
			}
		} else {
			faq_HTMLTABLE = <img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "100%", height: "1%" }} />
		}
		return (
			<div>
				<Title isLoadingPage={this.state.isLoading} />
                <Header />
				<div className="banner banner2">
					<div className="container">
						<h2>FAQ's</h2>
					</div>
				</div>
				<div className="breadcrumb_dress">
					<div className="container">
						<ul>
							<li><Link to={"/home"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
								<i>/</i></li>
							<li>FAQ's</li>
						</ul>
					</div>
				</div>
				<div className="faq py-5">
					<div className="container py-lg-4 py-3">
						<div className="w3l_faq_grids">
							{faq_HTMLTABLE}
						</div>
					</div>
				</div>
				<Newsletter />
				<Footer />
			</div>
		)
	}
}
export default Faq;