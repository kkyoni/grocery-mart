import React, { Component } from "react";
import { Link } from 'react-router-dom';
import './header.css';
class Header extends Component {
    constructor(props) {
        super(props)
        this.state = {
            product_cart: {},
            newTotal: '0.00',
            photo: 'http://127.0.0.1:8000/storage/product/',
        }
    }
    componentWillReceiveProps() {
        const todos = localStorage.getItem("product_details");
        let newTotal = 0;
        if (JSON.parse(todos) && JSON.parse(todos).length > 0) {
            JSON.parse(todos).forEach((el) => {
                newTotal += el.price;
            });
            this.setState({ product_cart: JSON.parse(todos), newTotal: newTotal });
        }
    }
    componentDidMount() {
        const todos = localStorage.getItem("product_details");
        let newTotal = 0;
        if (JSON.parse(todos) && JSON.parse(todos).length > 0) {
            JSON.parse(todos).forEach((el) => {
                newTotal += el.price;
            });
            this.setState({ product_cart: JSON.parse(todos), newTotal: newTotal });
        }
    }
    handleRemoveCart(id) {
        console.log("Remove Id :", id);
    }
    ThemeChange(theme) {
        localStorage.setItem("theme", theme);
        const currentTheme = localStorage.getItem('theme');
        document.documentElement.setAttribute('data-theme', currentTheme);
    }

    render() {
        console.log("currentTheme :", this.state.ThemeMode);
        let pathname = window.location.pathname;
        var Cart_HTMLTABLE = "";
        if (this.state.product_cart && this.state.product_cart.length > 0) {

            Cart_HTMLTABLE =
                this.state.product_cart.map((item, index) => {
                    return (
                        <tr>
                            <td key={index}>
                                {item.name}
                                <p className="m-0 text-muted" style={{ fontSize: '.75rem', lineHeight: '1.5' }}>
                                    {item.description.substring(0, 68)}...
                                </p>
                            </td>
                            <td>1</td>
                            <td>₹{item.price}</td>
                            <td style={{ textAlign: 'center' }}> <span class="badge badge-primary badge-pill" onClick={() => this.handleRemoveCart(item.id)}><i className="fa fa-close"></i></span> </td>
                        </tr>
                    );
                });
        } else {
            Cart_HTMLTABLE = <tr>
                <td colspan="4" style={{ textAlign: 'center' }}>
                    <strong>Your shopping cart is empty ...</strong>
                </td>
            </tr>
        }

        return (
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
                                                    <img src="assets/images/nav.png" alt="nav" className="img-fluid" />
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

                                <li className="nav-item dropdown">
                                    <Link to={"/products"} className={`${pathname.match('/products') ? 'nav-link dropdown-toggle active' : 'nav-link dropdown-toggle'}`} id="navbarScrollingDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i className="fas fa-shopping-bag"></i>
                                    </Link>
                                    <ul className="dropdown-menu dropdown-menu-2" aria-labelledby="navbarScrollingDropdown">
                                        <div className="container">
                                            <div className="row gutters">
                                                <div className="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div className="card">
                                                        <div className="card-body p-0">
                                                            <div className="invoice-container">
                                                                <div className="invoice-body">

                                                                    <div className="row gutters">
                                                                        <div className="col-lg-12 col-md-12 col-sm-12">
                                                                            <div className="table-responsive">
                                                                                <table className="table custom-table m-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Items</th>
                                                                                            <th>Quantity</th>
                                                                                            <th>Total</th>
                                                                                            <th>Action</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        {Cart_HTMLTABLE}
                                                                                        <tr className="text-center">
                                                                                            <td>
                                                                                                <h5 className="text-success" style={{ fontSize: 'initial' }}><strong>Grand Total</strong></h5>
                                                                                            </td>
                                                                                            <td colspan="3">
                                                                                                <h5 className="text-success" style={{ fontSize: 'initial' }}><strong>₹ {this.state.newTotal}</strong></h5>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div className="invoice-footer" style={{ color: '#bcd0f7' }}>
                                                                    Thank you for your Business.
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div className="cont-ser-position">
                            <nav className="navigation-dark">
                                <div className="theme-switch-wrapper">
                                    <label className="theme-switch" htmlFor="checkbox">
                                        <input type="checkbox" id="checkbox" />
                                        <div className="mode-container">
                                            <i className="gg-sun" onClick={() => this.ThemeChange('light')}></i>
                                            <i className="gg-moon" onClick={() => this.ThemeChange('dark')}></i>
                                        </div>
                                    </label>
                                </div>
                            </nav>
                        </div>
                    </nav>
                </div>
            </header>
        )
    }
}

export default Header;
