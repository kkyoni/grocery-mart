import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Service from "../../services/Service";
class Brand extends Component {
    constructor(props) {
        super(props)
        this.state = {
            brand: [],
            loading: false,
            Data: false,
        }
    }
    async componentDidMount() {
        Service.getBrand().then((res) => {
			if (res.data.status === 'success') {
				this.setState({ brand: res.data.brand, connection: true, notrecordloading: true });
			} else {
				this.setState({ brand: [], connection: true, notrecordloading: false });
			}
		});
    }
    handleBrand(id) {
        Service.getSinglebrand(id).then(res => {
            if (res.data.status === "success") {
                let singledata = [];
                res.data.brand.forEach((el) => {
                    singledata.push(el.product_details);
                    this.props.parentBrandCallback(singledata);
                })
            } else {
                this.props.parentBrandCallback([]);
            }
        })
    }
    render() {
        var brand_HTMLTABLE = "";
        if (this.state.connection) {
            if (this.state.notrecordloading) {
                brand_HTMLTABLE =
                    this.state.brand.map((item, i) => {
                        return (
                            <li><Link key={i}><input type="checkbox" onClick={() => this.handleBrand(item.id)} className="checked" />{item.brand_name}</Link></li>
                        );
                    });
            } else {
                brand_HTMLTABLE = <img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "100%", height: "1%" }} />
            }
        } else {
            brand_HTMLTABLE = <img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "100%", height: "1%" }} />
        }
        return (
            <div className="w3ls_mobiles_grid_left_grid">
                <h3>Brand</h3>
                <div className="w3ls_mobiles_grid_left_grid_sub">
                    <div className="ecommerce_color">
                        <ul>
                            {brand_HTMLTABLE}
                        </ul>
                    </div>
                </div>
            </div>
        )
    }
}
export default Brand;