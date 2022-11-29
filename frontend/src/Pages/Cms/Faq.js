import React, { Component } from "react";
import { Link } from 'react-router-dom';
import Title from "../../Components/Title";
import Header from "../../Components/Header";
import Newsletter from "../Newsletter/Newsletter";
import Footer from "../../Components/Footer";
class Faq extends Component {
    render() {
        return (
            <div>
                <Title />
                <Header />

                <div className="banner banner2">
		<div className="container">
			<h2>FAQ's</h2>
		</div>
	</div>
	
	
	<div className="breadcrumb_dress">
		<div className="container">
			<ul>
				<li><Link to={"/home"}><span className="glyphicon glyphicon-home" aria-hidden="true"></span> Home</Link>
					<i>/</i></li>
				<li>FAQ's</li>
			</ul>
		</div>
	</div>
	
	
	<div className="faq py-5">
		<div className="container py-lg-4 py-3">
			<div className="w3l_faq_grids">
				<div className="w3l_faq_grid">
					<h3>1. Excepteur sint occaecat cupidatat non proident ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>

				<div className="w3l_faq_grid">
					<h3>2. Quis nostrum exercitationem ullam corporis suscipit ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>3. Nemo enim ipsam voluptatem quia voluptas sit ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>4. Ut enim ad minima veniam, quis nostrum exercitationem ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>5. Quis autem vel eum iure reprehenderit qui ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>6. Sed ut perspiciatis unde omnis iste natus error sit ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>7. Nam libero tempore, cum soluta nobis est ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>8. At vero eos et accusamus et iusto odio dignissimos ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>9. Itaque earum rerum hic tenetur a sapiente delectus ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>10. vel illum qui dolorem eum fugiat quo voluptas nulla ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
				<div className="w3l_faq_grid">
					<h3>11. Ut enim ad minima veniam, quis nostrum exercitationem ?</h3>
					<p><b>Ans.</b> But I must explain to you how all this mistaken idea of
						denouncing pleasure and praising pain was born and I will give
						you a complete account of the system, and expound the actual
						teachings of the great explorer of the truth, the master-builder
						of human happiness. No one rejects, dislikes, or avoids pleasure
						itself, because it is pleasure.</p>
				</div>
			</div>
		</div>
	</div>

                <Newsletter />
                <Footer />
            </div>
        )
    }
}

export default Faq;