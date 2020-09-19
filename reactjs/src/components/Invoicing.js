import React from 'react'
import img_checkmark from '../img/icons/32x32/checkmark.png'
import img_view from '../img/icons/32x32/view.png'
import img_print from '../img/icons/32x32/print.png'

class Invoicing extends React.Component {
    render() {
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Invoicing</h6>
                    <ul>
                        <li>
                            <p className="heading">Invoice #</p>
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
                            <p className="heading">Completed?</p>
                        </li>
                        <li>
                            <p className="heading">Paid?</p>
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
                            <p>02-28-2010</p>
                        </li>
                        <li>
                            <p>36124 N Milan Elk Rd, Chattoroy, WA 99003</p>
                        </li>
                        <li>
                            <p>Trash Out</p>
                        </li>
                        <li>
                            <p>$500.00</p>
                        </li>
                        <li>
                            <img src={img_checkmark} alt="Completed" title="Completed"/>
                        </li>
                        <li>
                            <img src={img_checkmark} alt="Paid" title="Paid"/>
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
            </main>
        );
    }    
}

export default Invoicing;