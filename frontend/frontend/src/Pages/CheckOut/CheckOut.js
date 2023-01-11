import React, { Component } from "react";
import { Link, Redirect } from "react-router-dom";
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import "./checkout.css";
import swal from "sweetalert";
import axios from "axios";
import { toast } from 'react-toastify';
class CheckOut extends Component {
  constructor(props) {
    super(props);
    this.state = {
      product_cart: {},
      newTotal: 0.00,
      isLoading: true,
      photo: "http://127.0.0.1:8000/storage/product/",
      cod: false,
      codLoading: false,
      codcash: false,
      promocode: '',
      maintotal: '',
      promototal: 0.00,
      user_id: '',
      address_id: '',
      promo_id: '',
      comments: "",
      purchase: false,
      purchasepayment: '',
    };
    this.handleCartItems = this.handleCartItems.bind(this);
  }
  componentDidMount() {
    this.setState({
      isLoading: true,
    });
    setTimeout(() => {
      this.setState({ isLoading: false });
    }, 1000);
    const login = JSON.parse(localStorage.getItem("userData"));
    this.setState({ user_id: login.id, address_id: login.address_id });
    const CurrentproductDetails = localStorage.getItem("product_details");
    let newTotal = 0.00;
    let maintotal = 0.00;
    if (JSON.parse(CurrentproductDetails) && JSON.parse(CurrentproductDetails).length > 0) {
      JSON.parse(CurrentproductDetails).forEach((el) => {
        newTotal += Number(el.price);
        maintotal += Number(el.price);
      });
      this.setState({ product_cart: JSON.parse(CurrentproductDetails), newTotal: Number.parseFloat(newTotal).toFixed(2), maintotal: Number.parseFloat(maintotal).toFixed(2) });
    }
  }
  viewProducts(id) {
    this.props.history.push(`/single-products/${id}`);
  }
  handleInput = (e) => {
    this.setState({
      [e.target.name]: e.target.value,
    });
  };
  SaveCheckOutCOD = async (e) => {
    this.setState({ codLoading: true })
    e.preventDefault();
    const res = await axios.post(
      "http://127.0.0.1:8000/api/checkoutsavecod",
      this.state
    );
    if (res.data.status === "success") {
      this.setState({
        product_cart: {},
        codLoading: false,
        newTotal: 0.00,
        comments: "",
        promo_id: '',
        promocode: '',
        cod: false,
        codcash: false,
        purchase: true,
        purchasepayment: true
      });
      localStorage.removeItem("product_details");
      toast.success("COD Payment SuccessFully...", { position: toast.POSITION.TOP_RIGHT });
    } else {
      toast.error("COD Payment Not SuccessFully...", { position: toast.POSITION.TOP_RIGHT });
      this.setState({
        purchase: true,
        purchasepayment: false
      });
    }
  };
  SaveCheckOutPay = async (e) => {
    alert("Pay")
  }
  SaveCheckOutPaypal = async (e) => {
    alert("PayPal")
  }
  handleRemoveCart = (item) => {
    let newTotal = 0.00;
    let productDetails = localStorage.getItem("product_details");
    let CurrentproductDetails = JSON.parse(productDetails).filter(product => product.id !== item);
    if (CurrentproductDetails && CurrentproductDetails.length > 0) {
      CurrentproductDetails.forEach((el) => {
        newTotal += Number(el.price);
      });
      localStorage.setItem("product_details", JSON.stringify(CurrentproductDetails));
      this.setState({ product_cart: CurrentproductDetails, newTotal: Number.parseFloat(newTotal).toFixed(2) });
    } else {
      localStorage.removeItem("product_details");
      this.setState({ product_cart: [], newTotal: 0.00, cod: false, codcash: false });
    }
    swal({
      title: "Success!",
      text: "Cart Item Delete Successfully",
      icon: "success",
      button: "Ok!",
    });
  };
  handleCodeCash = (item) => {
    if (this.state.product_cart.length > 0) {
      if (item === true) {
        this.setState({ cod: false, codcash: false });
      } else {
        this.setState({ cod: true, codcash: true });
      }
    } else {
      this.setState({ cod: false, codcash: false });
      toast.error("Your shopping cart is empty...", { position: toast.POSITION.TOP_RIGHT });
    }
  };
  handleCartItems(operator, id) {
    let AllProducts = JSON.parse(localStorage.getItem('product_details'));
    let currentProduct = AllProducts.filter(x => x.id === id);
    let index = AllProducts.findIndex(x => x.id === id);
    let quantity = currentProduct[0].qty;
    let price = Number(currentProduct[0].price);
    let main_price = Number(currentProduct[0].main_price);
    if (operator === 'plus') {
      quantity = quantity + 1;
      price = price + main_price;
    } else if (operator === 'minus') {
      quantity = quantity - 1;
      price = price - main_price;
    }
    currentProduct[0].qty = quantity;
    currentProduct[0].price = Number.parseFloat(price).toFixed(2);
    AllProducts[index] = currentProduct[0];
    this.setState({ product_cart: AllProducts });
    localStorage.setItem('product_details', JSON.stringify(AllProducts));
    const CurrentproductDetails = localStorage.getItem("product_details");
    let newTotal = 0.00;
    if (JSON.parse(CurrentproductDetails) && JSON.parse(CurrentproductDetails).length > 0) {
      JSON.parse(CurrentproductDetails).forEach((el) => {
        newTotal += Number(el.price);
      });
      this.setState({ newTotal: Number.parseFloat(newTotal).toFixed(2) });
    }

  }
  CartPlus(id) { this.handleCartItems('plus', id); }
  CartMinus(id) { this.handleCartItems('minus', id); }

