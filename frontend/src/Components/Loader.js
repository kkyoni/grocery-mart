import React, { Component } from "react";
import './loader.css';
class Loader extends Component {
    constructor(props) {
		super(props)
		this.state = {
			loading: false,
		}
	}
    async componentDidMount() {
        console.log("jaymin");
        // this.state.loading(true);
        this.setState({ loading: true }) 
        setTimeout(() => {
            this.setState({ loading: false }) 
        }, 2000000);
    }
    render() {
        return (
            <div>
                {this.state.loading ? (
                    <div className="loader-container">
                        <div className="spinner"></div>
                    </div>
                ) : ("")}
            </div>
        )
    }
}

export default Loader;
