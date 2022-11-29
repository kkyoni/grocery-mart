import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Service from "../../services/Service";
class Price extends Component {
    handlePrice(min, max) {
        Service.getProductPrice(min, max).then(res => {
            if (res.data.status === "success") {
                this.props.parentPriceCallback(res.data.productsprice);
            } else {
                this.props.parentPriceCallback([]);
            }
        })
    }
    render() {
        return (
            <div className="w3ls_mobiles_grid_left_grid">
                <h3>Price</h3>
                <div className="w3ls_mobiles_grid_left_grid_sub">
                    <div className="ecommerce_color ecommerce_size">
                        <ul>
                            <li><a href="javascript:void(0)"><input type="checkbox" onClick={() => this.handlePrice('0', '100')} className="checked" />Below $ 100</a></li>
                            <li><a href="javascript:void(0)"><input type="checkbox" onClick={() => this.handlePrice('100', '500')} className="checked" />$ 100-500</a></li>
                            <li><a href="javascript:void(0)"><input type="checkbox" onClick={() => this.handlePrice('500', '1000')} className="checked" />$ 500-1000</a></li>
                            <li><a href="javascript:void(0)"><input type="checkbox" onClick={() => this.handlePrice('1000', '1500')} className="checked" />$ 1000-1500</a></li>
                            <li><a href="javascript:void(0)"><input type="checkbox" onClick={() => this.handlePrice('0', '2000')} className="checked" />$ Above 2000</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        )
    }
}
export default Price;