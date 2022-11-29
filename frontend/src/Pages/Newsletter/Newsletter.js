import React, { Component } from "react";
class Newsletter extends Component {
    render() {
        return (
            <div className="newsletter">
            <div className="container">
                <div className="row">
                    <div className="col-md-6 w3agile_newsletter_left">
                        <h3>Newsletter</h3>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
                    </div>
                    <div className="col-md-6 w3agile_newsletter_right">
                        <form action="#" method="post">
                            <input type="email" name="Email" placeholder="Email" required="" />
                            <button className="btn btn-style"><span className="fas fa-paper-plane"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        )
    }
}

export default Newsletter;