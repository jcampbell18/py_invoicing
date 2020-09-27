import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Clients extends React.Component {

    onView = (client) => {
        this.props.onDataSelection("Client", client);
    }

    render() {
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Clients</h6>
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
                    { 
                        this.props.clients.map(client =>
                            <ul className="ul-lines" key={client.company_id}>
                                <li>
                                    <p>{client.business_name}</p>
                                </li>
                                <li>
                                    <p>{client.contact_name}</p>
                                </li> 
                                <li>
                                    <p>{client.address}, {client.city}, {client.state} {client.zipcode}</p>
                                </li>
                                <li>
                                    <p>{client.phone}</p>
                                </li>
                                <li>
                                    <p>{client.email}</p>
                                </li>
                                <li>
                                    <a href="/#" onClick={() => this.onView(client)}>
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

export default Clients;