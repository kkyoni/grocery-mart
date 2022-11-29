import React, { Component } from "react";
import { Link } from 'react-router-dom';
class Banner extends Component {
    render() {
        return (
            <div className="banner-bottom1">
                    <div className="row agileinfo_banner_bottom1_grids m-0">
                        <div className="col-md-7 agileinfo_banner_bottom1_grid_left">
                            <h3>Free Delivery<span>20% <i>Cashback</i></span></h3>
                            <Link to={"/home"} className="btn btn-style">Shop Now</Link>
                        </div>
                        <div className="col-md-5 agileinfo_banner_bottom1_grid_right d-flex align-items-center">
                            <h4>Organic Foods</h4>
                        </div>
                    </div>
                </div>
        )
    }
}

export default Banner;