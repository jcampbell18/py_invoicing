import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Changelog extends React.Component {
    render() { 
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Changelog</h6>
                    <ul>
                        <li>
                            <p className="heading">Address</p>
                        </li>
                        <li>
                            <p className="heading">City</p>
                        </li>
                        <li>
                            <p className="heading">State</p>
                        </li>
                        <li>
                            <p className="heading">Zipcode</p>
                        </li>
                        <li>
                            <p className="heading">Box Code</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    <ul className="ul-lines">
                        <li>
                            <p>36124 N Milan Elk Rd</p>
                        </li>
                        <li>
                            <p>Chattoroy</p>
                        </li>
                        <li>
                            <p>WA</p>
                        </li>
                        <li>
                            <p>99003</p>
                        </li>
                        <li>
                            <p>2610</p>
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

export default Changelog;