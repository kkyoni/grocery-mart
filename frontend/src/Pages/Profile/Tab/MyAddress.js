import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Service from "../../../services/Service";
import { toast } from 'react-toastify';
import swal from "sweetalert";
import axios from "axios";
class MyAddress extends Component {
    state = {
        zip: '',
        states: '',
        country: '',
        street_address: '',
        city: '',
        user_id: '',
        address_id: '',
        alluserAddress: [],
        connection: false,
        notrecordloading: false,
    };
    async componentDidMount() {
        const login = JSON.parse(localStorage.getItem("userData"));
        this.setState({ user_id: login.id });
        Service.getUserAddress(login.id).then(res => {
            if (res.data.status === 'success') {
                this.setState({ alluserAddress: res.data.alluserAddress, connection: true, notrecordloading: true });
            } else {
                this.setState({ alluserAddress: [], connection: true, notrecordloading: false });
            }
        })
    }
    handleInput = (e) => {
        this.setState({
            [e.target.name]: e.target.value
        });
    }
    handleDeleteAddress = (address_id, user_id) => {
        Service.UserAddressDelete(address_id, user_id).then(res => {
            if (res.data.status === 'success') {
                this.setState({ alluserAddress: res.data.alluserAddress, connection: true, notrecordloading: true });
                swal({
                    title: "Success!",
                    text: res.data.message,
                    icon: "success",
                    button: "Ok!",
                });
            } else {
                swal({
                    title: "Warning!",
                    text: res.data.message,
                    icon: "warning",
                    button: "Ok!",
                });
            }
        })
    };
    handleAddressSelect = (address_id, user_id) => {
        Service.UserAddressSelect(address_id, user_id).then(res => {
            if (res.data.status === 'success') {
                toast.success(res.data.message, { position: toast.POSITION.TOP_RIGHT });
                localStorage.setItem("userData", JSON.stringify(res.data.userset));
                this.setState({ alluserAddress: res.data.alluserAddress, connection: true, notrecordloading: true });
            } else {
                toast.error("Select Address Error", { position: toast.POSITION.TOP_RIGHT });
            }
        })
    };
    handleEditAddress = (address_id) => {
        Service.UserEditAddress(address_id).then(res => {
            if (res.data.status === 'success') {
                this.setState({
                    address_id: res.data.usereditaddress.id,
                    zip: res.data.usereditaddress.zip,
                    states: res.data.usereditaddress.states,
                    country: res.data.usereditaddress.country,
                    street_address: res.data.usereditaddress.street_address,
                    city: res.data.usereditaddress.city
                });
            } else {
                this.setState({
                    address_id: res.state.address_id,
                    zip: res.state.zip,
                    states: res.state.states,
                    country: res.state.country,
                    street_address: res.state.street_address,
                    city: res.state.city
                });
            }
        })
    }
    SaveAddress = async (e) => {
        e.preventDefault();
        const res = await axios.post('http://127.0.0.1:8000/api/add-address', this.state);
        if (res.data.status === "success") {
            toast.success("Add Address", { position: toast.POSITION.TOP_RIGHT });
            this.setState({
                alluserAddress: res.data.alluserAddress,
                zip: '',
                states: '',
                country: '',
                street_address: '',
                city: '',
            });
            window.location.reload(false);
        } else {
            toast.error("Not Add Address", { position: toast.POSITION.TOP_RIGHT });
        }
    }
   
