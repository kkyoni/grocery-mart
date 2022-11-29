import React, { Component } from "react";
import Service from "../../services/Service";

class Sorting extends Component {
    constructor(props) {
        super(props);
        this.state = {}
        this.onSortingHandler = this.onSortingHandler.bind(this);
    }

    onSortingHandler(e) {
        Service.getSortingProduct(e.target.value).then(res => {
            if (res.data.status === "success") {
                this.props.parentSortCallback(res.data.productssort);
            }
        })
    }
    render() {
        return (
            <div className="w3ls_mobiles_grid_right_grid2">
                <div className="w3ls_mobiles_grid_right_grid2_left">
                    <h3>Showing Results: 0-1</h3>
                </div>
                <div className="w3ls_mobiles_grid_right_grid2_right">
                    <select name="select_item" className="select_item" onChange={this.onSortingHandler}>
                        <option selected="selected">Default sorting</option>
                        <option value={'lowtohigh'}>Sort by price: low to high</option>
                        <option value={'hightolow'}>Sort by price: high to low</option>
                    </select>
                </div>
                <div className="clearfix"> </div>
            </div>
        )
    }
}
export default Sorting;