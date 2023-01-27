import React, { Component } from "react";
import Header from "../../Components/Header";
import Title from "../../Components/Title";
import Footer from "../../Components/Footer";
import Newsletter from "../Newsletter/Newsletter";
import { Link } from 'react-router-dom';
import Service from "../../services/Service";
import { toast } from 'react-toastify';
import './ordretracking.css';
class OrderTracking extends Component {
    constructor(props) {
        super(props)
        this.state = {
            isLoading: true,
            tracknow: true,
            TrackOrder: '',
            invoice: ""
        }
    }
    componentDidMount() {
        this.setState({ isLoading: true, });
        setTimeout(() => this.setState({ isLoading: false }), 1000);
        if (localStorage.getItem("invoice")) {
            this.setState({ invoice: localStorage.getItem("invoice") });
            this.onSubmitInvoice(localStorage.getItem("invoice"));
        }
    }
    handleInput = (e) => {
        this.setState({
            [e.target.name]: e.target.value
        });
    }
    onSubmitInvoice = async (e) => {
        var value;
        if (typeof (e) == "string") { value = e; }
        else {
            e.preventDefault();
            value = this.state.invoice;
        }
        Service.TrackInvoice(value).then((res) => {
            if (res.data.status === "success") {
                localStorage.setItem('invoice', res.data.TrackOrder.invoice)
                this.setState({ tracknow: false, TrackOrder: res.data.TrackOrder });
            } else {
                toast.error("Track Now", { position: toast.POSITION.TOP_RIGHT });
            }
        });
    }

    render() {
        const { status } = this.state.TrackOrder;
        return (
            <div>
                <Title isLoadingPage={this.state.isLoading} />
                <Header />
                <div className="banner banner2">
                    <div className="container">
                        <h2>Order Tracking</h2>
                    </div>
                </div>
                <div className="breadcrumb_dress">
                    <div className="container">
                        <ul>
                            <li><Link to={"/"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
                                <i>/</i></li>
                            <li>Order Tracking</li>
                        </ul>
                    </div>
                </div>
                <section className="w3l-contact py-5" id="contact">
                    <div className="container py-lg-5 py-4">
                        <div className="row contact-block">
                            <div className="col-md-12 mt-md-0 mt-5 ps-lg-0">
                                {this.state.tracknow ? (
                                    <form method="post" className="signin-form" onSubmit={this.onSubmitInvoice}>
                                        <p className="cont-para mb-sm-5 mb-4" style={{ textAlign: 'center' }}><b>To track your order please enter your Invoice Number in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</b></p>
                                        <div className="input-grids">
                                            <span><b>Invoice Number</b></span>
                                            <input type="text" className="contact-input" id="w3lName" name="invoice" placeholder="Your Invoice Number" onChange={this.handleInput} value={this.state.invoice} required="" />
                                        </div>
                                        <center>
                                            <button className="btn btn-style">TRACK NOW</button>
                                        </center>
                                    </form>
                                ) : (
                                    <div className="container px-1 px-md-4 py-5 mx-auto">
                                        <div className="card" style={{ zIndex: "0", backgroundColor: "#ECEFF1", paddingBottom: "20px", marginTop: "90px", marginBottom: "90px", borderRadius: "10px" }}>
                                            <div className="row justify-content-center" style={{ display: "contents" }}>
                                                <div className="col-12">
                                                    {status === 'processing' ? (
                                                        <ul id="progressbar" className="text-center" style={{ marginBottom: "30px", overflow: "hidden", color: "#455A64", paddingLeft: "0px", marginTop: "30px" }}>
                                                            <li className="active step0"></li>
                                                            <li className="step0"></li>
                                                            <li className="step0"></li>
                                                            <li className="step0"></li>
                                                        </ul>
                                                    ) : ("")}
                                                    {status === 'accepted' ? (
                                                        <ul id="progressbar" className="text-center" style={{ marginBottom: "30px", overflow: "hidden", color: "#455A64", paddingLeft: "0px", marginTop: "30px" }}>
                                                            <li className="active step0"></li>
                                                            <li className="active step0"></li>
                                                            <li className="step0"></li>
                                                            <li className="step0"></li>
                                                        </ul>
                                                    ) : ("")}
                                                    {status === 'ontheway' ? (
                                                        <ul id="progressbar" className="text-center" style={{ marginBottom: "30px", overflow: "hidden", color: "#455A64", paddingLeft: "0px", marginTop: "30px" }}>
                                                            <li className="active step0"></li>
                                                            <li className="active step0"></li>
                                                            <li className="active step0"></li>
                                                            <li className="step0"></li>
                                                        </ul>
                                                    ) : ("")}
                                                    {status === 'delivered' ? (
                                                        <ul id="progressbar" className="text-center" style={{ marginBottom: "30px", overflow: "hidden", color: "#455A64", paddingLeft: "0px", marginTop: "30px" }}>
                                                            <li className="active step0"></li>
                                                            <li className="active step0"></li>
                                                            <li className="active step0"></li>
                                                            <li className="active step0"></li>
                                                        </ul>
                                                    ) : ("")}
                                                </div>
                                            </div>
                                            <div className="row justify-content-between top" style={{ paddingTop: "40px", paddingLeft: "13%", paddingRight: "13%" }}>
                                                <div className="row icon-content" style={{ display: "contents" }}>
                                                    <img className="icon" src="https://i.imgur.com/9nnc9Et.png" alt="OrderProcessed" />
                                                    <div className="flex-column" style={{ display: "contents" }}>
                                                        <p className="font-weight-bold">Order<br />Processed</p>
                                                    </div>
                                                </div>
                                                <div className="row icon-content" style={{ display: "contents" }}>
                                                    <img className="icon" src="https://i.imgur.com/u1AzR7w.png" alt="OrderShipped" />
                                                    <div className="flex-column" style={{ display: "contents" }}>
                                                        <p className="font-weight-bold">Order<br />Shipped</p>
                                                    </div>
                                                </div>
                                                <div className="row icon-content" style={{ display: "contents" }}>
                                                    <img className="icon" src="https://i.imgur.com/TkPm63y.png" alt="OrderEnRoute" />
                                                    <div className="flex-column" style={{ display: "contents" }}>
                                                        <p className="font-weight-bold">Order<br />En Route</p>
                                                    </div>
                                                </div>
                                                <div className="row icon-content" style={{ display: "contents" }}>
                                                    <img className="icon" src="https://i.imgur.com/HdsziHP.png" alt="OrderArrived" />
                                                    <div className="flex-column" style={{ display: "contents" }}>
                                                        <p className="font-weight-bold">Order<br />Arrived</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </section>
                <Newsletter />
                <Footer />
            </div>
        )
    }
}
export default OrderTracking;