  ApplyPromoCode = async (e) => {
    e.preventDefault();
    const res = await axios.post(
      "http://127.0.0.1:8000/api/promocode",
      this.state
    );
    if (res.data.status === "success") {
      toast.success(res.data.message, { position: toast.POSITION.TOP_RIGHT });
      this.setState({ newTotal: Number.parseFloat(res.data.DisCount).toFixed(2), promo_id: res.data.promo_id, promototal: Number.parseFloat(res.data.promototal) });
    } else {
      toast.error(res.data.message, { position: toast.POSITION.TOP_RIGHT });
    }
  }
  render() {
    const login = JSON.parse(localStorage.getItem("userData"));
    if (!login) {
      return <Redirect to={'/home'} />;
    }
    const cod = this.state.cod;
    var Cart_HTMLTABLE = "";
    if (this.state.product_cart && this.state.product_cart.length > 0) {
      Cart_HTMLTABLE = this.state.product_cart.map((item, index) => {
        const { name, description, id, qty, productimage, price } = item;
        return (
          <tr key={index}>
            <td>
              <Link onClick={() => this.viewProducts(id)}>
                <img src={this.state.photo + productimage[0].image} alt={productimage[0].image} className="img-fluid" />
              </Link>
            </td>
            <td>
              {name}
              <p
                className="m-0 text-white"
                style={{ fontSize: ".75rem", lineHeight: "1.5" }}
              >
                {description.substring(0, 68)}...
              </p>
            </td>
            <td className="text-white">
              <button className="cartplus-btn" type="button" name="button" onClick={() => this.CartPlus(id)} style={{ width: "23px", height: "23px", borderRadius: "0px", textAlign: "center" }}>
                <img src="https://designmodo.com/demo/shopping-cart/plus.svg" alt="plus" />
              </button>
              <input type="text" name="name" value={qty} disabled style={{ width: "23px", height: "22.5px", backgroundColor: "#FFF", borderStyle: "none", textAlign: "center" }} />
              <button className="cartminus-btn" type="button" name="button" onClick={() => this.CartMinus(id)} disabled={qty <= 1} style={{ width: "23px", height: "23px", borderRadius: "0px" }}>
                <img src="https://designmodo.com/demo/shopping-cart/minus.svg" alt="minus" />
              </button>
            </td>
            <td className="text-white">₹{price}</td>
            <td style={{ textAlign: "center" }}>
              <span
                className="badge badge-primary badge-pill"
                onClick={() => this.handleRemoveCart(id)}
              >
                <i className="fa fa-close"></i>
              </span>
            </td>
          </tr>
        );
      });
    } else {
      Cart_HTMLTABLE = (
        <tr>
          <td colspan="5" style={{ textAlign: "center" }}>
            <strong>Your shopping cart is empty ...</strong>
          </td>
        </tr>
      );
    }
    return (
      <div>
        <Title />
        <Header isLoading={this.state.isLoading} />
        <div className="banner banner2">
          <div className="container">
            <h2>CheckOut</h2>
          </div>
        </div>
        <div className="breadcrumb_dress">
          <div className="container">
            <ul>
              <li>
                <Link to={"/home"}>
                  <span
                    className="glyphicon glyphicon-home"
                    aria-hidden="true"
                  ></span>{" "}
                  Home
                </Link>
                <i>/</i>
              </li>
              <li>CheckOut</li>
            </ul>
          </div>
        </div>
        <div>
          {this.state.purchase ? (
            <div className="about py-5">
              <div className="container py-lg-5 py-4">
                <div className="row gutters">
                  {this.state.purchasepayment ? (
                    <center>
                      <img class="w-full h-full" src="https://colombo.andevfrontend.com/img/purchase-done.svg" alt="purchase completed" style={{ width: "300px", height: "300px" }} />
                      <br />
                      <br />
                      <span class="uppercase text-primary-color text-4xl">Purchase Completed</span>
                      <br />
                      <br />
                      <p class="text-lg">Your purchase has been successful, you can see the <Link class="text-primary-color hover:text-primary-hover hover:underline">details of your purchase here</Link>.</p>
                      <br />
                      <p class="text-lg">We have sent the confirmation of your purchase to the email registered in your account.</p>
                      <br />
                      <Link to={"/home"} class="btn btn-primary">
                        <span>Go Back Home</span>
                      </Link>
                    </center>
                  ) : (
                    <center>
                      <img class="w-full h-full" src="https://colombo.andevfrontend.com/img/purchase-cancelled.svg" alt="purchase completed" style={{ width: "300px", height: "300px" }} />
                      <br />
                      <br />
                      <span class="uppercase text-primary-color text-4xl">Purchase Failed</span>
                      <br />
                      <br />
                      <p class="text-lg">An error occurred while completing your purchase, please try again.</p>
                      <br />
                      <p class="text-lg">If you continue to have this problem, contact <Link class="text-primary-color hover:text-primary-hover hover:underline">technical support</Link>.</p>
                      <br />
                      <Link to={"/home"} class="btn btn-primary">
                        <span>Go Back Home</span>
                      </Link>
                    </center>
                  )}
                </div>
              </div>
            </div>
          ) : (
            <div className="about py-5">
              <div className="container py-lg-5 py-4">
                <div className="row">
                  <div className="col-xl-9 col-md-8">
                    <h2 className="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary text-white">
                      <span>Products</span>
                      <Link to={"/products"} className="font-size-sm text-white">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          className="feather feather-chevron-left"
                          style={{ width: "1rem", height: "1rem" }}
                        >
                          <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                        Continue shopping
                      </Link>
                    </h2>
                    <div className="row gutters">
                      <div className="col-lg-12 col-md-12 col-sm-12">
                        <div className="table-responsive">
                          <table className="table custom-table m-0">
                            <thead>
                              <tr>
                                <th width="80">Product</th>
                                <th>Items</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>{Cart_HTMLTABLE}</tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="col-xl-3 col-md-4 pt-3 pt-md-0">
                    <h2 className="h6 px-4 py-3 bg-secondary text-center text-white" style={{ marginBottom: 0 }}>
                      HAVE A PROMO CODE?
                    </h2>
                    <div className="table-responsive" style={{ marginBottom: "0.5rem" }}>
                      <table className="table m-0" style={{ background: "#FFF", border: "1px solid" }}>
                        <tbody>
                          <tr>
                            <td>
                              <input type="hidden" name="maintotal" value={this.state.maintotal} />
                              <input type="hidden" name="promototal" value={this.state.promototal} />
                              <input type="hidden" name="user_id" value={this.state.user_id} />
                              <input type="hidden" name="address_id" value={this.state.address_id} />
                              <input type="hidden" name="promo_id" value={this.state.promo_id} />
                              <input type="text" name="promocode" placeholder="HAVE A PROMO CODE?" style={{ border: "1px solid", height: "38px", verticalAlign: "middle" }} value={this.state.promocode} onChange={this.handleInput} />
                              <button type="button" className="btn btn-dark" style={{ borderRadius: "0px" }} onClick={this.ApplyPromoCode}>Apply</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <h2 className="h6 px-4 py-3 bg-secondary text-center text-white">
                      Order Summary
                    </h2>
                    <div className="table-responsive">
                      <table className="table custom-table m-0 ordretable">
                        <tbody>
                          <tr colspan="2">
                            <td className="text-center">Subtotal</td>
                            <td className="text-center border-left">
                              ₹ {this.state.newTotal}
                            </td>
                          </tr>
                          <tr colspan="2" className="ordretable">
                            <td className="text-center">shopping</td>
                            <td className="text-center border-left">₹ 0.00</td>
                          </tr>
                          <tr colspan="2">
                            <td className="text-center">Sales Tax</td>
                            <td className="text-center border-left">₹ 0.00</td>
                          </tr>
                          <tr colspan="2" style={{ background: "#2e3d5f" }}>
                            <td className="text-center">
                              <h5 className="text-success">
                                <strong>Grand Total</strong>
                              </h5>
                            </td>
                            <td className="text-center">
                              <h5 className="text-success">
                                <strong>₹ {this.state.newTotal}</strong>
                              </h5>
                            </td>
                          </tr>
                          <tr>
                            <td
                              className="condition"
                              colspan="2"
                              style={{ background: "#FFF", fontSize: "15px" }}
                            >
                              <div className="form-check mb-1 small">
                                <label className="form-check-label" for="tnc">
                                  I agree to the <Link to={"home"} data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style={{ color: "#ed174a" }}>
                                    terms and conditions
                                  </Link>
                                </label>
                              </div>
                              <div className="form-check mb-3 small">
                                <label className="form-check-label" for="subscribe">
                                  Get emails about product updates and events. If
                                  you change your mind, you can unsubscribe at any
                                  time. <Link to={"home"} data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable" style={{ color: "#ed174a" }}>
                                    Privacy Policy
                                  </Link>
                                </label>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <hr />
                    <h2 className="h6 px-4 py-3 bg-secondary text-center text-white" style={{ marginBottom: "0px" }}>
                      Additional comments
                    </h2>
                    <textarea
                      name="comments"
                      className="form-control mb-3"
                      id="order-comments"
                      onChange={this.handleInput}
                      value={this.state.comments}
                    ></textarea>
                    <div className="accordion" id="accordionExample">
                      <div className="accordion-item">
                        <h2 className="accordion-header" id="headingOne">
                          <button className="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Cash on delivery (COD)
                          </button>
                        </h2>
                        <div id="collapseOne" className="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div className="mb-3 accordion-body">
                            <div className="mb-3 form-check">
                              {this.state.codcash ? (
                                <input type="checkbox" name="codcash" className="form-check-input" id="exampleCheck1" checked onClick={() => this.handleCodeCash(this.state.codcash)} />
                              ) : (
                                <input type="checkbox" name="codcash" className="form-check-input" id="exampleCheck1" onClick={() => this.handleCodeCash(this.state.codcash)} />
                              )}
                              <strong style={{ color: "#F45C5D" }}>COD</strong>
                              <label className="form-check-label" for="exampleCheck1">We also accept Credit/Debit card on delivery. Please Check with the agent.</label>
                            </div>
                            {cod ? (
                              <button type="button" className="btn btn-primary" style={{ background: '#3A5795', border: '#3A5795' }} onClick={this.SaveCheckOutCOD}>
                                COD PAYMENT {this.state.codLoading ? (
                                  <i className="fa fa-refresh fa-spin"></i>
                                ) : (
                                  <span></span>
                                )}
                              </button>
                            ) : (
                              <button type="button" className="btn btn-primary" style={{ background: '#3A5795', border: '#3A5795' }} disabled>COD PAYMENT</button>
                            )}
                          </div>
                        </div>
                      </div>
                      <div className="accordion-item">
                        <h2 className="accordion-header" id="headingTwo">
                          <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Credit/Debit
                          </button>
                        </h2>
                        <div id="collapseTwo" className="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div className="mb-3 accordion-body">
                            <form>
                              <div className="mb-3">
                                <label for="exampleInputEmail1" className="form-label">Name on Cards</label>
                                <input type="text" className="form-control" />
                              </div>
                              <div className="mb-3">
                                <label for="exampleInputPassword1" className="form-label">Card Number</label>
                                <input type="text" className="form-control" />
                              </div>
                              <div className="mb-3">
                                <label for="exampleInputPassword1" className="form-label">CVV</label>
                                <input type="text" className="form-control" />
                              </div>
                              <div className="mb-3">
                                <label for="exampleInputPassword1" className="form-label">Expiration Date</label>
                                <input type="text" className="form-control" />
                              </div>
                              <button type="submit" className="btn btn-primary" disabled>Make a payment </button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div className="accordion-item">
                        <h2 className="accordion-header" id="headingThree">
                          <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Net Banking
                          </button>
                        </h2>
                        <div id="collapseThree" className="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                          <div className="mb-3 accordion-body">
                            <strong style={{ color: "#F45C5D" }}>Select From Popular Banks</strong> <br />
                            <p>Syndicate Bank</p>
                            <p>Bank of Baroda</p>
                            <p>Canara Bank</p>
                            <p>ICICI Bank</p>
                            <p>State Bank Of India</p>
                            <br />
                            <strong style={{ color: "#F45C5D" }}>Or Select Other Bank</strong> <br />
                            <select className="form-control">
                              <option value="">=== Other Banks ===</option>
                              <option value="ALB-NA">Allahabad Bank NetBanking</option>
                              <option value="ADB-NA">Andhra Bank</option>
                              <option value="BBK-NA">Bank of Bahrain and Kuwait NetBanking</option>
                              <option value="BBC-NA">Bank of Baroda Corporate NetBanking</option>
                              <option value="BBR-NA">Bank of Baroda Retail NetBanking</option>
                              <option value="BOI-NA">Bank of India NetBanking</option>
                              <option value="BOM-NA">Bank of Maharashtra NetBanking</option>
                              <option value="CSB-NA">Catholic Syrian Bank NetBanking</option>
                              <option value="CBI-NA">Central Bank of India</option>
                              <option value="CUB-NA">City Union Bank NetBanking</option>
                              <option value="CRP-NA">Corporation Bank</option>
                              <option value="DBK-NA">Deutsche Bank NetBanking</option>
                              <option value="DCB-NA">Development Credit Bank</option>
                              <option value="DC2-NA">Development Credit Bank - Corporate</option>
                              <option value="DLB-NA">Dhanlaxmi Bank NetBanking</option>
                              <option value="FBK-NA">Federal Bank NetBanking</option>
                              <option value="IDS-NA">Indusind Bank NetBanking</option>
                              <option value="IOB-NA">Indian Overseas Bank</option>
                              <option value="ING-NA">ING Vysya Bank (now Kotak)</option>
                              <option value="JKB-NA">Jammu and Kashmir NetBanking</option>
                              <option value="JSB-NA">Janata Sahakari Bank Limited</option>
                              <option value="KBL-NA">Karnataka Bank NetBanking</option>
                              <option value="KVB-NA">Karur Vysya Bank NetBanking</option>
                              <option value="LVR-NA">Lakshmi Vilas Bank NetBanking</option>
                              <option value="OBC-NA">Oriental Bank of Commerce NetBanking</option>
                              <option value="CPN-NA">PNB Corporate NetBanking</option>
                              <option value="PNB-NA">PNB NetBanking</option>
                              <option value="RSD-DIRECT">Rajasthan State Co-operative Bank-Debit Card</option>
                              <option value="RBS-NA">RBS (The Royal Bank of Scotland)</option>
                              <option value="SWB-NA">Saraswat Bank NetBanking</option>
                              <option value="SBJ-NA">SB Bikaner and Jaipur NetBanking</option>
                              <option value="SBH-NA">SB Hyderabad NetBanking</option>
                              <option value="SBM-NA">SB Mysore NetBanking</option>
                              <option value="SBT-NA">SB Travancore NetBanking</option>
                              <option value="SVC-NA">Shamrao Vitthal Co-operative Bank</option>
                              <option value="SIB-NA">South Indian Bank NetBanking</option>
                              <option value="SBP-NA">State Bank of Patiala NetBanking</option>
                              <option value="SYD-NA">Syndicate Bank NetBanking</option>
                              <option value="TNC-NA">Tamil Nadu State Co-operative Bank NetBanking</option>
                              <option value="UCO-NA">UCO Bank NetBanking</option>
                              <option value="UBI-NA">Union Bank NetBanking</option>
                              <option value="UNI-NA">United Bank of India NetBanking</option>
                              <option value="VJB-NA">Vijaya Bank NetBanking</option>
                            </select>
                            <br />
                            <Link to={"#"} className="btn btn-primary" style={{ background: "#3a5795", border: "#3a5795" }} onClick={this.SaveCheckOutPay} disabled>PAY NOW</Link>
                          </div>
                        </div>
                      </div>
                      <div className="accordion-item">
                        <h2 className="accordion-header" id="headingFour">
                          <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Paypal Account
                          </button>
                        </h2>
                        <div id="collapseFour" className="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                          <div className="accordion-body">
                            <div className="d-flex flex-row bd-highlight mb-3">
                              <div className="p-2 bd-highlight">
                                <img className="pp-img" src="assets/images/paypal.png" alt="paypal" style={{ width: "65%" }} />
                                <br />
                                <p style={{ color: "#8B8B8B", fontSize: "0.95em", fontWeight: "400" }}>Important: You will be redirected to PayPal's website to securely complete your payment.</p>
                                <br />
                                <Link className="btn btn-primary" style={{ background: "#3a5795", border: "#3a5795" }} onClick={this.SaveCheckOutPaypal} disabled>Checkout via Paypal</Link>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          )}
        </div>
        <Newsletter />
        <Footer />
        {/* terms and conditions */}
        <div class="modal fade" id="exampleModalCenter" tabIndex={-1} aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">terms and conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <br />
                <ul class="list-group">
                  <li className="list-group-item">1). What Personal Information About Customers Does Grocery-Mart Collect?</li>
                  <li className="list-group-item">2). For What Purposes Does Grocery-Mart Use Your Personal Information?</li>
                  <li className="list-group-item">3). What About Cookies and Other Identifiers?</li>
                  <li className="list-group-item">4). Does Grocery-Mart Share Your Personal Information?</li>
                  <li className="list-group-item">5). How Secure is Information About Me?</li>
                  <li className="list-group-item">6). What About Advertising?</li>
                  <li className="list-group-item">7). What Information can I Access?</li>
                  <li className="list-group-item">8). What Choices Do I Have?</li>
                  <li className="list-group-item">9). Are Children Allowed to Use Grocery-Mart Services?</li>
                  <li className="list-group-item">10). Conditions of Use, Notices, and Revisions</li>
                  <li className="list-group-item">11). Related Practices and Information</li>
                  <li className="list-group-item">12). Examples of Information Collected</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        {/* Privacy Policy */}
        <div class="modal fade" id="exampleModalCenteredScrollable" tabIndex={-1} aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Privacy Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>We know that you care how information about you is used and shared, and we appreciate your trust that we will do so carefully and sensibly. This Privacy Notice describes how Grocery-Mart Seller Services Private Limited and its affiliates including Grocery-Mart.com, Inc. (collectively "Grocery-Mart") collect and process your personal information through Grocery-Mart websites, devices, products, services, online marketplace and applications that reference this Privacy Notice (together "Grocery-Mart Services"). By using Grocery-Mart Services you agree to our use of your personal information (including sensitive personal information) in accordance with this Privacy Notice, as may be amended from time to time by us at our discretion. You also agree and consent to us collecting, storing, processing, transferring, and sharing your personal information (including sensitive personal information) with third parties or service providers for the purposes set out in this Privacy Notice. Personal information subject to this Privacy Notice will be collected and retained by Grocery-Mart, with a registered office at 8th floor, Brigade Gateway 26/1 Dr. Rajkumar Road Bangalore Karnataka 560055 India.</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    );
  }
}
export default CheckOut;