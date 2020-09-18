import React from 'react'

class Clients extends React.Component {
    render() {
        return (
            <section className="outstanding-invoices">
                <h6>Project Sites</h6>
                <ul>
                    <li>
                        <p className="heading">Business Name</p>
                    </li>
                    <li>
                        <p className="heading">Contact Name</p>
                    </li>
                    <li>
                        <p className="heading">Address, City, State &amp; Zipcode</p>
                    </li>
                    <li>
                        <p className="heading">Phone</p>
                    </li>
                    <li>
                        <p className="heading">Email</p>
                    </li>
                    <li>
                        <p className="heading">View</p>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>Keller Williams</p>
                    </li>
                    <li>
                        <p>Doc Nicolson</p>
                    </li>
                    <li>
                        <p>802 N Washington St, Spokane, WA 99201</p>
                    </li>
                    <li>
                        <p>(509) 991-4085</p>
                    </li>
                    <li>
                        <p>doc@fivestarspokane.com</p>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_view} alt="View" title="View"/>
                        </a>
                    </li>
                </ul>
            </section>
        );
    }    
}

export default Clients;