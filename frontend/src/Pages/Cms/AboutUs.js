import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
class AboutUs extends Component {
    render() {
        return (
            <div>
                <Title />
                <Header />
                <div className="banner banner2">
                    <div className="container">
                        <h2>About Us</h2>
                    </div>
                </div>

                <div className="breadcrumb_dress">
                    <div className="container">
                        <ul>
                            <li><Link to={"/home"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
                                <i>/</i></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>

                <div className="about py-5">
                    <div className="container py-lg-5 py-4">
                        <div className="row w3ls_about_grids align-items-center">
                            <div className="col-md-6 w3ls_about_grid_left pe-lg-5">
                                <h3 className="mb-4 font-weight-bold">Best Offers & Best Deals In Our Mart!</h3>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                    anim id est laborum.</p>
                                <p className="mt-3">Sunt in culpa qui officia deserunt mollit
                                    anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla ariatur in reprehenderit.</p>
                                <a href="products1.html" className="btn btn-style mt-4">View Our Products</a>
                            </div>
                            <div className="col-md-6 w3ls_about_grid_right">
                                <img src="assets/images/about.jpg" alt="about" className="img-fluid radius-image" />
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

export default AboutUs;