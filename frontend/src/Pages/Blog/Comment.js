import React, { Component } from "react";
import { toast } from 'react-toastify';
import Service from "../../services/Service";
import moment from "moment";
import { Link } from "react-router-dom";
class Comment extends Component {
    constructor(props) {
        super(props)
        this.state = {
            isLoading: false,
            comment: '',
            blog_id: '',
            user_id: '',
            Comment: {},
            photo: 'http://127.0.0.1:8000/storage/avatar/',
        }
    }
    async componentDidMount() {
        const login = JSON.parse(localStorage.getItem("userData"));
        Service.getComment(this.props.blog_id).then(res => {
            if (res.data.status === 'success') {
                this.setState({ Comment: res.data.Comment, user_id: login.id, blog_id: this.props.blog_id, connection: true, notrecordloading: true });
            } else {
                this.setState({ Comment: [], user_id: login.id, blog_id: this.props.blog_id, connection: true, notrecordloading: false });
            }
        })
    }
    handleInput = (e) => {
        this.setState({
            [e.target.name]: e.target.value
        });
    }
    saveComment = async (e) => {
        this.setState({ isLoading: true });
        e.preventDefault();
        var data = {
            user_id: this.state.user_id,
            blog_id: this.state.blog_id,
            comment: this.state.comment
        };
        Service.CreateComment(data).then((res) => {
            if (res.data.status === "success") {
                toast.success("Comment success", { position: toast.POSITION.TOP_RIGHT });
                if (res.data.status === 'success') {
                    this.setState({ comment: '', isLoading: false, Comment: res.data.Comment, connection: true, notrecordloading: true });
                } else {
                    this.setState({ comment: '', isLoading: false, Comment: [], connection: true, notrecordloading: false });
                }
            } else {
                toast.error(res.data.message, { position: toast.POSITION.TOP_RIGHT });
                setTimeout(() => {
                    this.setState({ comment: '', isLoading: false });
                }, 2000);
            }
        });
    }
    render() {
        const isLoading = this.state.isLoading;
        var Comment_HTMLTABLE = "";
        if (this.state.connection) {
            if (this.state.notrecordloading) {
                Comment_HTMLTABLE =
                    this.state.Comment.map((item, i) => {
                        return (
                            <div className="media mt-4" key={i}>
                                {item.user_details.map((type, i) => {
                                    return <>
                                        <div className="img-circle">
                                            <img src={this.state.photo + type.avatar} alt={type.avatar} className="img-fluid" />
                                        </div>
                                        <div className="media-body">
                                            <ul className="time-rply mb-2">
                                                <li><Link className="name mt-0 mb-2 d-block">{type.first_name} {type.last_name}</Link>
                                                    {moment(item.updated_at).format('ll')} - {moment(item.updated_at).format('LT')}
                                                </li>
                                            </ul>
                                            {item.comment.substring(0, 100)}...
                                        </div>
                                    </>
                                })}
                            </div>
                        );
                    });
            } else {
                Comment_HTMLTABLE = <img src='../assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "10%", height: "1%" }} />
            }
        } else {
            Comment_HTMLTABLE = <img src='../assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "100%", height: "1%" }} />
        }
        return (
            <div>
                <div className="comments mt-5">
                    <h4 className="side-title ">Comments</h4>
                    {Comment_HTMLTABLE}
                </div>
                <div className="leave-comment-form mt-lg-5 mt-4" id="comment">
                    <h4 className="side-title mb-4">Add a Comment</h4>
                    <form method="post" onSubmit={this.saveComment}>
                        <input type="hidden" name="blog_id" value={this.state.blog_id} />
                        <input type="hidden" name="user_id" value={this.state.user_id} />
                        <div className="form-group">
                            <textarea className="form-control" name="comment" id="w3lMessage" placeholder="Type Comment*" onChange={this.handleInput} value={this.state.comment} required=""></textarea>
                        </div>
                        <div className="submit text-right">
                            <button className="btn btn-style btn-style-primary">
                            {isLoading ? (<span>please wait...</span>) : (<span>Post Comment</span>)}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        )
    }
}
export default Comment;