import React, { Component } from "react";
import Footer from "../Components/Footer";
import Newsletter from "./Newsletter/Newsletter";
import Header from "../Components/Header";
import Title from "../Components/Title";
import Partners from "./Partners/Partners";
import TopProducts from "./TopProducts/TopProducts";
import SpecialDeals from "./SpecialDeals/SpecialDeals";
import Banner from "./Banner/Banner";
import Categories from "./Categories/Categories";
import SliderBanner from "./Banner/SliderBanner";
class Home extends Component {
    render() {
        return (
            <div>
                <Title />
                <Header />
                <SliderBanner />
                <Categories />
                <Banner />
                <SpecialDeals />
                <TopProducts />
                <Partners />
                <Newsletter />
                <Footer />
            </div>
        );
    }
}

export default Home;