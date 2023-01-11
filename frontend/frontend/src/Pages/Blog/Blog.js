import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import Service from "../../services/Service";
import moment from "moment";
class Blog extends Component {
    constructor(props) {
        super(props)
        this.state = {
            blog: [],
            isLoading: true,
            photo: 'http://127.0.0.1:8000/storage/blog/',
        }
    }
    async componentDidMount() {
        this.setState({
            isLoading: true,
        });
        setTimeout(() => {
            this.setState({ isLoading: false });
        }, 1000);

        Service.getBlog().then((res) => {
			if (res.data.status === 'success') {
				this.setState({ blog: res.data.blog, connection: true, notrecordloading: true });
			} else {
				this.setState({ blog: [], connection: true, notrecordloading: false });
			}
		});
    }
    viewBlog(id) {
        this.props.history.push(`/blog-single/${id}`);
    }
    render() {
        var blog_HTMLTABLE = "";
        if (this.state.connection) {
            if (this.state.notrecordloading) {
                blog_HTMLTABLE =
                    this.state.blog.map((item, i) => {
                        return (
                            <div key={i} className="row top-cont-grid top-space align-items-center">
                                {item.number === 'even' ? (
                                    <div className="row top-cont-grid align-items-center">
                                        <div className="col-lg-6">
                                            <img src={this.state.photo + item.image} alt={item.image} className="img-fluid radius-image img-shadow" />
                                        </div>
                                        <div className="col-lg-6 left-cont mt-lg-0 mt-5 ps-lg-4">
                                            <h4><Link onClick={() => this.viewBlog(item.id)}>{item.title}</Link></h4>
                                            <div className="d-flex align-items-center mt-3">
                                                <h6><i className="fas fa-user"></i><a href="#author"> Admin</a></h6>
                                                <h6 className="mx-3"><i className="fas fa-clock"></i> {moment(item.created_at).format('LT')} - {moment(item.updated_at).format('LT')}</h6>
                                                <h6><i className="fas fa-calendar-alt"></i>{moment(item.updated_at).format('ll')}</h6>
                                            </div>
                                            <p className="mt-3">{item.description}</p>
                                            <Link onClick={() => this.viewBlog(item.id)} className="btn btn-style mt-4">Read More</Link>
                                        </div>
                                    </div>
                                ) : (
                                    <div className="row top-cont-grid align-items-center">
                                        <div className="col-lg-6 left-cont mt-lg-0 mt-5 ps-lg-4">
                                            <h4><Link onClick={() => this.viewBlog(item.id)}>{item.title}</Link></h4>
                                            <div className="d-flex align-items-center mt-3">
                                                <h6><i className="fas fa-user"></i><a href="#author"> Admin</a></h6>
                                                <h6 className="mx-3"><i className="fas fa-clock"></i> {moment(item.created_at).format('LT')} - {moment(item.updated_at).format('LT')}</h6>
                                                <h6><i className="fas fa-calendar-alt"></i>{moment(item.updated_at).format('ll')}</h6>
                                            </div>
                                            <p className="mt-3">{item.description}</p>
                                            <Link onClick={() => this.viewBlog(item.id)} className="btn btn-style mt-4">Read More</Link>
                                        </div>
                                        <div className="col-lg-6 right-img">
                                            <img src={this.state.photo + item.image} alt={item.image} className="img-fluid radius-image img-shadow" />
                                        </div>
                                    </div>
                                )}
                            </div>
                        );
                    });
            } else {
                blog_HTMLTABLE = <img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "100%", height: "1%" }} />
            }
        } else {
            blog_HTMLTABLE = <img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "100%", height: "1%" }} />
        }
        return (
            <div>
                <Title />
                <Header isLoading={this.state.isLoading} />
                <div className="banner banner2">
                    <div className="container"> <h2>Blog Posts</h2> </div>
                </div>

                <div className="breadcrumb_dress">
                    <div className="container">
                        <ul>
                            <li><Link to={"/"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link><i>/</i></li>
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
                                    <li><Link className="not-allowed" disabled=""><span className="fa fa-angle-double-left" aria-hidden="true"></span></Link></li>
                                    <li><Link className="active" href="#page">1</Link></li>
                                    <li><Link>2</Link></li>
                                    <li><Link>3</Link></li>
                                    <li><Link><span className="fa fa-angle-double-right" aria-hidden="true"></span></Link></li>
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