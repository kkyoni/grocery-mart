import React, { Component } from "react";
import axios from "axios";
import Service from "../../services/Service";
class SliderCategory extends Component {
    constructor(props) {
        super(props)
        this.state = {
            categories: [],
            loading: false,
            Data: false,
        }
    }
    async componentDidMount() {
        const res = await axios.get('http://127.0.0.1:8000/api/getcategories');
        if (res.data.status === 'success') {
            if (res.data.categories.length === 0) {
                this.setState({ categories: [], dataLoaded: true, error: false, Data: false });
            } else {
                this.setState({ categories: res.data.categories, dataLoaded: true, error: false, Data: true });
            }
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
        if (this.state.dataLoaded) {
            if (this.state.Data) {
                categories_HTMLTABLE =
                    this.state.categories.map((item, i) => {
                        return (
                            <li key={i}><a href="javascript:void(0)" onClick={() => this.handleCategorys(item.id)}>{item.categories_name}</a></li>
                        );
                    });
            } else {
                categories_HTMLTABLE = <div><h2>Not Data Found ...</h2></div>
            }
        } else {
            categories_HTMLTABLE = <div><h2>Loading ...</h2></div>;
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