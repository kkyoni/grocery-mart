import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Iframe from 'react-iframe'
class Categories extends Component {
    render() {
        return (
            <div>
                <div className="banner-bottom py-5">
                    <div className="container py-lg-5 py-4">
                        <div className="row align-items-center">
                            <div className="col-lg-5 wthree_banner_bottom_left">
                                <div className="position-relative">
                                    <img src="assets/images/image1.jpg" alt="image1" className="img-fluid radius-image" />
                                    <a href="#small-dialog" className="popup-with-zoom-anim play-view text-center position-absolute">
                                        <span className="video-play-icon">
                                            <span className="fa fa-play"></span>
                                        </span>
                                    </a>
                                    <div id="small-dialog" className="zoom-anim-dialog mfp-hide">
                                        <Iframe src="https://player.vimeo.com/video/106183791?h=b24e6f79f8"
                                            allow="fullscreen" allowfullscreen="" />
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-7 wthree_banner_bottom_right">
                                <ul className="nav nav-tabs" id="myTab" role="tablist">
                                    <li className="nav-item" role="presentation">
                                        <button className="nav-link active" id="vegetables-tab" data-bs-toggle="tab"
                                            data-bs-target="#vegetables" type="button" role="tab" aria-controls="vegetables"
                                            aria-selected="true">Vegetables</button>
                                    </li>
                                    <li className="nav-item" role="presentation">
                                        <button className="nav-link" id="meats-tab" data-bs-toggle="tab" data-bs-target="#meats"
                                            type="button" role="tab" aria-controls="meats" aria-selected="false">Meats &
                                            Seafood</button>
                                    </li>
                                    <li className="nav-item" role="presentation">
                                        <button className="nav-link" id="bakeryt-tab" data-bs-toggle="tab" data-bs-target="#bakery"
                                            type="button" role="tab" aria-controls="bakery" aria-selected="false">Bakery</button>
                                    </li>
                                    <li className="nav-item" role="presentation">
                                        <button className="nav-link" id="beverages-tab" data-bs-toggle="tab" data-bs-target="#beverages"
                                            type="button" role="tab" aria-controls="beverages"
                                            aria-selected="false">Beverages</button>
                                    </li>
                                </ul>
                                <div className="tab-content" id="myTabContent">
                                    <div className="tab-pane fade show active" id="vegetables" role="tabpanel"
                                        aria-labelledby="vegetables-tab">
                                        <div className="row agile_ecommerce_tabs">
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/a1.png" alt="a1" className="img-fluid" />
                                                    <img src="assets/images/a1.png" alt="a1" className="img-fluid" />
                                                    <img src="assets/images/a1.png" alt="a1" className="img-fluid" />
                                                    <img src="assets/images/a1.png" alt="a1" className="img-fluid" />
                                                    <img src="assets/images/a1.png" alt="a1" className="img-fluid" />
                                                    <img src="assets/images/a1.png" alt="a1" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#modal"} data-bs-toggle="modal" data-bs-target="#myModal"><i
                                                                    className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Ladies Finger 500g</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 380</span> <i className="item_price">₹ 350</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Ladies Finger 500g" />
                                                        <input type="hidden" name="amount" value="350.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/a2.png" alt="a2" className="img-fluid" />
                                                    <img src="assets/images/a2.png" alt="a2" className="img-fluid" />
                                                    <img src="assets/images/a2.png" alt="a2" className="img-fluid" />
                                                    <img src="assets/images/a2.png" alt="a2" className="img-fluid" />
                                                    <img src="assets/images/a2.png" alt="a2" className="img-fluid" />
                                                    <img src="assets/images/a2.png" alt="a2" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal1"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal1"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Brinjal long 500g</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 330</span> <i className="item_price">₹ 302</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Brinjal long 500g" />
                                                        <input type="hidden" name="amount" value="302.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/a3.png" alt="a3" className="img-fluid" />
                                                    <img src="assets/images/a3.png" alt="a3" className="img-fluid" />
                                                    <img src="assets/images/a3.png" alt="a3" className="img-fluid" />
                                                    <img src="assets/images/a3.png" alt="a3" className="img-fluid" />
                                                    <img src="assets/images/a3.png" alt="a3" className="img-fluid" />
                                                    <img src="assets/images/a3.png" alt="a3" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal2"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal2"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Palak 250g</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 250</span> <i className="item_price">₹ 245</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Palak 250g" />
                                                        <input type="hidden" name="amount" value="245.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="tab-pane fade" id="meats" role="tabpanel" aria-labelledby="meats-tab">
                                        <div className="row agile_ecommerce_tabs">
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/b1.png" alt="b1" className="img-fluid" />
                                                    <img src="assets/images/b1.png" alt="b1" className="img-fluid" />
                                                    <img src="assets/images/b1.png" alt="b1" className="img-fluid" />
                                                    <img src="assets/images/b1.png" alt="b1" className="img-fluid" />
                                                    <img src="assets/images/b1.png" alt="b1" className="img-fluid" />
                                                    <img src="assets/images/b1.png" alt="b1" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal3"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal3"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Prawns (Big)</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 320</span> <i className="item_price">₹ 250</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Prawns (Big)" />
                                                        <input type="hidden" name="amount" value="250.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/b2.png" alt="b2" className="img-fluid" />
                                                    <img src="assets/images/b2.png" alt="b2" className="img-fluid" />
                                                    <img src="assets/images/b2.png" alt="b2" className="img-fluid" />
                                                    <img src="assets/images/b2.png" alt="b2" className="img-fluid" />
                                                    <img src="assets/images/b2.png" alt="b2" className="img-fluid" />
                                                    <img src="assets/images/b1.png" alt="b2" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal4"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal4"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Silver Belly Fish</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 180</span> <i className="item_price">₹ 150</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Silver Belly Fish" />
                                                        <input type="hidden" name="amount" value="150.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/b3.png" alt="b3" className="img-fluid" />
                                                    <img src="assets/images/b3.png" alt="b3" className="img-fluid" />
                                                    <img src="assets/images/b3.png" alt="b3" className="img-fluid" />
                                                    <img src="assets/images/b3.png" alt="b3" className="img-fluid" />
                                                    <img src="assets/images/b3.png" alt="b3" className="img-fluid" />
                                                    <img src="assets/images/b3.png" alt="b3" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal5"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal5"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Prawns Meat (Small)</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 220</span> <i className="item_price">₹ 180</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Prawns Meat" />
                                                        <input type="hidden" name="amount" value="180.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="tab-pane fade" id="bakery" role="tabpanel" aria-labelledby="bakery-tab">
                                        <div className="row agile_ecommerce_tabs">
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/c1.png" alt="c1" className="img-fluid" />
                                                    <img src="assets/images/c1.png" alt="c1" className="img-fluid" />
                                                    <img src="assets/images/c1.png" alt="c1" className="img-fluid" />
                                                    <img src="assets/images/c1.png" alt="c1" className="img-fluid" />
                                                    <img src="assets/images/c1.png" alt="c1" className="img-fluid" />
                                                    <img src="assets/images/c1.png" alt="c1" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal6"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal6"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Pista Soan Papdi</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 880</span> <i className="item_price">₹ 850</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Pista Soan Papdi" />
                                                        <input type="hidden" name="amount" value="850.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/c2.png" alt="c2" className="img-fluid" />
                                                    <img src="assets/images/c2.png" alt="c2" className="img-fluid" />
                                                    <img src="assets/images/c2.png" alt="c2" className="img-fluid" />
                                                    <img src="assets/images/c2.png" alt="c2" className="img-fluid" />
                                                    <img src="assets/images/c2.png" alt="c2" className="img-fluid" />
                                                    <img src="assets/images/c2.png" alt="c2" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal7"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal7"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>KARACHI Halwa Box</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 290</span> <i className="item_price">₹ 280</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="KARACHI Halwa Box" />
                                                        <input type="hidden" name="amount" value="280.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/c3.png" alt="c3" className="img-fluid" />
                                                    <img src="assets/images/c3.png" alt="c3" className="img-fluid" />
                                                    <img src="assets/images/c3.png" alt="c3" className="img-fluid" />
                                                    <img src="assets/images/c3.png" alt="c3" className="img-fluid" />
                                                    <img src="assets/images/c3.png" alt="c3" className="img-fluid" />
                                                    <img src="assets/images/c3.png" alt="c3" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal8"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal8"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>KARACHI Fruit Cookies</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 120</span> <i className="item_price">₹ 80</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Fruit Cookies" />
                                                        <input type="hidden" name="amount" value="80.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="tab-pane fade" id="beverages" role="tabpanel" aria-labelledby="beverages-tab">
                                        <div className="row agile_ecommerce_tabs">
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/d1.png" alt="d1" className="img-fluid" />
                                                    <img src="assets/images/d1.png" alt="d1" className="img-fluid" />
                                                    <img src="assets/images/d1.png" alt="d1" className="img-fluid" />
                                                    <img src="assets/images/d1.png" alt="d1" className="img-fluid" />
                                                    <img src="assets/images/d1.png" alt="d1" className="img-fluid" />
                                                    <img src="assets/images/d1.png" alt="d1" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal9"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal9"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Thums Up Soft drink</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 950</span> <i className="item_price">₹ 90</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Thums Up" />
                                                        <input type="hidden" name="amount" value="820.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/d2.png" alt="d2" className="img-fluid" />
                                                    <img src="assets/images/d2.png" alt="d2" className="img-fluid" />
                                                    <img src="assets/images/d2.png" alt="d2" className="img-fluid" />
                                                    <img src="assets/images/d2.png" alt="d2" className="img-fluid" />
                                                    <img src="assets/images/d2.png" alt="d2" className="img-fluid" />
                                                    <img src="assets/images/d2.png" alt="d2" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal10"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal10"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Coca-Cola Can</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 700</span> <i className="item_price">₹ 80</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Coca-Cola Can" />
                                                        <input type="hidden" name="amount" value="680.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div className="col-md-4 agile_ecommerce_tab_left">
                                                <div className="hs-wrapper">
                                                    <img src="assets/images/d3.png" alt="d3" className="img-fluid" />
                                                    <img src="assets/images/d3.png" alt="d3" className="img-fluid" />
                                                    <img src="assets/images/d3.png" alt="d3" className="img-fluid" />
                                                    <img src="assets/images/d3.png" alt="d3" className="img-fluid" />
                                                    <img src="assets/images/d3.png" alt="d3" className="img-fluid" />
                                                    <img src="assets/images/d3.png" alt="d3" className="img-fluid" />
                                                    <div className="w3_hs_bottom">
                                                        <ul>
                                                            <li>
                                                                <Link to={"#myModal11"} data-bs-toggle="modal"
                                                                    data-bs-target="#myModal11"><i className="fas fa-eye"></i></Link>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h5><Link to={"/home"}>Fanta PET Bottle</Link></h5>
                                                <div className="simpleCart_shelfItem">
                                                    <p><span>₹ 520</span> <i className="item_price">₹ 50</i></p>
                                                    <form action="#" method="post">
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="w3ls_item" value="Fanta PET Bottle" />
                                                        <input type="hidden" name="amount" value="510.00" />
                                                        <button type="submit" className="w3ls-cart">Add to cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal" tabIndex={-1} aria-labelledby="myModal" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/a1.png" alt="a1" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Ladies Finger 500g</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                        dolore eu fugiat nulla pariatur. </p>
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
                                            <img src="assets/images/star.png" alt="star-" className="img-fluid" />
                                        </div>
                                        <div className="rating-left">
                                            <img src="assets/images/star.png" alt="star-" className="img-fluid" />
                                        </div>
                                        <div className="clearfix"> </div>
                                    </div>
                                    <div className="modal_body_right_cart simpleCart_shelfItem">
                                        <p><span>₹ 380</span> <i className="item_price">₹ 350</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Ladies Finger" />
                                            <input type="hidden" name="amount" value="350.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal1" tabIndex={-1} aria-labelledby="myModal1" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/a2.png" alt="a2" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Brinjal long 500g</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                            <img src="assets/images/star.png" alt="star-" className="img-fluid" />
                                        </div>
                                        <div className="rating-left">
                                            <img src="assets/images/star.png" alt="star-" className="img-fluid" />
                                        </div>
                                        <div className="clearfix"> </div>
                                    </div>
                                    <div className="modal_body_right_cart simpleCart_shelfItem">
                                        <p><span>₹ 330</span> <i className="item_price">₹ 302</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Brinjal long" />
                                            <input type="hidden" name="amount" value="302.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal2" tabIndex={-1} aria-labelledby="myModal2" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/a3.png" alt="a3" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Palak 250g</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                        ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur
                                        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
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
                                            <img src="assets/images/star-.png" alt="star-" className="img-fluid" />
                                        </div>
                                        <div className="rating-left">
                                            <img src="assets/images/star.png" alt="star" className="img-fluid" />
                                        </div>
                                        <div className="clearfix"> </div>
                                    </div>
                                    <div className="modal_body_right_cart simpleCart_shelfItem">
                                        <p><span>₹ 250</span> <i className="item_price">₹ 245</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Palak 250g" />
                                            <input type="hidden" name="amount" value="245.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal3" tabIndex={-1} aria-labelledby="myModal3" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/b1.png" alt="b1" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Prawns (Big)</h4>
                                    <p>Duis aute irure dolor inreprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                        in culpa
                                        qui officia deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 320</span> <i className="item_price">₹ 250</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Prawns (Big)" />
                                            <input type="hidden" name="amount" value="250.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal4" tabIndex={-1} aria-labelledby="myModal4" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/b2.png" alt="b2" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Silver Belly Fish</h4>
                                    <p>Excepteur sint occaecat laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit
                                        esse cillum
                                        dolore
                                        eu fugiat nulla pariatur cupidatat non proident, sunt in culpa qui officia
                                        deserunt
                                        mollit anim id est laborum.</p>
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
                                        <p><span>₹ 180</span> <i className="item_price">₹ 150</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Silver Belly Fish" />
                                            <input type="hidden" name="amount" value="150.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal5" tabIndex={-1} aria-labelledby="myModal5" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/b3.png" alt="b3" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Prawns Meat (Small)</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit
                                        esse cillum
                                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                        est laborum.
                                    </p>
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
                                        <p><span>₹ 220</span> <i className="item_price">₹ 180</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Prawns Meat" />
                                            <input type="hidden" name="amount" value="180.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal6" tabIndex={-1} aria-labelledby="myModal6" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/c1.png" alt="c1" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Pista Soan Papdi</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 880</span> <i className="item_price">₹ 850</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Pista Soan Papdi" />
                                            <input type="hidden" name="amount" value="850.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal7" tabIndex={-1} aria-labelledby="myModal7" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/c2.png" alt="c2" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>KARACHI Halwa Box</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 290</span> <i className="item_price">₹ 280</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="KARACHI Halwa Box" />
                                            <input type="hidden" name="amount" value="280.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal8" tabIndex={-1} aria-labelledby="myModal8" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/c3.png" alt="c3" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>KARACHI Fruit Cookies</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 120</span> <i className="item_price">₹ 80</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Fruit Cookies" />
                                            <input type="hidden" name="amount" value="80.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal9" tabIndex={-1} aria-labelledby="myModal9" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/d1.png" alt="d1" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Thums Up Soft drink</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 950</span> <i className="item_price">₹ 90</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Thums Upk" />
                                            <input type="hidden" name="amount" value="90.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal10" tabIndex={-1} aria-labelledby="myModal10" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/d2.png" alt="d2" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Coca-Cola Can</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 700</span> <i className="item_price">₹ 80</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Coca-Cola Can" />
                                            <input type="hidden" name="amount" value="80.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal11" tabIndex={-1} aria-labelledby="myModal11" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/d3.png" alt="d3" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Fanta PET Bottle</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 520</span> <i className="item_price">₹ 50</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Fanta PET Bottle" />
                                            <input type="hidden" name="amount" value="50.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModal13" tabIndex={-1} aria-labelledby="myModal13" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/e1.png" alt="e1" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>ProV Pistachios</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 520</span> <i className="item_price">₹ 500</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="ProV Pistachios" />
                                            <input type="hidden" name="amount" value="500.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="modal fade" id="myModal14" tabIndex={-1} aria-labelledby="myModal14" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/e2.png" alt="e2" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Himalayan Cashews</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 380</span> <i className="item_price">₹ 370</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Himalayan Cashews" />
                                            <input type="hidden" name="amount" value="370.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="modal fade" id="myModal15" tabIndex={-1} aria-labelledby="myModal15" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/e3.png" alt="e3" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Kernels Walnuts</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 150</span> <i className="item_price">₹ 100</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Kernels Walnuts" />
                                            <input type="hidden" name="amount" value="100.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="modal fade" id="myModal16" tabIndex={-1} aria-labelledby="myModal16" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/e4.png" alt="e4" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Himalayan Almonds</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 280</span> <i className="item_price">₹ 250</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Himalayan Almonds" />
                                            <input type="hidden" name="amount" value="250.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="modal fade" id="myModal29" tabIndex={-1} aria-labelledby="myModal29" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/f1.png" alt="f1" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Yellow Arhar Dal</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 40</span> <i className="item_price">₹ 30</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Yellow Arhar Dal" />
                                            <input type="hidden" name="amount" value="30.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="modal fade" id="myModal30" tabIndex={-1} aria-labelledby="myModal30" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/f2.png" alt="f2" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Tata Sampann Poha</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 280</span> <i className="item_price">₹ 170</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Tata Sampann Poha" />
                                            <input type="hidden" name="amount" value="170.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="modal fade" id="myModal31" tabIndex={-1} aria-labelledby="myModal31" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/f3.png" alt="f3" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Lay's Onion Chips</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 20</span> <i className="item_price">₹ 10</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Lay's Onion Chips" />
                                            <input type="hidden" name="amount" value="10.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="modal fade" id="myModal32" tabIndex={-1} aria-labelledby="myModal32" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="col-md-5 modal_body_left">
                                    <img src="assets/images/f4.png" alt="f4" className="img-fluid" />
                                </div>
                                <div className="col-md-7 modal_body_right">
                                    <h4>Cadbury Dairy Milk</h4>
                                    <p>Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore
                                        eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum.</p>
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
                                        <p><span>₹ 300</span> <i className="item_price">₹ 200</i></p>
                                        <form action="#" method="post">
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls_item" value="Cadbury Dairy Milk" />
                                            <input type="hidden" name="amount" value="200.00" />
                                            <button type="submit" className="w3ls-cart">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Categories;