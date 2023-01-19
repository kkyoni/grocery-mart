import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
import Service from "../../services/Service";
import Comment from "./Comment";
import { InlineShareButtons } from 'sharethis-reactjs';
class BlogSingle extends Component {
    constructor(props) {
        super(props)
        this.state = {
            id: this.props.match.params.id,
            isLoading: true,
            photo: 'http://127.0.0.1:8000/storage/blog/',
            blogdetail: {}
        }
    }
    async componentDidMount() {
        this.setState({
            isLoading: true,
        });
        setTimeout(() => {
            this.setState({ isLoading: false });
        }, 1000);
        Service.getSingleBlogById(this.state.id).then(res => {
            this.setState({ blogdetail: res.data.blogdetail });
        })
    }
    render() {
        const SingleBlog = this.state.blogdetail;
        const title = this.state.blogdetail.title;
        const description = this.state.blogdetail.description;
        const url = "http://localhost:3000/blog-single/"+this.state.id;
        return (
            <div>
                <Title isLoadingPage={this.state.isLoading} />
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
                                <img className="img-fluid radius-image" src={this.state.photo + SingleBlog.image} alt={SingleBlog.image} />
                                <div className="single-post-image mt-4">
                                    <div className="post-content">
                                        <h3 className="text-start mb-3">{SingleBlog.title}</h3>
                                    </div>
                                </div>
                                <div className="single-post-content">{SingleBlog.description}</div>
                                <ul className="share-post my-5">
                                    <li>
                                        <h4 className="side-title mr-4">Share this post :</h4>
                                    </li>
                                    <br />
                                    <br />
                                    <InlineShareButtons
                                        config={{
                                            alignment: 'left',
                                            color: 'white',
                                            enabled: true,
                                            font_size: 10,
                                            labels: 'null',
                                            language: 'en',
                                            networks: [
                                                'facebook',
                                                'whatsapp',
                                                'linkedin',
                                                'messenger',
                                                'twitter'
                                            ],
                                            padding: 10,
                                            radius: 50,
                                            show_total: false,
                                            size: 35,
                                            url: url,
                                            image: 'https://bit.ly/2CMhCMC',
                                            description: { description },
                                            title: { title },
                                            message: { description },
                                            subject: { title },
                                            username: 'custom twitter handle'
                                        }}
                                    />
                                </ul>
                                <Comment blog_id={this.props.match.params.id} />
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