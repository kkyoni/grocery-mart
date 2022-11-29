import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
class BlogSingle extends Component {
    render() {
        return (
            <div>
                <Title />
                <Header />
                <div className="banner banner2">
                    <div className="container">
                        <h2>Blog Single</h2>
                    </div>
                </div>


                <div className="breadcrumb_dress">
                    <div className="container">
                        <ul>
                            <li><Link to={"/"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
                                <i>/</i></li>
                            <li>Blog Single</li>
                        </ul>
                    </div>
                </div>


                <section className="w3l-blog-post-main">
                    <div className="blog-content-inf py-5">
                        <div className="container py-lg-5 py-4">
                            <div className="blog-posthny-info">
                                <img className="img-fluid radius-image" src="assets/images/blog-single.jpg" alt="blog-single" />
                                <div className="single-post-image mt-4">
                                    <div className="post-content">
                                        <h5><a href="blog-single.html" className="primary-clr-bg mb-2">Groceries</a></h5>
                                        <h3 className="text-start mb-3">At vero eos et accusamus et iusto odio dignissimos</h3>
                                    </div>
                                </div>

                                <div className="single-post-content">
                                    <p className="mb-4">Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio
                                        consectetur.Ea consequuntur illum facere aperiam sequi optio consectetur adipisicing
                                        elitFuga,
                                        suscipit totam animi consequatur saepe blanditiis.Lorem ipsum dolor sit amet,Ea consequuntur
                                        illum facere aperiam sequi optio consectetur adipisicing elit..Lorem ipsum, dolor sit amet
                                        consectetur adipisicing elit. At, corrupti odit? At iure facere, porro repellat officia
                                        quas,
                                        dolores magnam assumenda soluta odit harum voluptate inventore ipsa maiores fugiat accusamus
                                        eos
                                        nulla. Iure voluptatibus explicabo officia.</p>
                                    <p className="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At, corrupti odit? At
                                        iure
                                        facere, porro repellat officia quas, dolores magnam assumenda soluta odit harum voluptate
                                        inventore ipsa maiores fugiat accusamus eos nulla. Iure voluptatibus explicabo officia.</p>
                                    <blockquote className="quote my-4">
                                        <q>
                                            Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio
                                            consectetur.Ea
                                            consequuntur illum facere aperiam sequi optio consectetur adipisicing elitFuga, suscipit
                                            totam
                                            animi consequatur.</q>
                                        <footer className="blockquote-footer mt-3">
                                            Alexander tony</footer>
                                    </blockquote>
                                    <p className="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                                        erat
                                        eu ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. . </p>

                                    <p className="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                                        erat
                                        eu ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                        culpa quis. . </p>
                                </div>
                                <div className="sing-post-thumb mb-lg-5 mb-4 row">
                                    <div className="col-sm-6">
                                        <a href="#url"><img src="assets/images/blog3.jpg" className="img-fluid radius-image" alt="blog3" /></a>
                                    </div>
                                    <div className="col-sm-6 mt-sm-0 mt-3">
                                        <a href="#url"><img src="assets/images/blog1.jpg" className="img-fluid radius-image" alt="blog1" /></a>
                                    </div>
                                </div>
                                <p className="mt-4">Vivamus a ligula quam. Ut blandit eu leo non suscipit. Anna
                                    Delpan In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque,Nulla
                                    quis
                                    lorem neque, mattis venenatis lectus. Delpan Deo
                                    In
                                    interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis
                                    lectus. Duis
                                    feugiat tortor sed.Nulla quis lorem neque, mattis venenatis lectus. In interdum
                                    ullamcorper
                                    dolor eu mattis.Nulla quis lorem neque</p>
                                <p className="mt-4 mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                                    erat
                                    eu ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                    culpa quis. . </p>

                                <p className="mb-4">Excepteur sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id
                                    erat
                                    eu ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in
                                    culpa quis.. </p>
                                <h3 className="title-small mt-4 mb-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h3>
                                <p className="mt-4">A ligula quam. Ut blandit eu leo non suscipit. Anna
                                    Delpan In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque,Nulla
                                    quis
                                    lorem neque, mattis venenatis lectus. Delpan Deo
                                    In
                                    interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis
                                    lectus. Duis
                                    feugiat tortor sed.Nulla quis lorem neque, mattis venenatis lectus. In interdum
                                    ullamcorper
                                    dolor eu mattis.Nulla quis lorem neque</p>
                                <ul className="share-post my-5">
                                    <li>
                                        <h4 className="side-title mr-4">Share this post :</h4>
                                    </li>
                                    <li>
                                        <a href="#link" className="facebook" title="Facebook">
                                            <span className="fab fa-facebook-f" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#link" className="twitter" title="Twitter">
                                            <span className="fab fa-twitter" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#link" className="instagram" title="Instagram">
                                            <span className="fab fa-instagram" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                </ul>

                                <div className="single-pagination">
                                    <a className="prev-post pull-left" href="#prev"><span className="fa fa-arrow-left"
                                        aria-hidden="true"></span>
                                        Previous Post</a>
                                    <a className="next-post pull-right" href="#next">Next Post <span className="fa fa-arrow-right"
                                        aria-hidden="true"></span></a>
                                </div>


                                <div className="comments mt-5">
                                    <h4 className="side-title ">Comments</h4>
                                    <div className="media mt-4">
                                        <div className="img-circle">
                                            <img src="assets/images/testi1.jpg" className="img-fluid" alt="testi1" />
                                        </div>
                                        <div className="media-body">

                                            <ul className="time-rply mb-2">
                                                <li><a href="#URL" className="name mt-0 mb-2 d-block">Alexander Smith</a>
                                                    Oct 10, 2021 - 10:02 pm

                                                </li>
                                                <li className="reply-last">
                                                    <a href="#reply" className="reply"><span className="fa fa-reply"
                                                        aria-hidden="true"></span>
                                                        Reply</a>
                                                </li>
                                            </ul>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat, hic reprehenderit
                                            eum
                                            cupiditate deleniti....
                                        </div>
                                    </div>

                                    <div className="media">
                                        <div className="img-circle">
                                            <img src="assets/images/testi2.jpg" className="img-fluid" alt="testi2" />
                                        </div>
                                        <div className="media-body">
                                            <ul className="time-rply mb-2">
                                                <li><a href="#URL" className="name mt-0 mb-2 d-block">Elizabeth ker</a>
                                                    Oct 11, 2021 - 12:30 pm

                                                </li>
                                                <li className="reply-last">
                                                    <a href="#reply" className="reply"><span className="fa fa-reply"
                                                        aria-hidden="true"></span>
                                                        Reply</a>
                                                </li>
                                            </ul>
                                            Ea consequuntur illum facere aperiam sequi optio consectetur adipisicing elitFuga,
                                            suscipit
                                            totam animi consequatur.....
                                            <div className="media second mt-4 p-2">
                                                <Link to={'#'} className="img-circle img-circle-sm">
                                                    <img src="assets/images/testi3.jpg" className="img-fluid" alt="testi3" />
                                                </Link>
                                                <div className="media-body">
                                                    <ul className="time-rply mb-2">
                                                        <li><a href="#URL" className="name mt-0 mb-2 d-block">Lisa Lindey</a>
                                                            Oct 11, 2021 - 14:20 pm

                                                        </li>
                                                        <li className="reply-last">
                                                            <a href="#reply" className="reply"><span className="fa fa-reply"
                                                                aria-hidden="true"></span> Reply</a>
                                                        </li>
                                                    </ul>
                                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                                    corrupti quos dolores et.....
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div className="leave-comment-form mt-lg-5 mt-4" id="comment">
                                    <h4 className="side-title mb-4">Add a Comment</h4>
                                    <form action="#" method="post">
                                        <div className="input-grids row">

                                            <div className="form-group col-lg-6">
                                                <input type="text" name="Name" className="form-control" placeholder="Your Name*"
                                                    required="" />
                                            </div>
                                            <div className="form-group col-lg-6">
                                                <input type="email" name="Email" className="form-control" placeholder="Email*"
                                                    required="" />
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <textarea name="Comment" className="form-control" placeholder="Your Comment*" required=""
                                                spellcheck="false"></textarea>
                                        </div>
                                        <div className="submit text-right">
                                            <button className="btn btn-style btn-style-primary">Post Comment </button>
                                        </div>
                                    </form>
                                </div>
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

export default BlogSingle;