import React, { Component } from "react";
class Partners extends Component {
    render() {
        return (
            <section className="top-brands w3l-partners py-5" id="partners">
                <div className="container py-4">
                    <h3>Top Brands</h3>
                    <div className="row align-items-center">
                        <div className="owl-three owl-carousel owl-theme logo-view">
                            <div className="item">
                                <img src="assets/images/tb1.png" alt="company-logo" className="img-fluid" />
                            </div>
                            <div className="item">
                                <img src="assets/images/tb2.png" alt="company-logo" className="img-fluid" />
                            </div>
                            <div className="item">
                                <img src="assets/images/tb3.png" alt="company-logo" className="img-fluid" />
                            </div>
                            <div className="item">
                                <img src="assets/images/tb4.png" alt="company-logo" className="img-fluid" />
                            </div>
                            <div className="item">
                                <img src="assets/images/tb5.png" alt="company-logo" className="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}

export default Partners;