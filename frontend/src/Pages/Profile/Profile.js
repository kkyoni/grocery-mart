import React, { Component } from "react";
import { Link, Redirect } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import './profile.css';
import MyAccount from "./Tab/MyAccount";
import Orders from "./Tab/Orders";
import MyAddress from "./Tab/ MyAddress";
import Support from "./Tab/ Support";
class Profile extends Component {
    state = {
        isLoading: true,
        myaccount: true,
        orders: false,
        myaddress: false,
        support: false,
    };
    async componentDidMount() {
        this.setState({
            isLoading: true,
        });
        setTimeout(() => {
            this.setState({
                isLoading: false,
            })
        }, 1000);
    }

    toggle(item) {
        if (item === 'myaccount') {
            this.setState({ myaccount: true });
            this.setState({ orders: false });
            this.setState({ myaddress: false });
            this.setState({ support: false });
        } else if (item === 'orders') {
            this.setState({ myaccount: false });
            this.setState({ orders: true });
            this.setState({ myaddress: false });
            this.setState({ support: false });
        } else if (item === 'myaddress') {
            this.setState({ myaccount: false });
            this.setState({ orders: false });
            this.setState({ myaddress: true });
            this.setState({ support: false });
        } else {
            this.setState({ myaccount: false });
            this.setState({ orders: false });
            this.setState({ myaddress: false });
            this.setState({ support: true });
        }
    }
    render() {
        const login = JSON.parse(localStorage.getItem("userData"));
        if (!login) {
            return <Redirect to={'home'} />;
        }
        return (
            <div>
                <Title isLoadingPage={this.state.isLoading} />
                <Header />
                <div className="banner banner2">
                    <div className="container">
                        <h2>Profile</h2>
                    </div>
                </div>
                <div className="breadcrumb_dress">
                    <div className="container">
                        <ul>
                            <li><Link to={"/home"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link> <i>/</i></li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
                <div className="font-cairo text-txt bg-gray-50 flex flex-col min-h-screen">
                    <div className="user-panel container mx-auto py-5 px-5">
                        <div className="grid grid-cols-12 tabs-container" style={{ gap: '1.25rem' }}>
                            <div className="col-span-12 md:col-span-4">
                                <ul className="bg-white rounded p-5">
                                    <li className={this.state.myaccount ? ("btn-tabs flex items-center p-2 text-lg border-b border-gray-200 hover:text-primary-color transition-all duration-300 cursor-pointer active") : ("btn-tabs flex items-center p-2 text-lg border-b border-gray-200 hover:text-primary-color transition-all duration-300 cursor-pointer")} onClick={this.toggle.bind(this, 'myaccount')}>
                                        <i className="bi bi-person-fill text-primary-color"></i>
                                        <span>My Account</span>
                                    </li>
                                    <li className={this.state.orders ? ("btn-tabs flex items-center p-2 text-lg border-b border-gray-200 hover:text-primary-color transition-all duration-300 cursor-pointer active") : ("btn-tabs flex items-center p-2 text-lg border-b border-gray-200 hover:text-primary-color transition-all duration-300 cursor-pointer")} onClick={this.toggle.bind(this, 'orders')}>
                                        <i className="bi bi-basket2-fill text-primary-color"></i>
                                        <span>Orders</span>
                                    </li>
                                    <li className={this.state.myaddress ? ("btn-tabs flex items-center p-2 text-lg border-b border-gray-200 hover:text-primary-color transition-all duration-300 cursor-pointer active") : ("btn-tabs flex items-center p-2 text-lg border-b border-gray-200 hover:text-primary-color transition-all duration-300 cursor-pointer")} onClick={this.toggle.bind(this, 'myaddress')}>
                                        <i className="bi bi-geo-alt-fill text-primary-color"></i>
                                        <span>My Address</span>
                                    </li>
                                    <li className={this.state.support ? ("btn-tabs flex items-center p-2 text-lg border-b border-gray-200 hover:text-primary-color transition-all duration-300 cursor-pointer active") : ("btn-tabs flex items-center p-2 text-lg border-b border-gray-200 hover:text-primary-color transition-all duration-300 cursor-pointer")} onClick={this.toggle.bind(this, 'support')}>
                                        <i className="bi bi-headset text-primary-color"></i>
                                        <span>Support</span>
                                    </li>
                                    <li className="flex items-center p-2 text-lg hover:text-primary-color transition-all duration-300 cursor-pointer">
                                        <i className="bi bi-box-arrow-left text-primary-color"></i>
                                        <span>Log out</span>
                                    </li>
                                </ul>
                            </div>
                            <div className="col-span-12 md:col-span-8">
                                <div className="tabs-content">
                                    <div className={this.state.myaccount ? ("tab-content bg-white rounded p-5 w-full absolute opacity-0 active") : ("tab-content bg-white rounded p-5 w-full absolute opacity-0 invisible")}>
                                        <MyAccount />
                                    </div>
                                    <div className={this.state.orders ? ("tab-content bg-white rounded p-5 w-full absolute opacity-0 active") : ("tab-content bg-white rounded p-5 w-full absolute opacity-0 invisible")}>
                                        <Orders />
                                    </div>
                                    <div className={this.state.myaddress ? ("tab-content bg-white rounded p-5 w-full absolute opacity-0 active") : ("tab-content bg-white rounded p-5 w-full absolute opacity-0 invisible")}>
                                        <MyAddress />
                                    </div>
                                    <div className={this.state.support ? ("tab-content bg-white rounded p-5 w-full absolute opacity-0 active") : ("tab-content bg-white rounded p-5 w-full absolute opacity-0 invisible")}>
                                        <Support />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Newsletter />
                <Footer />
            </div >
        )
    }
}
export default Profile;