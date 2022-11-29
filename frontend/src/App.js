import React from "react";
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import Home from "./Pages/Home";
import AboutUs from "./Pages/Cms/AboutUs";
import ContactUs from "./Pages/Cms/ContactUs";
import Faq from "./Pages/Cms/Faq";
import Blog from "./Pages/Blog/Blog";
import BlogSingle from "./Pages/Blog/BlogSingle";
import Products from "./Pages/Products/Products";
import ProductsSingle from "./Pages/Products/ProductsSingle";
import PageNotFund from "./Components/Error/PageNotFund";
function App() {
  return (
    <div>
      <Router>
        <Switch>
          <Route exact path='/' component={Home} />
          <Route path='/home' component={Home} />
          <Route path="/about-us" component={AboutUs} />
          <Route path="/contact-us" component={ContactUs} />
          <Route path="/faq" component={Faq} />
          <Route path="/blog" component={Blog} />
          <Route path="/blog-single" component={BlogSingle} />
          <Route path="/products" component={Products} />
          <Route path="/:single-products/:id" component={ProductsSingle} />
          <Route component={PageNotFund} />
        </Switch>
      </Router>
    </div>
  );
}

export default App;
