import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Skus extends React.Component {

    onView = (sku) => {
        this.props.onDataSelection("Sku", sku);
    }

    render() {
       
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Skus</h6>
                    <ul>
                        <li>
                            <p className="heading">Name</p>
                        </li>
                        <li>
                            <p className="heading">Description</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    {  
                        this.props.skus.map(sku =>
                            <ul className="ul-lines" key={sku.sku_id}>
                                <li>
                                    <p>{sku.name}</p>
                                </li>
                                <li>
                                    <p>{sku.description}</p>
                                </li>
                                <li>
                                    <a href="/#" onClick={() => this.onView(sku)}>
                                        <img src={img_view} alt="View" title="View"/>
                                    </a>
                                </li>
                            </ul>
                        )
                    }
                </section>
            </main>
        );
    }    
}

export default Skus;