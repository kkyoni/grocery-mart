import React, { Component } from "react";
import { Link } from 'react-router-dom';
import './header.css';
import './cart.css';
import swal from "sweetalert";
import Loader from './Loader';
class Header extends Component {
    constructor(props) {
        super(props)
        this.state = {
            TemplateTheme: 'light',
            product_cart: {},
            newTotal: 0.00,
            photo: 'http://127.0.0.1:8000/storage/product/',
        }
        this.handleCartItems = this.handleCartItems.bind(this);
    }
    componentWillReceiveProps() {
        const CurrentproductDetails = localStorage.getItem("product_details");
        let newTotal = 0.00;
        if (JSON.parse(CurrentproductDetails) && JSON.parse(CurrentproductDetails).length > 0) {
            JSON.parse(CurrentproductDetails).forEach((el) => {
                newTotal += Number(el.price);
            });
            this.setState({ product_cart: JSON.parse(CurrentproductDetails), newTotal: Number.parseFloat(newTotal).toFixed(2) });
        }
    }
    componentDidMount() {
        if (window.location.pathname !== '/order-tracking') {
            localStorage.removeItem('invoice');
        }
        const CurrentproductDetails = localStorage.getItem("product_details");
        let newTotal = 0.00;
        if (JSON.parse(CurrentproductDetails) && JSON.parse(CurrentproductDetails).length > 0) {
            JSON.parse(CurrentproductDetails).forEach((el) => {
                newTotal += Number(el.price);
            });
            this.setState({ product_cart: JSON.parse(CurrentproductDetails), newTotal: Number.parseFloat(newTotal).toFixed(2) });
        }
        const currentTheme = localStorage.getItem('theme');
        document.documentElement.setAttribute('data-theme', currentTheme);
        this.setState({ TemplateTheme: currentTheme })
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
            localStorage.removeItem('product_details');
            this.setState({ product_cart: [], newTotal: newTotal });
            window.location.reload(false);
        }
        swal({
            title: "Success!",
            text: "Cart Item Delete Successfully",
            icon: "success",
            button: "Ok!",
        });
    }
    ThemeChange(theme) {
        localStorage.setItem("theme", theme);
        const currentTheme = localStorage.getItem('theme');
        document.documentElement.setAttribute('data-theme', currentTheme);
        this.setState({ TemplateTheme: currentTheme })
    }

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
    }

    CartPlus(id) { this.handleCartItems('plus', id); }
    CartMinus(id) { this.handleCartItems('minus', id); }

    render() {
        const login = JSON.parse(localStorage.getItem("userData"));
        let pathname = window.location.pathname;
        var Cart_HTMLTABLE = "";
        if (this.state.product_cart && this.state.product_cart.length > 0) {

            Cart_HTMLTABLE =
                this.state.product_cart.map((item, index) => {
                    const { name, description, id, qty, productimage, price } = item;
                    return (
                        <div className="cartitem" key={index}>
                            <div className="cartbuttons">
                                <span className="cartdelete-btn" onClick={() => this.handleRemoveCart(item.id)}></span>
                            </div>
                            <div className="cartimage">
                                <img src={this.state.photo + productimage[0].image} alt={productimage[0].image} style={{ height: "80px", width: "80px" }} />
                            </div>
                            <div className="cartdescription">
                                <span>{name.substring(0, 14)}...</span>
                                <span>{description.substring(0, 25)}...</span>
                            </div>

                            <div className="cartquantity">
                                <button className="cartplus-btn" type="button" name="button" onClick={() => this.CartPlus(id)}>
                                    <img src="https://designmodo.com/demo/shopping-cart/plus.svg" alt="plus" />
                                </button>
                                <input type="text" name="name" value={qty} disabled />
                                <button className="cartminus-btn" type="button" name="button" onClick={() => this.CartMinus(id)} disabled={qty <= 1}>
                                    <img src="https://designmodo.com/demo/shopping-cart/minus.svg" alt="minus" />
                                </button>
                            </div>

                            <div className="carttotal-price">₹{price}</div>
                        </div>
                    );
                });
        } else {
            Cart_HTMLTABLE = <div className="cartitem">
                <div className="notempty">Your shopping cart is empty ...</div>
            </div>
        }
        return (
            <div>
                <Loader isLoading={this.props.isLoading} />
                <header id="site-header" className="fixed-top">
                    <div className="container">
                        <nav className="navbar navbar-expand-lg navbar-light">
                            <button className="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span className="navbar-toggler-icon fa icon-expand fa-bars"></span>
                                <span className="navbar-toggler-icon fa icon-close fa-times"></span>
                            </button>
                            <div className="collapse navbar-collapse" id="navbarScroll">
                                <ul className="navbar-nav mx-auto my-2 my-lg-0 navbar-nav-scroll">
                                    <li className={`${pathname.match('/home') ? 'nav-item active' : 'nav-item'}`}>
                                        <Link to={"/home"} className="nav-link">Home</Link>
                                    </li>
                                    <li className="nav-item dropdown">
                                        <Link to={"/products"} className={`${pathname.match('/products') ? 'nav-link dropdown-toggle active' : 'nav-link dropdown-toggle'}`} id="navbarScrollingDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Products <i className="fas fa-angle-down"></i>
                                        </Link>
                                        <ul className="dropdown-menu dropdown-menu-2" aria-labelledby="navbarScrollingDropdown">
                                            <div className="row">
                                                <div className="col-lg-4">
                                                    <ul className="multi-column-dropdown">
                                                        <h6>Kitchen</h6>
                                                        <li><Link to={"/products"}>Meat & Seafood </Link></li>
                                                        <li><Link to={"/products"}>Snack Foods<span>New</span></Link></li>
                                                        <li><Link to={"/products"}>Oils, Vinegars</Link></li>
                                                        <li><Link to={"/products"}>Pasta & Noodles<span>New</span></Link></li>
                                                    </ul>
                                                </div>
                                                <div className="col-lg-4 mt-lg-0 mt-4">
                                                    <ul className="multi-column-dropdown">
                                                        <h6>Household</h6>
                                                        <li><Link to={"/products"}>Detergents</Link></li>
                                                        <li><Link to={"/products"}>Floor & Other Cleaners</Link></li>
                                                        <li><Link to={"/products"}>Pet Care <span>New</span></Link></li>
                                                        <li><Link to={"/products"}><i>Festive Decoratives</i></Link></li>
                                                    </ul>
                                                </div>
                                                <div className="col-lg-4">
                                                    <div className="w3ls_products_pos">
                                                        <h4 className="mb-4">30%<i>Off/-</i></h4>
                                                        <img src="../assets/images/nav.png" alt="nav" className="img-fluid" />
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li className='nav-item dropdown'>
                                        <Link to={"/"} className="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Cms <i className="fas fa-angle-down"></i>
                                        </Link>
                                        <ul className="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                            <li><Link to={"/about-us"} className={`${pathname.match('/about-us') ? 'dropdown-item active' : 'dropdown-item'}`}>About Us</Link></li>
                                            <li><Link to={"/faq"} className={`${pathname.match('/faq') ? 'dropdown-item active' : 'dropdown-item'}`}>Faq's</Link></li>
                                            <li><Link to={"/contact-us"} className={`${pathname.match('/contact-us') ? 'dropdown-item active' : 'dropdown-item'}`}>Contact Us</Link></li>
                                        </ul>
                                    </li>
                                    <li className={`${pathname.match('/blog') ? 'nav-item active' : 'nav-item'}`}>
                                        <Link to={"/blog"} className='nav-link'>Blog</Link>
                                    </li>
                                    {login ? (
                                        <li className='nav-item dropdown'>
                                            <Link to={"/"} className="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Profile <i className="fas fa-angle-down"></i>
                                            </Link>
                                            <ul className="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                                <li><Link to={"/profile"} className={`${pathname.match('/profile') ? 'dropdown-item active' : 'dropdown-item'}`}>Profile</Link></li>
                                                <li><Link to={"/check-out"} className={`${pathname.match('/check-out') ? 'dropdown-item active' : 'dropdown-item'}`}>CheckOut</Link></li>
                                                <li><Link to={"/order-tracking"} className={`${pathname.match('/order-tracking') ? 'dropdown-item active' : 'dropdown-item'}`}>OrderTracking</Link></li>
                                            </ul>
                                        </li>
                                    ) : ("")}
                                    <li className='nav-item dropdown'>
                                        <Link className="btn nav-link" data-bs-toggle="offcanvas" to={"#offcanvasExample"} role="button" aria-controls="offcanvasExample">
                                            <i className="fas fa-shopping-bag"></i>
                                        </Link>
                                    </li>
                                </ul>
                            </div>

                            <div className="cont-ser-position">
                                <nav className="navigation-dark">
                                    <div className="theme-switch-wrapper">
                                        <label className="theme-switch" htmlFor="checkbox">
                                            <input type="checkbox" id="checkbox" />
                                            <div className="mode-container">
                                                {this.state.TemplateTheme === 'light' ?
                                                    (
                                                        <div>
                                                            <i className="gg-sun" onClick={() => this.ThemeChange('light')}></i>
                                                            <i className="gg-moon" onClick={() => this.ThemeChange('dark')}></i>
                                                        </div>
                                                    ) : (
                                                        <div>
                                                            <i className="gg-sun" onClick={() => this.ThemeChange('light')}></i>
                                                            <i className="gg-moon" onClick={() => this.ThemeChange('dark')}></i>
                                                        </div>
                                                    )}
                                            </div>
                                        </label>
                                    </div>
                                </nav>
                            </div>

                            <div className="offcanvas offcanvas-start" tabIndex={-1} id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style={{ width: "auto" }}>
                                <div className="offcanvas-header">
                                    <button type="button" className="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div className="offcanvas-body">
                                    <div className="cartshopping-cart">
                                        <div className="title text-danger">
                                            Shopping Bag
                                        </div>
                                        {Cart_HTMLTABLE}
                                        <h5 className="text-success list-group mt-3" style={{ fontSize: 'initial' }}>
                                            <Link to={"/check-out"} className="btn btn-primary"><i className="fa fa-check"></i> CheckOut</Link>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </header>
            </div>
        )
    }
}

export default Header;
