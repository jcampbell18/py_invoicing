import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Mileages extends React.Component {

    onView = (mileage) => {
        this.props.onDataSelection("Mileage", mileage);
    }

    render() {
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Mileages</h6>
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
                        this.props.mileages.map(mileage =>
                            <ul className="ul-lines" key={mileage.mileage_id}>
                                <li>
                                    <p>{mileage.drive_date}</p>
                                </li>
                                <li>
                                    <p>{mileage.address}, {mileage.city}, {mileage.state} {mileage.zipcode}</p>
                                </li>
                                <li>
                                    <p>{mileage.start_mileage}</p>
                                </li>
                                <li>
                                    <p>{mileage.end_mileage}</p>
                                </li>
                                <li>
                                    <p>{mileage.subtotal}</p>
                                </li>
                                <li>
                                    <a href="/#" onClick={() => this.onView(mileage)}>
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

export default Mileages;