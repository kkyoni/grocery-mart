import React, { Component } from "react";
class SpecialDeals extends Component {
    render() {
        return (
            <div className="special-deals py-5">
                <div className="container py-md-5 py-4">
                    <h2>Special Deals</h2>
                    <div className="row w3agile_special_deals_grids">
                        <div className="col-md-7 w3agile_special_deals_grid_left">
                            <div className="w3agile_special_deals_grid_left_grid">
                                <img src="assets/images/bgs3.jpg" alt="bgs3" className="img-fluid" />
                                <div className="w3agile_special_deals_grid_left_grid_pos1">
                                    <h5>30%<span>Off/-</span></h5>
                                </div>
                                <div className="w3agile_special_deals_grid_left_grid_pos">
                                    <h4>We Offer <span>Best Products</span></h4>
                                </div>
                            </div>
                            <div className="w3agile_special_deals_grid_left_grid">
                                <img src="assets/images/bgs5.jpg" alt="bgs5" className="img-fluid" />
                                <div className="w3agile_special_deals_grid_left_grid_pos">
                                    <h4>Best Store
                                        <span>For GROCERIES</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-5 w3agile_special_deals_grid_right">
                            <img src="assets/images/bgs4.jpg" alt="bgs4" className="img-fluid" />
                            <div className="w3agile_special_deals_grid_right_pos text-end">
                                <h4>Big <span>Deals</span></h4>
                                <h5>save up <span>to</span> 30%</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default SpecialDeals;