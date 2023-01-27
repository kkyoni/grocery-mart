import React, { Component } from "react";
import { Link } from 'react-router-dom';
import { Button, Form, Input } from "reactstrap";
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import Service from "../services/Service";
import Loader from './Loader';
class Title extends Component {
    constructor(props) {
        super(props);
        this.state = {
            email: "",
            password: "",
            code: "",
            msg: "",
            isLoading: false,
            isotpLoading: false,
            redirect: false,
            errMsg: "",
            otp: false,
            siteLogo: 'http://127.0.0.1:8000/uploads/settings/application_logo.png',
            openModel: false,
        };
    }
    async componentDidMount() {
        Service.getsiteLogo().then((res) => {
            if (res.data.code === 503) {
                window.location = "under-maintenance";
            }
        });
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
        this.setState({ isotpLoading: true });
        var data = {
            email: otpemail,
            otp_number: this.state.code
        };
        Service.VerifyOtp(data).then((res) => {
            if (res.data.status === 'success') {
                this.setState({ isotpLoading: false });
                localStorage.setItem("userData", JSON.stringify(res.data.data));
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
                this.setState({
                    errMsg: res.data.message,
                });
                setTimeout(() => {
                    this.setState({ errMsg: "" });
                }, 2000);
            }
        });
    }
    onResetOtpHandler = () => {
        const otpemail = localStorage.getItem("otpemail");
        this.setState({ isLoading: true });
        var data = {
            email: otpemail
        };
        Service.SendOtp(data).then((res) => {
            if (res.data.status === 'success') {
                this.setState({ isLoading: false });
                this.setState({
                    msg: res.data.message,
                    redirect: true,
                });
                toast.success(res.data.message, { position: toast.POSITION.TOP_RIGHT });
            } else {
                this.setState({
                    errMsg: res.data.message,
                });
                setTimeout(() => {
                    this.setState({ errMsg: "" });
                }, 2000);
            }
        });
    }
    onSignInHandler = () => {
        this.setState({ isLoading: true });
        var data = {
            email: this.state.email,
            password: this.state.password,
        };
        Service.Login(data).then((res) => {
            if (res.data.status === 'success') {
                this.setState({ isLoading: false });
                localStorage.setItem("otpemail", this.state.email);
                this.setState({ otp: true });
                this.setState({
                    msg: res.data.message,
                    redirect: true,
                });
            } else {
                this.setState({
                    errMsg: res.data.message,
                });
                setTimeout(() => {
                    this.setState({ errMsg: "" });
                }, 2000);
            }
        })
    };
    onLogoutHandler = () => {
        localStorage.removeItem('userData');
        localStorage.removeItem('isLoggedIn');
        localStorage.removeItem('invoice');
        this.setState({ navigate: true });
        toast.success("logout in successfully ⚡️", { position: toast.POSITION.TOP_RIGHT });
    };
    render() {
        const openModel = this.state.openModel;
        const isotpLoading = this.state.isotpLoading;
        const isLoading = this.state.isLoading;
        const otpmodal = this.state.otp;
        const otplogin = localStorage.getItem("isLoggedIn");
        const login = JSON.parse(localStorage.getItem("userData"));
        let button;
        if (otplogin && login) {
            button = <button onClick={this.onLogoutHandler} style={{ fontSize: '18px', color: 'var(--heading-color)', width: '45px', height: '45px', lineHeight: '45px', display: 'block', textAlign: 'center', border: '1px solid var(--border-color-light)', borderRadius: '50%' }}><i className="fas fa-sign-out-alt"></i> </button>
        } else {
            button = <Link onClick={() => this.setOpenModal(true)} data-bs-toggle="modal" data-bs-target="#myModalAuthentication"><i className="fas fa-user"></i></Link>
        }
        return (
            <div>
                <Loader isLoadingPage={this.props.isLoadingPage} />
                <ToastContainer />
                <div className="header" id="home1">
                    <div className="container">
                        <div className="d-flex align-items-center justify-content-between">
                            <div className="w3l_login">{button}</div>
                            <div className="w3l_logo text-center ml-auto">
                                <h1><Link to={"/home"}><img src={this.state.siteLogo} alt={'siteLogo'} /></Link></h1>
                            </div>
                            <div className="cart cart box_1">
                            </div>
                        </div>
                    </div>
                </div>
                {openModel ? (
                    <div className="modal fade" id="myModalAuthentication" tabIndex={-1} aria-labelledby="myModalAuthentication" aria-hidden="true">
                        <div className="modal-dialog modal-dialog-centered">
                            <div className="modal-content">
                                <div className="modal-header border-0">
                                    <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick={() => this.setOpenModal(false)}></button>
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
                                                            <p className="text-danger" style={{ color: "red" }}>{this.state.errMsg}</p>
                                                            <Input type="text" name="code" placeholder="OTP" value={this.state.code} onChange={this.onChangeOtphandler} />
                                                            <br />
                                                            <div className="sign-up">
                                                                <Button className="buttonload text-center mb-4 btn button-eff" color="success" onClick={this.onOtpHandler} >
                                                                    {isotpLoading ? (<span>please wait...</span>) : (<span>Verify OTP</span>)}
                                                                </Button>
                                                                <Button className="buttonload text-center mb-4 btn button-eff" color="success" onClick={this.onResetOtpHandler} style={{ float: 'right' }}>
                                                                    {isLoading ? (<span>please wait...</span>) : (<span>Reset OTP</span>)}
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
                                                            <p className="text-danger" style={{ color: "red" }}>{this.state.errMsg}</p>
                                                            <Input type="text" name="email" placeholder="Email Address" value={this.state.email} onChange={this.onChangehandler} />
                                                            <span className="text-danger">{this.state.msg}</span>
                                                            <Input type="password" name="password" placeholder="Password" value={this.state.password} onChange={this.onChangehandler} />
                                                            <br />
                                                            <div className="sign-up">
                                                                <Button className="buttonload text-center mb-4 btn button-eff" color="success" onClick={this.onSignInHandler}>
                                                                    {isLoading ? (<span>please wait...</span>) : (<span>Sign in</span>)}
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