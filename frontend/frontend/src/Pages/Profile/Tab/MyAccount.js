import React, { Component } from "react";
import axios from "axios";
import swal from "sweetalert";
class MyAccount extends Component {
    state = {
        profile_id: '',
        first_name: '',
        last_name: '',
        email: '',
        avatar: '',
        errMsgFirstName: '',
        errMsgLastName: '',
        errMsgEmail: '',
        image: '',
        photo: 'http://127.0.0.1:8000/storage/avatar/',
    };
    async componentDidMount() {
        const login = JSON.parse(localStorage.getItem("userData"));
        this.setState({
            profile_id: login.id,
            first_name: login.first_name,
            last_name: login.last_name,
            email: login.email,
            avatar: login.avatar,
        });
    }
    handleInput = (e) => {
        this.setState({
            [e.target.name]: e.target.value
        })
    }
    handleInputChange = (e) => {
        this.setState({
            image: e.target.files[0],
        })
    }
    saveProfile = async (e) => {
        e.preventDefault();
        const url = "http://127.0.0.1:8000/api/profile";
        const data = new FormData();
        data.append('profile_id', this.state.profile_id)
        data.append('first_name', this.state.first_name)
        data.append('last_name', this.state.last_name)
        data.append('email', this.state.email)
        data.append('image', this.state.image)
        axios.post(url, data).then(res => {
            if (res.data.status === "success") {
                swal({
                    title: "Success!",
                    text: res.data.message,
                    icon: "success",
                    button: "Ok!",
                });
                localStorage.setItem("isLoggedIn", true);
                localStorage.setItem("userData", JSON.stringify(res.data.user));
                this.setState({
                    profile_id: res.data.user.id,
                    first_name: res.data.user.first_name,
                    last_name: res.data.user.last_name,
                    email: res.data.user.email,
                    avatar: res.data.user.avatar,
                })
            } else if (res.data.status === "validtion") {
                this.setState({
                    errMsgFirstName: res.data.firstnamemessage,
                    errMsgLastName: res.data.lastnamemessage,
                    errMsgEmail: res.data.emailmessage,
                });
                setTimeout(() => {
                    this.setState({ errMsgFirstName: "", errMsgLastName: "", errMsgEmail: "" });
                }, 2000);
            } else {
                swal({
                    title: "Warning!",
                    text: res.data.message,
                    icon: "warning",
                    button: "Ok!",
                });
                this.props.history.push('/profile');
            }
        })
    }
    render() {
        return (
            <section className="w3l-contact" id="contact">
                <div className="container">
                    <div className="row contact-block">
                        <div className="col-md-12 contact-right mt-md-0 mt-5 ps-lg-0">
                            <form className="signin-form" onSubmit={this.saveProfile} encType="multipart/form-data" method="post">
                                <div className="input-grids">
                                    <center><img src={this.state.photo + this.state.avatar} alt="user-img" className="rounded-circle" height={100} width={100} /></center>
                                    <div className="form-input">
                                        <input type="file" className="input form-control" id="formFile" name="avatar" onChange={this.handleInputChange} />
                                    </div>
                                    <div className="form-input">
                                        <input type="text" className="contact-input" id="w3lName" name="first_name" onChange={this.handleInput} value={this.state.first_name} placeholder="First Name" />
                                        <span className="text-danger">{this.state.errMsgFirstName}</span>
                                    </div>
                                    <div className="form-input">
                                        <input type="text" className="contact-input" id="w3lName" name="last_name" onChange={this.handleInput} value={this.state.last_name} placeholder="Last Name" />
                                        <span className="text-danger">{this.state.errMsgLastName}</span>
                                    </div>
                                    <div className="form-input">
                                        <input type="email" className="contact-input" id="w3lSender" name="email" onChange={this.handleInput} value={this.state.email} placeholder="johndoe@example.com" />
                                        <span className="text-danger">{this.state.errMsgEmail}</span>
                                    </div>
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
export default MyAccount;