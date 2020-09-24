import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Sku extends React.Component {
    render() {
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Sku</h6>
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
                        this.props.sku.map(sk =>
                            <ul className="ul-lines" key={sk.sku_id}>
                                <li>
                                    <p>{sk.name}</p>
                                </li>
                                <li>
                                    <p>{sk.description}</p>
                                </li>
                                <li>
                                    <a href="/#">
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

export default Sku;