    render() {
        const login = JSON.parse(localStorage.getItem("userData"));
        var All_User_Address_HTMLTABLE = "";
        if (this.state.connection) {
            if (this.state.notrecordloading) {
                All_User_Address_HTMLTABLE =
                    this.state.alluserAddress.map((item, i) => {
                        return (
                            <div key={i} className={item.id === Number(login.address_id) ? ("relative border-2 rounded p-4 w-[200px] border-primary-color") : ("relative border-2 rounded p-4 w-[200px]")} style={{width:'195px'}}>
                                {item.id === Number(login.address_id) ? ("") : (<div className="absolute top-0 right-0 p-2 cursor-pointer" style={{ cursor: "pointer", right: "0" }} onClick={() => this.handleDeleteAddress(item.id, login.id)}>
                                    <i className="fa fa-times text-xl"></i>
                                </div>)}
                                <span className="text-lg font-bold">{item.optional}</span>
                                <div className="flex flex-col py-4">
                                    <span>{item.street_address}</span>
                                    <span>{item.zip}</span>
                                    <span>{item.city}</span>
                                    <span>{item.country}</span>
                                </div>
                                {item.id === Number(login.address_id) ? ("") : (<Link onClick={() => this.handleAddressSelect(item.id, login.id)} className="btn-open-modal text-primary-color hover:underline" style={{ marginRight: "3.25rem" }}>Select</Link>)}
                                <Link onClick={() => this.handleEditAddress(item.id)} className="btn-open-modal text-primary-color hover:underline" data-bs-toggle="modal" data-bs-target="#myModalAddress">Edit</Link>
                            </div>
                        );
                    });
            } else {
                All_User_Address_HTMLTABLE = <table><tbody><tr><td><img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "512px", height: "360px" }} /></td></tr></tbody></table>
            }
        } else {
            All_User_Address_HTMLTABLE = <table><tbody><tr><td><img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "512px", height: "360px" }} /></td></tr></tbody></table>
        }
        return (
            <div>
                <Link className="btn-open-modal text-primary-color hover:underline" data-bs-toggle="modal" data-bs-target="#AddModalAddress">Add Address</Link>
                <div className="flex flex-wrap" style={{ gap: "1.25rem" }}>
                        {All_User_Address_HTMLTABLE}
                    <div className="modal fade" id="AddModalAddress" tabIndex={-1} aria-labelledby="AddModalAddress" aria-hidden="true">
                        <div className="modal-dialog modal-dialog-centered">
                            <div className="modal-content">
                                <div className="modal-header border-0">
                                    <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div className="row modal-body">
                                    <section className="w3l-contact" id="contact">
                                        <form method="post" className="signin-form" onSubmit={this.SaveAddress}>
                                            <div className="container mt-2">
                                                <div className="mb-2 flex items-center">
                                                    <span style={{ fontWeight: '700', fontSize: '1.25rem', lineHeight: '1.75rem' }}>Add Address Details</span>
                                                </div>
                                                <div className="row contact-block">
                                                    <div className="col-md-6 contact-left">
                                                        <div className="input-grids">
                                                            <select name="optional" className="select_item" style={{ width: '100%', background: 'var(--bg-light)', fontSize: "16px", padding: "14px", border: "2px solid var(--border-color-light)", outline: "none", marginBottom: "16px", borderRadius: "var(--border-radius)", resize: "none", WebkitAppearance: "none" }}>
                                                                <option value={'home'}>Home</option>
                                                                <option value={'office'}>Office</option>
                                                            </select>
                                                            <input type="text" className="contact-input" id="w3lName" name="city" placeholder="City" onChange={this.handleInput} value={this.state.city} required="" />
                                                            <input type="text" className="contact-input" id="w3lSender" name="country" placeholder="Country" onChange={this.handleInput} value={this.state.country} required="" />
                                                        </div>
                                                    </div>
                                                    <div className="col-md-6 contact-right">
                                                        <div className="input-grids">
                                                            <input type="text" className="contact-input" id="w3lName" name="street_address" placeholder="Street Address" onChange={this.handleInput} value={this.state.street_address} required="" />
                                                            <input type="text" className="contact-input" id="w3lSender" name="states" placeholder="States" onChange={this.handleInput} value={this.state.states} required="" />
                                                            <input type="text" className="contact-input" id="w3lName" name="zip" placeholder="ZIP" onChange={this.handleInput} value={this.state.zip} required="" />
                                                        </div>
                                                    </div>
                                                    <button className="btn btn-style">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="modal fade" id="myModalAddress" tabIndex={-1} aria-labelledby="myModalAddress" aria-hidden="true">
                        <div className="modal-dialog modal-dialog-centered">
                            <div className="modal-content">
                                <div className="modal-header border-0">
                                    <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div className="row modal-body">
                                    <section className="w3l-contact" id="contact">
                                        <form method="post" className="signin-form" onSubmit={this.SaveAddress}>
                                            <div className="container mt-2">
                                                <div className="mb-2 flex items-center">
                                                    <span style={{ fontWeight: '700', fontSize: '1.25rem', lineHeight: '1.75rem' }}>Edit Address Details</span>
                                                </div>
                                                <div className="row contact-block">
                                                    <div className="col-md-6 contact-left">
                                                        <div className="input-grids">
                                                            <select name="optional" className="select_item" style={{ width: '100%', background: 'var(--bg-light)', fontSize: "16px", padding: "14px", border: "2px solid var(--border-color-light)", outline: "none", marginBottom: "16px", borderRadius: "var(--border-radius)", resize: "none", WebkitAppearance: "none" }}>
                                                                <option value={'home'}>Home</option>
                                                                <option value={'office'}>Office</option>
                                                            </select>
                                                            <input type="hidden" className="contact-input" id="w3lName" name="address_id" placeholder="address_id" onChange={this.handleInput} value={this.state.address_id} required="" />
                                                            <input type="text" className="contact-input" id="w3lName" name="city" placeholder="City" onChange={this.handleInput} value={this.state.city} required="" />
                                                            <input type="emaitextl" className="contact-input" id="w3lSender" name="country" placeholder="Country" onChange={this.handleInput} value={this.state.country} required="" />
                                                        </div>
                                                    </div>
                                                    <div className="col-md-6 contact-right">
                                                        <div className="input-grids">
                                                            <input type="text" className="contact-input" id="w3lName" name="street_address" placeholder="Street Address" onChange={this.handleInput} value={this.state.street_address} required="" />
                                                            <input type="text" className="contact-input" id="w3lSender" name="states" placeholder="States" onChange={this.handleInput} value={this.state.states} required="" />
                                                            <input type="text" className="contact-input" id="w3lName" name="zip" placeholder="ZIP" onChange={this.handleInput} value={this.state.zip} required="" />
                                                        </div>
                                                    </div>
                                                    <button className="btn btn-style">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default MyAddress;