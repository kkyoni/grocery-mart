import React, { Component } from "react";
import { Link } from 'react-router-dom';
class TopProducts extends Component {
    render() {
        return (
            <div className="new-products py-5">
                <div className="container py-md-5 py-4">
                    <h3>Top Products</h3>
                    <div className="row agileinfo_new_products_grids">
                        <div className="col-md-3 agileinfo_new_products_grid">
                            <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div className="hs-wrapper hs-wrapper1">
                                    <img src="assets/images/e1.png" alt="e1" className="img-fluid" />
                                    <img src="assets/images/ee1.png" alt="ee1" className="img-fluid" />
                                    <img src="assets/images/e1.png" alt="e1" className="img-fluid" />
                                    <img src="assets/images/ee1.png" alt="ee1" className="img-fluid" />
                                    <img src="assets/images/e1.png" alt="e1" className="img-fluid" />
                                    <div className="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <Link to={"#myModal13"} data-bs-toggle="modal" data-bs-target="#myModal13"><i
                                                    className="fas fa-eye"></i></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><Link to={"/home"}>ProV Pistachios</Link></h5>
                                <div className="simpleCart_shelfItem">
                                    <p><span>$520</span> <i className="item_price">$500</i></p>
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
                        <div className="col-md-3 agileinfo_new_products_grid">
                            <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div className="hs-wrapper hs-wrapper1">
                                    <img src="assets/images/e2.png" alt="e2" className="img-fluid" />
                                    <img src="assets/images/ee2.png" alt="ee2" className="img-fluid" />
                                    <img src="assets/images/e2.png" alt="e2" className="img-fluid" />
                                    <img src="assets/images/ee2.png" alt="ee2" className="img-fluid" />
                                    <img src="assets/images/e2.png" alt="e2" className="img-fluid" />
                                    <div className="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <Link to={"#myModal14"} data-bs-toggle="modal" data-bs-target="#myModal14"><i
                                                    className="fas fa-eye"></i></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><Link to={"/home"}>Himalayan Cashews</Link></h5>
                                <div className="simpleCart_shelfItem">
                                    <p><span>$380</span> <i className="item_price">$370</i></p>
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
                        <div className="col-md-3 agileinfo_new_products_grid">
                            <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div className="hs-wrapper hs-wrapper1">
                                    <img src="assets/images/e3.png" alt="e3" className="img-fluid" />
                                    <img src="assets/images/ee3.png" alt="ee3" className="img-fluid" />
                                    <img src="assets/images/e3.png" alt="e3" className="img-fluid" />
                                    <img src="assets/images/ee3.png" alt="ee3" className="img-fluid" />
                                    <img src="assets/images/e3.png" alt="e3" className="img-fluid" />
                                    <div className="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <Link to={"#myModal15"} data-bs-toggle="modal" data-bs-target="#myModal15"><i
                                                    className="fas fa-eye"></i></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><Link to={"/home"}>Kernels Walnuts</Link></h5>
                                <div className="simpleCart_shelfItem">
                                    <p><span>$150</span> <i className="item_price">$100</i></p>
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
                        <div className="col-md-3 agileinfo_new_products_grid">
                            <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div className="hs-wrapper hs-wrapper1">
                                    <img src="assets/images/e4.png" alt="e4" className="img-fluid" />
                                    <img src="assets/images/ee4.png" alt="ee4" className="img-fluid" />
                                    <img src="assets/images/e4.png" alt="e4" className="img-fluid" />
                                    <img src="assets/images/ee4.png" alt="ee4" className="img-fluid" />
                                    <img src="assets/images/e4.png" alt="e4" className="img-fluid" />
                                    <div className="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <Link to={"#myModal16"} data-bs-toggle="modal" data-bs-target="#myModal16"><i
                                                    className="fas fa-eye"></i></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><Link to={"/home"}>Himalayan Almonds</Link></h5>
                                <div className="simpleCart_shelfItem">
                                    <p><span>$280</span> <i className="item_price">$250</i></p>
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
                    <div className="row agileinfo_new_products_grids mt-5">
                        <div className="col-md-3 agileinfo_new_products_grid">
                            <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div className="hs-wrapper hs-wrapper1">
                                    <img src="assets/images/f1.png" alt="f1" className="img-fluid" />
                                    <img src="assets/images/f11.png" alt="f11" className="img-fluid" />
                                    <img src="assets/images/f1.png" alt="f1" className="img-fluid" />
                                    <img src="assets/images/f11.png" alt="f11" className="img-fluid" />
                                    <img src="assets/images/f1.png" alt="f1" className="img-fluid" />
                                    <div className="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <Link to={"#myModal29"} data-bs-toggle="modal" data-bs-target="#myModal29"><i
                                                    className="fas fa-eye"></i></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><Link to={"/home"}>Yellow Arhar Dal</Link></h5>
                                <div className="simpleCart_shelfItem">
                                    <p><span>$40</span> <i className="item_price">$30</i></p>
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
                        <div className="col-md-3 agileinfo_new_products_grid">
                            <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div className="hs-wrapper hs-wrapper1">
                                    <img src="assets/images/f2.png" alt="f2" className="img-fluid" />
                                    <img src="assets/images/f22.png" alt="f22" className="img-fluid" />
                                    <img src="assets/images/f2.png" alt="f2" className="img-fluid" />
                                    <img src="assets/images/f22.png" alt="f22" className="img-fluid" />
                                    <img src="assets/images/f2.png" alt="f2" className="img-fluid" />
                                    <div className="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <Link to={"#myModal30"} data-bs-toggle="modal" data-bs-target="#myModal30"><i
                                                    className="fas fa-eye"></i></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><Link to={"/home"}>Tata Sampann Poha</Link></h5>
                                <div className="simpleCart_shelfItem">
                                    <p><span>$280</span> <i className="item_price">$170</i></p>
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
                        <div className="col-md-3 agileinfo_new_products_grid">
                            <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div className="hs-wrapper hs-wrapper1">
                                    <img src="assets/images/f3.png" alt="f3" className="img-fluid" />
                                    <img src="assets/images/f33.png" alt="f33" className="img-fluid" />
                                    <img src="assets/images/f3.png" alt="f3" className="img-fluid" />
                                    <img src="assets/images/f33.png" alt="f33" className="img-fluid" />
                                    <img src="assets/images/f3.png" alt="f3" className="img-fluid" />
                                    <div className="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <Link to={"#myModal31"} data-bs-toggle="modal" data-bs-target="#myModal31"><i
                                                    className="fas fa-eye"></i></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><Link to={"/home"}>Lay's Onion Chips</Link></h5>
                                <div className="simpleCart_shelfItem">
                                    <p><span>$20</span> <i className="item_price">$10</i></p>
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
                        <div className="col-md-3 agileinfo_new_products_grid">
                            <div className="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                                <div className="hs-wrapper hs-wrapper1">
                                    <img src="assets/images/f4.png" alt="f4" className="img-fluid" />
                                    <img src="assets/images/f44.png" alt="f44" className="img-fluid" />
                                    <img src="assets/images/f4.png" alt="f4" className="img-fluid" />
                                    <img src="assets/images/f44.png" alt="f44" className="img-fluid" />
                                    <img src="assets/images/f4.png" alt="f4" className="img-fluid" />
                                    <div className="w3_hs_bottom w3_hs_bottom_sub">
                                        <ul>
                                            <li>
                                                <Link to={"#myModal32"} data-bs-toggle="modal" data-bs-target="#myModal32"><i
                                                    className="fas fa-eye"></i></Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><Link to={"/home"}>Cadbury Dairy Milk</Link></h5>
                                <div className="simpleCart_shelfItem">
                                    <p><span>$300</span> <i className="item_price">$200</i></p>
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
        )
    }
}

export default TopProducts;