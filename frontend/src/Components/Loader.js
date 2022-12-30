import React, { Component } from "react";
import './loader.css';
class Loader extends Component {
    render() {
        return (
            <div>
                {this.props.isLoading ? (
                    <div className="loader-container">
                        <div className="spinner"></div>
                    </div>
                ) : ("")}
            </div>
        )
    }
}

export default Loader;
