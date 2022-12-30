import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Service from "../../../services/Service";
import moment from "moment";
class Orders extends Component {
    state = {
        order: {},
        order_list: [],
        photo: 'http://127.0.0.1:8000/storage/product/',
    };
    async componentDidMount() {
        const login = JSON.parse(localStorage.getItem("userData"));
        Service.getUserOrder(login.id).then(res => {
            if (res.data.status === 'success') {
                this.setState({ order_list: res.data.order_list, connection: true, notrecordloading: true });
            } else {
                this.setState({ order_list: [], connection: true, notrecordloading: false });
            }
        })
    }
    handleViewOrder = (id) => {
        Service.singleUserOrder(id).then(res => {
            this.setState({ order: res.data.order });
        })
    };
    render() {
        var order_HTMLTABLE = "";
        if (this.state.connection) {
            if (this.state.notrecordloading) {
                var table = <thead>
                    <tr>
                        <th className="col border p-2">Order</th>
                        <th className="col border p-2">Date</th>
                        <th className="col border p-2">Status</th>
                        <th className="col border p-2">Total</th>
                        <th className="col border p-2">Payment Mode</th>
                        <th className="col border p-2">Actions</th>
                    </tr>
                </thead>;
                order_HTMLTABLE =
                    this.state.order_list.map((item, i) => {
                        return (
                            <tr key={i}>
                                <th className="border p-2" scope="row">#{item.invoice}</th>
                                <td className="border p-2">{moment(item.updated_at).format('ll')}</td>
                                <td className="border p-2">
                                    {item.status === 'processing' && (<span className="text-secondary">Processing</span>)}
                                    {item.status === 'accepted' && (<span className="text-warning">Accepted</span>)}
                                    {item.status === 'ontheway' && (<span className="text-success">On The Way</span>)}
                                    {item.status === 'delivered' && (<span className="text-info">Delivered</span>)}
                                    {item.status === 'cancelled' && (<span className="text-danger">Cancelled</span>)}
                                </td>
                                <td className="border p-2"><span className="font-bold">₹ {item.grandtotal}</span></td>
                                <td className="border p-2"><span className="font-bold">{item.payment_mode}</span></td>
                                <td className="border p-2"><Link onClick={() => this.handleViewOrder(item.id)} className="text-primary-color hover:underline" data-bs-toggle="modal" data-bs-target="#myModalViewOrder">View</Link></td>
                            </tr>
                        );
                    });
            } else {
                order_HTMLTABLE = <table><tbody><tr><td><img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "512px", height: "360px" }} /></td></tr></tbody></table>
            }
        } else {
            order_HTMLTABLE = <table><tbody><tr><td><img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "512px", height: "360px" }} /></td></tr></tbody></table>
        }
        var order_product_HTMLTABLE = this.state.order.order_product_details?.map((item, i) => {
            return (<div className="flex gap-5 my-2" key={i}>
                <div className="bg-white border rounded h-[100px] w-[100px] min-w-[100px] overflow-hidden" style={{ minWidth: '100px', width: '100px', height: '100px' }}>
                    <Link to={`/single-products/${item.product_id}`}>
                        <img className="w-full h-full object-cover" src={this.state.photo + item.product_image} alt={item.product_image} style={{ width: '100%', height: '100%' }} />
                    </Link>
                </div>
                <div className="flex flex-wrap flex-col">
                    <Link className="font-bold clamp-2">{item.name}</Link>
                    <div className="flex flex-wrap items-center gap-2">
                        <span className="font-bold text-xl text-primary-color">₹ {item.main_price}</span>
                        <span className="text-sm" style={{ lineHeight: '2' }}>{item.qty} items</span>
                    </div>
                    <div className="flex items-center gap-2 text-sm">
                        <span className="font-bold">Total:</span>
                        <span>₹ {item.price}</span>
                    </div>
                </div>
            </div>
            );
        });
        return (
            <section className="w3l-contact" id="contact">
                <div className="container">
                    <div className="row contact-block">
                        <div className="col-md-12 contact-right mt-md-0 mt-5 ps-lg-0">
                            <table className="table table-striped" style={{ background: 'none', color: '#000' }}>
                                {table}
                                <tbody>
                                    {order_HTMLTABLE}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div className="modal fade" id="myModalViewOrder" tabindex="-1" aria-labelledby="myModalViewOrder" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered">
                        <div className="modal-content">
                            <div className="modal-header border-0">
                                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div className="row modal-body">
                                <div className="mb-1 flex items-center gap-2" style={{ marginBottom: '1px', gap: '0.5rem' }}>
                                    <span style={{ fontWeight: '700', fontSize: '1.25rem', lineHeight: '1.75rem' }}>Order Details</span>
                                    <span> - </span>
                                    <span> #{this.state.order.invoice}</span>
                                </div>
                                <div>
                                    <div className="py-2 border-b" style={{ borderBottomWidth: '1px', paddingTop: "0.5rem", paddingBottom: "0.5rem" }}>
                                        <i className="fa fa-calendar"></i><span> {moment(this.state.order.updated_at).format('ll')}</span>
                                    </div>
                                    <div className="py-2 border-b" style={{ borderBottomWidth: '1px', paddingTop: "0.5rem", paddingBottom: "0.5rem" }}>
                                        <span className="block font-bold mb-2" style={{ display: 'block' }}>Order Status</span>
                                        <div className="flex items-center gap-2">
                                            {this.state.order.status === 'processing' || this.state.order.status === 'accepted' || this.state.order.status === 'ontheway' || this.state.order.status === 'delivered' ? (<i className="fa fa-check-circle text-green-500"></i>) : (<i className="fa fa-times-circle text-red-500"></i>)}
                                            <span>Preparing order</span>
                                        </div>
                                        <div className="flex items-center gap-2">
                                            {this.state.order.status === 'accepted' || this.state.order.status === 'ontheway' || this.state.order.status === 'delivered' ? (<i className="fa fa-check-circle text-green-500"></i>) : (<i className="fa fa-times-circle text-red-500"></i>)}
                                            <span>Ready to collect</span>
                                        </div>
                                        <div className="flex items-center gap-2">
                                            {this.state.order.status === 'ontheway' || this.state.order.status === 'delivered' ? (<i className="fa fa-check-circle text-green-500"></i>) : (<i className="fa fa-times-circle text-red-500"></i>)}
                                            <span>On the way</span>
                                        </div>
                                        <div className="flex items-center gap-2">
                                            {this.state.order.status === 'delivered' ? (<i className="fa fa-check-circle text-green-500"></i>) : (<i className="fa fa-times-circle text-red-500"></i>)}
                                            <span>Delivered Order</span>
                                        </div>
                                    </div>
                                    <div className="py-2 border-b" style={{ paddingTop: '0.5rem', paddingBottom: '0.5rem' }}>
                                        <span className="block font-bold mb-2" style={{ display: 'block' }}>Destination</span>
                                        <span>{this.state.order.street_address} {this.state.order.city} {this.state.order.states} {this.state.order.country} {this.state.order.zip}</span>
                                    </div>
                                    <div className="py-2 border-b" style={{ paddingTop: '0.5rem', paddingBottom: '0.5rem' }}>
                                        <span className="block font-bold mb-2" style={{ display: 'block' }}>Products</span>
                                        {order_product_HTMLTABLE}
                                    </div>
                                    <div className="py-2">
                                        <div className="flex flex-wrap justify-between items-center py-1" style={{ justifyContent: 'space-between', WebkitBoxPack: 'justify' }}>
                                            <span>Subtotal:</span>
                                            <span>₹ 20.00</span>
                                        </div>
                                        <div className="flex flex-wrap justify-between items-center py-1" style={{ justifyContent: 'space-between', WebkitBoxPack: 'justify' }}>
                                            <span>Shipping:</span>
                                            <span>₹ 0.00</span>
                                        </div>
                                        <div className="flex flex-wrap justify-between items-center py-1" style={{ justifyContent: 'space-between', WebkitBoxPack: 'justify' }}>
                                            <span>Discount:</span>
                                            <span>₹ 0.00</span>
                                        </div>
                                        <div className="flex flex-wrap justify-between items-center font-bold py-1" style={{ justifyContent: 'space-between', WebkitBoxPack: 'justify' }}>
                                            <span>Total Cost:</span>
                                            <span>₹ {this.state.order.grandtotal}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}
export default Orders;