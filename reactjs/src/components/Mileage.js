import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Mileage extends React.Component {
    render() {
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Mileage</h6>
                    <ul>
                        <li>
                            <p className="heading">Date</p>
                        </li>
                        <li>
                            <p className="heading">Project Site</p>
                        </li>
                        <li>
                            <p className="heading">Starting Mileage</p>
                        </li>
                        <li>
                            <p className="heading">Ending Mileage</p>
                        </li>
                        <li>
                            <p className="heading">Total Mileage</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    {  
                        this.props.mileage.map(mile =>
                            <ul className="ul-lines" key={mile.mileage_id}>
                                <li>
                                    <p>{mile.drive_date}</p>
                                </li>
                                <li>
                                    <p>{mile.address}, {mile.city}, {mile.state} {mile.zipcode}</p>
                                </li>
                                <li>
                                    <p>{mile.start_mileage}</p>
                                </li>
                                <li>
                                    <p>{mile.end_mileage}</p>
                                </li>
                                <li>
                                    <p>{mile.subtotal}</p>
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

export default Mileage;