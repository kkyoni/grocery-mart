import React, { Component } from "react";
import axios from "axios";
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
        const res = await axios.get('http://127.0.0.1:8000/api/getbrand');
        if (res.data.status === 'success') {
            if (res.data.brand.length === 0) {
                this.setState({ brand: [], dataLoaded: true, error: false, Data: false });
            } else {
                this.setState({ brand: res.data.brand, dataLoaded: true, error: false, Data: true });
            }
        }
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
        if (this.state.dataLoaded) {
            if (this.state.Data) {
                brand_HTMLTABLE =
                    this.state.brand.map((item, i) => {
                        return (
                            <li><a href="javascript:void(0)" key={i}><input type="checkbox" onClick={() => this.handleBrand(item.id)} className="checked" />{item.brand_name}</a></li>
                        );
                    });
            } else {
                brand_HTMLTABLE = <div><h2>Not Data Found ...</h2></div>
            }
        } else {
            brand_HTMLTABLE = <div><h2>Loading ...</h2></div>;
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