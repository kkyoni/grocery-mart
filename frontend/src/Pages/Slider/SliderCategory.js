import React, { Component } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import Service from "../../services/Service";
class SliderCategory extends Component {
    constructor(props) {
        super(props)
        this.state = {
            categories: [],
            loading: false,
        }
    }
    async componentDidMount() {
        const res = await axios.get('http://127.0.0.1:8000/api/getcategories');
        if (res.data.status === 'success') {
            this.setState({ categories: res.data.categories, connection: true, notrecordloading: true });
        } else {
            this.setState({ categories: [], connection: true, notrecordloading: false });
        }
    }
    handleCategorys(id) {
        Service.getSinglecategorys(id).then(res => {
            if (res.data.status === "success") {
                this.props.parentCategoryCallback(res.data.product);
            } else {
                this.props.parentCategoryCallback([]);
            }
        })
    }
    render() {
        var categories_HTMLTABLE = "";
        if (this.state.connection) {
            if (this.state.notrecordloading) {
                categories_HTMLTABLE =
                    this.state.categories.map((item, i) => {
                        return (
                            <li key={i}><Link onClick={() => this.handleCategorys(item.id)}>{item.categories_name}</Link></li>
                        );
                    });
            } else {
                categories_HTMLTABLE = <img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "100%", height: "1%" }} />
            }
        } else {
            categories_HTMLTABLE = <img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "100%", height: "1%" }} />
        }
        return (
            <div className="w3ls_mobiles_grid_left_grid">
                <h3>Categories</h3>
                <div className="w3ls_mobiles_grid_left_grid_sub">
                    <ul className="panel_bottom">
                        {categories_HTMLTABLE}
                    </ul>
                </div>
            </div>
        )
    }
}
export default SliderCategory;