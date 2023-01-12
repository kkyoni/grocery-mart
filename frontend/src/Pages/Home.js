import React, { Component } from "react";
import Footer from "../Components/Footer";
import Newsletter from "./Newsletter/Newsletter";
import Header from "../Components/Header";
import Title from "../Components/Title";
import Partners from "./Partners/Partners";
import TopProducts from "./TopProducts/TopProducts";
import SpecialDeals from "./SpecialDeals/SpecialDeals";
import Banner from "./Banner/Banner";
import SliderBanner from "./Banner/SliderBanner";
import Chat from "./Chat/Chat";
class Home extends Component {
    constructor(props) {
        super(props)
        this.state = {
            isLoading: true,
        }
    }
    componentDidMount() {
        this.setState({
            isLoading: true,
        });
        setTimeout(() => {
            this.setState({ isLoading: false });
        }, 1000);
    }
    render() {
        return (
            <div>
                <Title isLoadingPage={this.state.isLoading} />
                <Header />
                <SliderBanner />
                <Banner />
                <SpecialDeals />
                <TopProducts />
                <Partners />
                <Newsletter />
                <Footer />
                <Chat />
            </div>
        );
    }
}
export default Home;