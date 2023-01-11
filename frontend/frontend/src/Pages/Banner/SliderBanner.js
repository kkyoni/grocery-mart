import React, { Component } from "react";
import { Link } from 'react-router-dom';
class SliderBanner extends Component {
    render() {
        return (
            <section id="home" className="w3l-banner py-5">
                <div className="banner-content">
                    <div className="container pt-sm-5 pb-md-4">
                        <div className="row align-items-center py-4">
                            <div className="col-md-6">
                                <p className="banner-sub mb-1">Start your daily online shopping!</p>
                                <h3 className="mb-md-5 mb-4 title">Stay home & we will deliver your daily need's
                                </h3>
                                <div className="d-flex align-items-center buttons-banner mt-sm-5 mt-4">
                                    <Link to={"/home"} className="btn btn-style">Shop Now</Link>
                                </div>
                            </div>
                            <div className="col-md-6 right-banner-2 position-relative p-md-0 mt-sm-0 mt-4">
                                <div className="sub-banner-image mx-auto">
                                    <img src="assets/images/banner-img.png" className="img-fluid position-relative" alt="banner-img" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}
export default SliderBanner;