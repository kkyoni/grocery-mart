import React, { Component } from "react";
import { Link } from 'react-router-dom';
class PageNotFund extends Component {
    constructor(props) {
        super(props)
        this.state = {
            logo: 'http://127.0.0.1:8000/uploads/settings/application_logo.png',
            photo: 'http://127.0.0.1:8000/uploads/settings/connection_lost.png',
        }
    }
    render() {
        return (
            <div>
                <div style={{ margin: "0", padding: "0" }}>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td bgcolor="#ffffff" align="center" style={{ padding: "70px 15px 70px 15px" }} className="section-padding">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="500" className="responsive-table">
                                    <tr>
                                        <td>
                                            <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td bgcolor="#ffffff" width="100" align="left">
                                                                                    <Link to={"/home"} target="_blank">
                                                                                        <img alt="Logo" src={this.state.logo} style={{ display: "block", fontFamily: "Helvetica, Arial, sans-serif", color: "#666666", fontSize: "16px" }} border="0" />
                                                                                    </Link>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <Link to={"/home"} target="_blank">
                                                                                        <img src={this.state.photo} width="1000" height="500" alt="responsive" className="img-max" />
                                                                                    </Link>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        )
    }
}

export default PageNotFund;