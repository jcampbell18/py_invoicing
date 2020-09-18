import React from 'react'
import img_checkmark from '../img/icons/32x32/checkmark.png'
import img_view from '../img/icons/32x32/view.png'
import img_print from '../img/icons/32x32/print.png'

class Bids extends React.Component {
    render() {
        return (
            <section className="outstanding-invoices">
                <h6>Project Sites</h6>
                <ul>
                    <li>
                        <p className="heading">Bid #</p>
                    </li>
                    <li>
                        <p className="heading">Date</p>
                    </li>
                    <li>
                        <p className="heading">Project Site</p>
                    </li>
                    <li>
                        <p className="heading">Work Performed</p>
                    </li>
                    <li>
                        <p className="heading">Amount</p>
                    </li>
                    <li>
                        <p className="heading">Approved?</p>
                    </li>
                    <li>
                        <p className="heading">View</p>
                    </li>
                    <li>
                        <p className="heading">Print</p>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>#0001</p>
                    </li>
                    <li>
                        <p>10-23-2010</p>
                    </li>
                    <li>
                        <p>	24515 S Pine Springs Rd, Cheney, WA 99004</p>
                    </li>
                    <li>
                        <p>Repair</p>
                    </li>
                    <li>
                        <p>$800.00</p>
                    </li>
                    <li>
                        <img src={img_checkmark} alt="Approved" title="Approved"/>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_view} alt="View" title="View"/>
                        </a>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_print} alt="Print" title="Print"/>
                        </a>
                    </li>
                </ul>
            </section>
        );
    }    
}

export default Bids;