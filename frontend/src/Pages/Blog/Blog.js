import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import axios from "axios";
class Blog extends Component {
    constructor(props) {
        super(props)
        this.state = {
            blog: [],
            loading: false,
            Data: false,
        }
    }
    async componentDidMount() {
        const res = await axios.get('http://127.0.0.1:8000/api/getblog');
        if (res.data.status === 'success') {
            if (res.data.blog.length === 0) {
                this.setState({ blog: [], dataLoaded: true, error: false, Data: false });
            } else {
                this.setState({ blog: res.data.blog, dataLoaded: true, error: false, Data: true });
            }
        }
    }

    render() {
        var blog_HTMLTABLE = "";
        if (this.state.dataLoaded) {
            if (this.state.Data) {
                blog_HTMLTABLE =
                    this.state.blog.map((item, i) => {
                        return (
                            <div>

                                <div key={i} className="row top-cont-grid top-space align-items-center">
                                    <div className="col-lg-6 left-cont left-order mt-lg-0 mt-5 pe-lg-4">
                                        <h4> <Link to={"/blog-single"}>{item.title}</Link></h4>
                                        <div className="d-flex align-items-center mt-3">
                                            <h6><i className="fas fa-user"></i><a href="#author"> Admin</a></h6>
                                            <h6 className="mx-3"><i className="fas fa-clock"></i> 7:00 pm - 8:00 pm</h6>
                                            <h6><i className="fas fa-calendar-alt"></i>Oct 12</h6>
                                        </div>
                                        <p className="mt-3">{item.description}</p>
                                        <Link to={"/blog-single"} className="btn btn-style mt-4">Read More</Link>
                                    </div>
                                    <div className="col-lg-6 right-img">
                                        <img src="assets/images/blog2.jpg" alt="blog2" className="img-fluid radius-image img-shadow" />
                                    </div>
                                </div>

                                <div className="row top-cont-grid top-space align-items-center">
                                    <div className="col-lg-6">
                                        <img src="assets/images/blog3.jpg" alt="blog3" className="img-fluid radius-image img-shadow" />
                                    </div>
                                    <div className="col-lg-6 left-cont mt-lg-0 mt-5 ps-lg-4">
                                        <h4><Link to={"/blog-single"}>Deleniti atque corrupti</Link></h4>
                                        <div className="d-flex align-items-center mt-3">
                                            <h6><i className="fas fa-user"></i><a href="#author"> Johnson</a></h6>
                                            <h6 className="mx-3"><i className="fas fa-clock"></i> 7:00 pm - 8:00 pm</h6>
                                            <h6><i className="fas fa-calendar-alt"></i>Oct 14</h6>
                                        </div>
                                        <p className="mt-3">Sed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae
                                            fringilla
                                            sapien.</p>
                                        <p className="mt-3 mb-2">Sed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus
                                            vitae fringilla
                                            sapien,
                                            quis dictum mi. Quisque consectetur egestas.Lorem ipsum dolor sit amet, consectetur
                                            adipiscing
                                            elit.</p>
                                        <Link to={"/blog-single"} className="btn btn-style mt-4">Read More</Link>
                                    </div>
                                </div>
                            </div>
                        );
                    });
            } else {
                blog_HTMLTABLE = <div><h2>Not Data Found ...</h2></div>
            }
        } else {
            blog_HTMLTABLE = <div><h2>Loading ...</h2></div>;
        }
        return (
            <div>
                <Title />
                <Header />
                <div className="banner banner2">
                    <div className="container">
                        <h2>Blog Posts</h2>
                    </div>
                </div>

                <div className="breadcrumb_dress">
                    <div className="container">
                        <ul>
                            <li><Link to={"/"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
                                <i>/</i></li>
                            <li>Blog Posts</li>
                        </ul>
                    </div>
                </div>

                <section className="w3l-text-6">
                    <div className="text-6-mian bottom-space py-5">
                        <div className="container py-md-5 py-4">

                            {blog_HTMLTABLE}


                            <div className="pagination-style text-center mt-5 pt-5">
                                <ul>
                                    <li> <a href="#none" className="not-allowed" disabled="">
                                        <span className="fa fa-angle-double-left" aria-hidden="true"></span>
                                    </a>
                                    </li>
                                    <li><a className="active" href="#page">1</a></li>
                                    <li>
                                        <a href="#page">2</a>
                                    </li>
                                    <li>
                                        <a href="#page">3</a>
                                    </li>
                                    <li>
                                        <a href="#page"><span className="fa fa-angle-double-right" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>
                <Newsletter />
                <Footer />
            </div>
        )
    }
}

export default Blog;