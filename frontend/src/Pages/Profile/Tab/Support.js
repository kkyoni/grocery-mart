import React, { Component } from "react";
import axios from "axios";
import { toast } from 'react-toastify';
class Support extends Component {
    state = {
        supportname: '',
        supportemail: '',
        supportmessage: '',
    };
    handleInput = (e) => {
        this.setState({
            [e.target.name]: e.target.value
        })
    }
    saveSupport = async (e) => {
        e.preventDefault();
        const res = await axios.post('http://127.0.0.1:8000/api/add-support', this.state);
        if (res.data.status === "success") {
            toast.success("Support Success", { position: toast.POSITION.TOP_RIGHT });
            this.setState({
                supportname: '',
                supportemail: '',
                supportmessage: '',
            });
        } else {
            toast.error("Support Error", { position: toast.POSITION.TOP_RIGHT });
            this.props.history.push('/contact');
        }
    }
    render() {
        return (
            <section className="w3l-contact" id="contact">
                <div className="container">
                    <div className="row contact-block">
                        <div className="col-md-6 contact-left pe-lg-5">
                            <h3 className="mb-sm-4 mb-3" style={{ lineHeight: "18px" }}>Support</h3>
                            <p className="cont-para mb-sm-5 mb-4" style={{ marginBottom: "2rem" }}>We enjoy discussing new projects and design challenges.</p>
                            <div className="cont-details">
                                <p><i className="fas fa-map-marker-alt"></i>5th Avenue, 12202 street, USA.</p>
                                <p><i className="fas fa-phone-alt"></i><a href="tel:+1(21) 234 4567">+1(21) 112 7368</a></p>
                                <p><i className="fas fa-envelope-open-text"></i><a href="mailto:example@mail.com"
                                    className="mail">example@mail.com</a></p>
                            </div>
                        </div>
                        <div className="col-md-6 contact-right mt-md-0 mt-5 ps-lg-0">
                            <form className="signin-form" onSubmit={this.saveSupport} encType="multipart/form-data" method="post">
                                <div className="input-grids">
                                    <div className="form-input">
                                        <input type="text" className="contact-input" id="w3lName" name="supportname" onChange={this.handleInput} value={this.state.supportname} placeholder="Name" required />
                                    </div>
                                    <div className="form-input">
                                        <input type="email" className="contact-input" id="w3lSender" name="supportemail" onChange={this.handleInput} value={this.state.supportemail} placeholder="johndoe@example.com" required />
                                    </div>
                                </div>
                                <div className="form-input">
                                    <textarea className="form-control" name="supportmessage" id="w3lMessage" placeholder="How can we help?" onChange={this.handleInput} value={this.state.supportmessage} required></textarea>
                                </div>
                                <button className="btn btn-style">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}
export default Support;