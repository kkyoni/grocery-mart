import React, { Component } from "react";
import { Link } from 'react-router-dom';
import { Button, Form, Input } from "reactstrap";
import axios from "axios";
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
class Title extends Component {
    constructor(props) {
        super(props);
        this.state = {
            email: "",
            password: "",
            code: "",
            msg: "",
            isLoading: false,
            redirect: false,
            errMsgEmail: "",
            errMsgPwd: "",
            errMsg: "",
            otp: false,
            openModel: false,
        };
    }
    setOpenModal = (e) => {
        this.setState({
            openModel: e,
            redirect: true,
        });
    };
    onChangehandler = (e) => {
        let name = e.target.name;
        let value = e.target.value;
        let data = {};
        data[name] = value;
        this.setState(data);
    };
    onChangeOtphandler = (e) => {
        let name = e.target.name;
        let value = e.target.value;
        let data = {};
        data[name] = value;
        this.setState(data);
    };
    onOtpHandler = () => {
        const otpemail = localStorage.getItem("otpemail");
        this.setState({ isLoading: true });
        axios
            .post("http://127.0.0.1:8000/api/verifyOtp", {
                email: otpemail,
                otp_number: this.state.code,
            })
            .then((res) => {
                this.setState({ isLoading: false });
                if (res.data.status === 'success') {
                    localStorage.setItem("isLoggedIn", true);
                    localStorage.removeItem('otpemail');
                    this.setState({
                        msg: res.data.message,
                        redirect: true,
                    });
                    this.setState({ otp: false });
                    this.setState({ openModel: false });
                    toast.success(res.data.message, { position: toast.POSITION.TOP_RIGHT });
                } else {
                    toast.error(res.data.message, { position: toast.POSITION.TOP_RIGHT });
                }
            })
            .catch((error) => {
                console.log(error);
            });
    }
    onResetOtpHandler = () => {
        const otpemail = localStorage.getItem("otpemail");
        this.setState({ isLoading: true });
        axios
            .post("http://127.0.0.1:8000/api/sendOtp", {
                email: otpemail,
            })
            .then((res) => {
                this.setState({ isLoading: false });
                if (res.data.status === 'success') {
                    this.setState({
                        msg: res.data.message,
                        redirect: true,
                    });
                    toast.success(res.data.message, { position: toast.POSITION.TOP_RIGHT });
                } else {
                    toast.error(res.data.message, { position: toast.POSITION.TOP_RIGHT });
                }
            })
            .catch((error) => {
                console.log(error);
            });
    }
    onSignInHandler = () => {
        this.setState({ isLoading: true });
        axios
            .post("http://127.0.0.1:8000/api/login", {
                email: this.state.email,
                password: this.state.password,
            })
            .then((res) => {
                this.setState({ isLoading: false });
                if (res.data.status === 'success') {
                    localStorage.setItem("userData", JSON.stringify(res.data.data));
                    localStorage.setItem("otpemail", this.state.email);
                    this.setState({ otp: true });
                    this.setState({
                        msg: res.data.message,
                        redirect: true,
                    });
                    toast.success(res.data.message, { position: toast.POSITION.TOP_RIGHT });
                } else {
                    toast.error(res.data.message, { position: toast.POSITION.TOP_RIGHT });
                }
            })
            .catch((error) => {
                console.log(error);
            });
    };
    onLogoutHandler = () => {
        localStorage.removeItem('userData');
        localStorage.removeItem('isLoggedIn');
        this.setState({ navigate: true });
        toast.success("logout in successfully ⚡️", { position: toast.POSITION.TOP_RIGHT });
    };
    render() {
        const isLoading = this.state.isLoading;
        const otpmodal = this.state.otp;
        const otplogin = localStorage.getItem("isLoggedIn");
        const login = JSON.parse(localStorage.getItem("userData"));
        return (
            <div>
                <div className="header" id="home1">
                    <div className="container">
                        <div className="d-flex align-items-center justify-content-between">
                            {otplogin && login ? (
                                <div className="w3l_login">
                                    <button onClick={this.onLogoutHandler} style={{ fontSize: '18px', color: 'var(--heading-color)', width: '45px', height: '45px', lineHeight: '45px', display: 'block', textAlign: 'center', border: '1px solid var(--border-color-light)', borderRadius: '50%' }}> <i
                                        class="fas fa-sign-out-alt"></i> </button>
                                </div>
                            ) : (
                                <div className="w3l_login">
                                    <a href="javascript:void(0)" onClick={() => this.setOpenModal(true)} data-bs-toggle="modal" data-bs-target="#myModal12"><i
                                        class="fas fa-user"></i></a>
                                </div>
                            )}
                            <div className="w3l_logo text-center ml-auto">
                                <h1><Link to={"/home"}>Grocery Mart<span>Online Grocery Shopping</span></Link></h1>
                            </div>
                            <div className="cart cart box_1">
                            </div>
                        </div>
                    </div>
                </div>
                {this.state.openModel ? (
                    <div class="modal fade" id="myModal12" tabindex="-1" aria-labelledby="myModal12" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick={() => this.setOpenModal(false)}></button>
                                </div>
                                <div className="row modal-body">
                                    {otpmodal ? (
                                        <div>
                                            <ul className="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                <li className="nav-item" role="presentation">
                                                    <button className="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                                        type="button" role="tab" aria-controls="home" aria-selected="true">Otp</button>
                                                </li>
                                            </ul>
                                            <div className="tab-content p-0" id="myTabContent">
                                                <div className="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div className="register">
                                                        <Form>
                                                            <Input type="text" name="code" placeholder="OTP" value={this.state.code} onChange={this.onChangeOtphandler} />
                                                            <br />
                                                            <div className="sign-up">
                                                                <Button className="buttonload text-center mb-4 btn button-eff" color="success" onClick={this.onOtpHandler} > Verify OTP
                                                                    {isLoading ? (
                                                                        <i class="fa fa-refresh fa-spin"></i>
                                                                    ) : (
                                                                        <span></span>
                                                                    )}
                                                                </Button>
                                                                <Button className="buttonload text-center mb-4 btn button-eff" color="success" onClick={this.onResetOtpHandler} style={{ float: 'right' }}> Reset OTP
                                                                    {isLoading ? (
                                                                        <i class="fa fa-refresh fa-spin"></i>
                                                                    ) : (
                                                                        <span></span>
                                                                    )}
                                                                </Button>
                                                            </div>
                                                        </Form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    ) : (
                                        <div>
                                            <ul className="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                <li className="nav-item" role="presentation">
                                                    <button className="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                                        type="button" role="tab" aria-controls="home" aria-selected="true">Login</button>
                                                </li>
                                                <li className="nav-item" role="presentation">
                                                    <button className="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                                        type="button" role="tab" aria-controls="profile" aria-selected="false">Register</button>
                                                </li>
                                            </ul>
                                            <div className="tab-content p-0" id="myTabContent">
                                                <div className="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div className="register">
                                                        <Form>
                                                            <Input type="text" name="email" placeholder="Email Address" value={this.state.email} onChange={this.onChangehandler} />
                                                            <span className="text-danger">{this.state.msg}</span>
                                                            <span className="text-danger">{this.state.errMsgEmail}</span>
                                                            <Input type="password" name="password" placeholder="Password" value={this.state.password} onChange={this.onChangehandler} />
                                                            <span className="text-danger">{this.state.errMsgPwd}</span>
                                                            <p className="text-danger" style={{ color: "red" }}>{this.state.errMsg}</p>
                                                            <br />
                                                            <div className="sign-up">
                                                                <Button className="buttonload text-center mb-4 btn button-eff" color="success" onClick={this.onSignInHandler} > Sign in
                                                                    {isLoading ? (
                                                                        <i class="fa fa-refresh fa-spin"></i>
                                                                    ) : (
                                                                        <span></span>
                                                                    )}
                                                                </Button>
                                                                <div className="">Forget Password</div>
                                                            </div>
                                                        </Form>
                                                    </div>
                                                </div>
                                                <div className="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div className="register">
                                                        <form action="#" method="post">
                                                            <input placeholder="Name" name="Name" type="text" required="" />
                                                            <input placeholder="Email Address" name="Email" type="email" required="" />
                                                            <input placeholder="Password" name="Password" type="password" required="" />
                                                            <input placeholder="Confirm Password" name="Password" type="password" required="" />
                                                            <div className="sign-up">
                                                                <input type="submit" value="Create Account" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    )}

                                </div>
                            </div>
                        </div>
                    </div>
                ) : ("")}
            </div>
        )
    }
}
export default Title;