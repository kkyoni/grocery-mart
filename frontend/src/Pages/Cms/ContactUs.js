import React, { Component } from "react";
import { Link } from 'react-router-dom';
import axios from "axios";
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import Iframe from 'react-iframe'
import { toast } from 'react-toastify';
class ContactUs extends Component {
    state = {
        user_id: '',
        first_name: '',
        last_name: '',
        email: '',
        message: '',
        isLoading: true,
        ButtonLoading: false,
        first_name_error: '',
        last_name_error: '',
        email_error: '',
        message_error: '',
    };
    async componentDidMount() {
        const login = JSON.parse(localStorage.getItem("userData"));
        this.setState({
            isLoading: true,
        });
        setTimeout(() => {
            this.setState({ isLoading: false, user_id: login?.id });
        }, 1000);
    }
    handleInput = (e) => {
        this.setState({
            [e.target.name]: e.target.value
        });
    }
    saveContact = async (e) => {
        this.setState({ ButtonLoading: true });
        e.preventDefault();
        const res = await axios.post('http://127.0.0.1:8000/api/add-contact', this.state);
        if (res.data.status === "success") {
            toast.success("Conatct Inquiry", { position: toast.POSITION.TOP_RIGHT });
            this.setState({
                first_name: '',
                last_name: '',
                email: '',
                message: '',
                ButtonLoading: false,
            });
        } else {
            this.setState({
                first_name_error: res.data.first_name_error,
                last_name_error: res.data.last_name_error,
                email_error: res.data.email_error,
                message_error: res.data.message_error,
            });
            setTimeout(() => {
                this.setState({ first_name_error: "", last_name_error: "", email_error: "", message_error: "",ButtonLoading: false });
            }, 2000);
            toast.error("Conatct Inquiry", { position: toast.POSITION.TOP_RIGHT });
            this.props.history.push('/contact-us');
        }
    }
    render() {
        const ButtonLoading = this.state.ButtonLoading;
        return (
            <div>
                <Title isLoadingPage={this.state.isLoading} />
                <Header />
                <div className="banner banner2">
                    <div className="container">
                        <h2>Contact Us</h2>
                    </div>
                </div>
                <div className="breadcrumb_dress">
                    <div className="container">
                        <ul>
                            <li><Link to={"/home"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
                                <i>/</i></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
                <section className="w3l-contact py-5" id="contact">
                    <div className="container py-lg-5 py-4">
                        <div className="row contact-block">
                            <div className="col-md-6 contact-left pe-lg-5">
                                <h3 className="mb-sm-4 mb-3">Contact Info</h3>
                                <p className="cont-para mb-sm-5 mb-4">We enjoy discussing new projects and design challenges. Please
                                    share as
                                    much info, as possible so
                                    we can get the most out of our first catch-up.</p>
                                <div className="cont-details">
                                    <p><i className="fas fa-map-marker-alt"></i>10001, 5th Avenue, 12202 street, USA.</p>
                                    <p><i className="fas fa-phone-alt"></i><a href="tel:+1(21) 234 4567">+1(21) 112 7368</a></p>
                                    <p><i className="fas fa-envelope-open-text"></i><a href="mailto:example@mail.com"
                                        className="mail">example@mail.com</a></p>
                                </div>
                                <h4 className="mb-3 mt-5">Follow Us</h4>
                                <ul className="social-icons-contact">
                                    <li>
                                        <a href="#twitter">
                                            <i className="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#facebook">
                                            <i className="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#linkedinin">
                                            <i className="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#github">
                                            <i className="fab fa-github"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#instagram">
                                            <i className="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div className="col-md-6 contact-right mt-md-0 mt-5 ps-lg-0">
                                <form method="post" className="signin-form" onSubmit={this.saveContact}>
                                    <div className="input-grids">
                                        <input type="text" className="contact-input" id="w3lName" name="first_name" placeholder="Your First Name*" onChange={this.handleInput} value={this.state.first_name} required="" />
                                        <p className="text-danger" style={{ color: "red" }}>{this.state.first_name_error}</p>
                                        <input type="text" className="contact-input" id="w3lName" name="last_name" placeholder="Your Last Name*" onChange={this.handleInput} value={this.state.last_name} required="" />
                                        <p className="text-danger" style={{ color: "red" }}>{this.state.last_name_error}</p>
                                        <input type="email" className="contact-input" id="w3lSender" name="email" placeholder="Your Email*" onChange={this.handleInput} value={this.state.email} required="" />
                                        <p className="text-danger" style={{ color: "red" }}>{this.state.email_error}</p>
                                    </div>
                                    <div className="form-input">
                                        <textarea className="form-control" name="message" id="w3lMessage" placeholder="Type your message here*" onChange={this.handleInput} value={this.state.message} required=""></textarea>
                                        <p className="text-danger" style={{ color: "red" }}>{this.state.message_error}</p>
                                    </div>
                                    <button className="btn btn-style">
                                        {ButtonLoading ? (
                                            <i className="fa fa-refresh fa-spin"></i>
                                        ) : (
                                            <span>Send Message</span>
                                        )}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <div className="map-iframe">
                    <Iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2spl!4v1562654563739!5m2!1sen!2spl"
                        width="100%" height="400" frameborder="0" style={{ border: '0px' }} allowfullscreen="" />
                </div>
                <Newsletter />
                <Footer />
            </div>
        )
    }
}
export default ContactUs;