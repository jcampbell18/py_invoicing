import React from 'react'

class Mileage extends React.Component {
    render() {
        return (
            <section className="outstanding-invoices">
                <h6>Project Sites</h6>
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
                <ul className="ul-lines">
                    <li>
                        <p>10-21-2010</p>
                    </li>
                    <li>
                        <p>	104 W Broadway St, St. John, WA 99171 (#INV_0008)</p>
                    </li>
                    <li>
                        <p>187673</p>
                    </li>
                    <li>
                        <p>187747</p>
                    </li>
                    <li>
                        <p>74</p>
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

export default Mileage;