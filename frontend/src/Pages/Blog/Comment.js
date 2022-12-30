import React, { Component } from "react";
import { toast } from 'react-toastify';
import axios from "axios";
import Service from "../../services/Service";
import moment from "moment";
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
            this.setState({
                Comment: res.data.Comment,
                user_id: login.id,
                blog_id: this.props.blog_id,
                connection: true,
                notrecordloading: false
            });
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
        const res = await axios.post('http://127.0.0.1:8000/api/add-Comment', this.state);
        if (res.data.status === "success") {
            toast.success("Comment success", { position: toast.POSITION.TOP_RIGHT });
            this.setState({
                comment: '',
                isLoading: false,
                Comment: res.data.Comment,
                connection: true,
                notrecordloading: false
            });
        } else {
            toast.error(res.data.message, { position: toast.POSITION.TOP_RIGHT });
        }
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
                                                <li><a href="#URL" className="name mt-0 mb-2 d-block">{type.first_name} {type.last_name}</a>
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
                Comment_HTMLTABLE = <img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "100%", height: "1%" }} />
            }
        } else {
            Comment_HTMLTABLE = <img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "100%", height: "1%" }} />
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
                                {isLoading ? (
                                    <i className="fa fa-refresh fa-spin"></i>
                                ) : (
                                    <span>Post Comment</span>
                                )}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        )
    }
}
export default Comment;