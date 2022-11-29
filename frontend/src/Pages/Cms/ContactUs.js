import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import Iframe from 'react-iframe'
class ContactUs extends Component {
    render() {
        return (
            <div>
                <Title />
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
                                <form action="#" method="post" className="signin-form">
                                    <div className="input-grids">
                                        <input type="text" name="w3lName" id="w3lName" placeholder="Your Name*"
                                            className="contact-input" required="" />
                                        <input type="email" name="w3lSender" id="w3lSender" placeholder="Your Email*"
                                            className="contact-input" required="" />
                                        <input type="text" name="w3lSubect" id="w3lSubect" placeholder="Subject*"
                                            className="contact-input" required="" />
                                        <input type="text" name="w3lWebsite" id="w3lWebsite" placeholder="Website URL*"
                                            className="contact-input" required="" />
                                    </div>
                                    <div className="form-input">
                                        <textarea name="w3lMessage" id="w3lMessage" placeholder="Type your message here*"
                                            required=""></textarea>
                                    </div>
                                    <button className="btn btn-style">Send Message</button>
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