import React, { Component } from "react";
import { Link } from 'react-router-dom';
class Footer extends Component {
    render() {
        return (
            <div className="footer pt-5">
                <div className="container py-4">
                    <div className="row w3_footer_grids">
                        <div className="col-md-3 w3_footer_grid">
                            <h3>Contact</h3>
                            <ul className="address">
                                <li><i className="fas fa-map-marker-alt"></i>London, 235 Terry, 10001</li>
                                <li><i className="fas fa-envelope-open-text"></i><Link to={"/home"}>info@example.com</Link></li>
                                <li> <Link to={"/home"}><i className="fas fa-phone-alt"></i>++44-000-888-999</Link></li>
                            </ul>
                        </div>
                        <div className="col-md-3 w3_footer_grid">
                            <h3>Information</h3>
                            <ul className="info">
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>About Us</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Contact Us</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Shortcodes</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>FAQ's</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Special Products</Link></li>
                            </ul>
                        </div>
                        <div className="col-md-3 w3_footer_grid">
                            <h3>Category</h3>
                            <ul className="info">
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Fruits & Vegetables</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Meats & Seafood</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Bakery & Pastry</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Beverages</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Breakfast & Dairy</Link></li>
                            </ul>
                        </div>
                        <div className="col-md-3 w3_footer_grid">
                            <h3>Profile</h3>
                            <ul className="info">
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Home</Link></li>
                                <li><Link to={"/home"}><i className="fas fa-angle-right"></i>Today's Deals</Link></li>
                            </ul>
                            <h4>Follow Us</h4>
                            <div className="agileits_social_button">
                                <ul>
                                    <li><Link to={"#facebook"} className="facebook"><i className="fab fa-facebook-f"></i> </Link></li>
                                    <li><Link to={"#twitter"} className="twitter"><i className="fab fa-twitter"></i> </Link></li>
                                    <li><Link to={"#google"} className="google"><i className="fab fa-google-plus-g"></i> </Link></li>
                                    <li><Link to={"#pinterest"} className="pinterest"><i className="fab fa-pinterest-p"></i> </Link></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="footer-copy mt-4">
                    <div className="container">
                        <p className="copy-text">&copy; 2021 Grocery Mart. All rights reserved. Design by <Link to={"/home"} target="_blank">Ecommerce</Link>
                        </p>
                    </div>
                </div>
            </div>
        )
    }
}

export default Footer;