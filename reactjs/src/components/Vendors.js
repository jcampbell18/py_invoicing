import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Vendors extends React.Component {
    render() { 
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Vendors</h6>
                    <ul>
                        <li>
                            <p className="heading">Business Name</p>
                        </li>
                        <li>
                            <p className="heading">Address, City, State &amp; Zipcode</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    <ul className="ul-lines">
                        <li>
                            <p>Home Depot - Valley</p>
                        </li>
                        <li>
                            <p>5617 E Sprague Ave., Spokane Valley, WA 99212</p>
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

export default Vendors;