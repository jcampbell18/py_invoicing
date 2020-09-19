import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Vehicles extends React.Component {
    render() { 
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Vehicles</h6>
                    <ul>
                        <li>
                            <p className="heading">Year</p>
                        </li>
                        <li>
                            <p className="heading">Make</p>
                        </li>
                        <li>
                            <p className="heading">Model</p>
                        </li>
                        <li>
                            <p className="heading">SubModel</p>
                        </li>
                        <li>
                            <p className="heading">Description</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    <ul className="ul-lines">
                        <li>
                            <p>1994</p>
                        </li>
                        <li>
                            <p>Subaru</p>
                        </li>
                        <li>
                            <p>Legacy</p>
                        </li>
                        <li>
                            <p>L</p>
                        </li>
                        <li>
                            <p>2.2L 2212 CC H4</p>
                        </li>
                        <li>
                            <a href="/#">
                                <img src={img_view} alt="View" title="View"/>
                            </a>
                        </li>
                    </ul>
                </section>
            </main>
        );
    }    
}

export default Vehicles;