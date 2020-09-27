import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Vendors extends React.Component {

    onView = (vendor) => {
        this.props.onDataSelection("Vendor", vendor);
    }

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
                            <p className="heading">Nickname</p>
                        </li>
                        <li>
                            <p className="heading">Address, City, State &amp; Zipcode</p>
                        </li>
                        <li>
                            <p className="heading">Phone</p>
                        </li>
                        <li>
                            <p className="heading">Website</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    { 
                        this.props.vendors.map(vendor =>
                            <ul className="ul-lines" key={vendor.company_id}>
                                <li>
                                    <p>{vendor.business_name}</p>
                                </li>
                                <li>
                                    <p>{vendor.contact_name}</p>
                                </li> 
                                <li>
                                    <p>{vendor.address}, {vendor.city}, {vendor.state} {vendor.zipcode}</p>
                                </li>
                                <li>
                                    <p>{vendor.phone}</p>
                                </li>
                                <li>
                                    <p>{vendor.website}</p>
                                </li>
                                <li>
                                    <a href="/#" onClick={() => this.onView(vendor)}>
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

export default Vendors;