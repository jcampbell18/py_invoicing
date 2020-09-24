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
                    {
                        this.props.vehicles.map(vehicle =>
                            <ul className="ul-lines" key={vehicle.vehicle_id}>
                                <li>
                                    <p>{vehicle.man_year}</p>
                                </li>
                                <li>
                                    <p>{vehicle.make}</p>
                                </li>
                                <li>
                                    <p>{vehicle.model}</p>
                                </li>
                                <li>
                                    <p>{vehicle.submodel}</p>
                                </li>
                                <li>
                                    <p>{vehicle.notes}</p>
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

export default Vehicles;