import React from 'react'
import img_checkbox_true from '../img/icons/512x512/checkbox_unmarked.png'
import img_checkbox_false from '../img/icons/512x512/checkbox_marked.png'
import img_view from '../img/icons/512x512/view.png'
import img_print from '../img/icons/512x512/print.png'

class OutstandingInvoices extends React.Component {
    render() {
        return (
            <section className="outstanding-invoices">
                <h6>Outstanding Invoices</h6>
                <ul>
                    <li>
                        <p className="heading">Invoice</p>
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
                        <p className="heading">View</p>
                    </li>
                    <li>
                        <p className="heading">Print</p>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>#0092</p>
                    </li>
                    <li>
                        <p>04/27/2013</p>
                    </li>
                    <li>
                        <p>1703 E 4th Ave, Spokane, WA 99202</p>
                    </li>
                    <li>
                        <p>Short-term Loan</p>
                    </li>
                    <li>
                        <p>$400.00</p>
                    </li>
                    <li>
                        <img src={img_checkbox_false} alt="Completed" title="Completed"/>
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
                <ul className="ul-lines">
                    <li>
                        <p>#0092</p>
                    </li>
                    <li>
                        <p>04/27/2013</p>
                    </li>
                    <li>
                        <p>1703 E 4th Ave, Spokane, WA 99202</p>
                    </li>
                    <li>
                        <p>Short-term Loan</p>
                    </li>
                    <li>
                        <p>$400.00</p>
                    </li>
                    <li>
                        <img src={img_checkbox_true} alt="Completed" title="Completed"/>
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
                <ul className="ul-lines">
                    <li>
                        <p>#0092</p>
                    </li>
                    <li>
                        <p>04/27/2013</p>
                    </li>
                    <li>
                        <p>1703 E 4th Ave, Spokane, WA 99202</p>
                    </li>
                    <li>
                        <p>Short-term Loan</p>
                    </li>
                    <li>
                        <p>$400.00</p>
                    </li>
                    <li>
                        <img src={img_checkbox_false} alt="Completed" title="Completed"/>
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
                <ul className="ul-lines">
                    <li>
                        <p>#0092</p>
                    </li>
                    <li>
                        <p>04/27/2013</p>
                    </li>
                    <li>
                        <p>1703 E 4th Ave, Spokane, WA 99202</p>
                    </li>
                    <li>
                        <p>Short-term Loan</p>
                    </li>
                    <li>
                        <p>$400.00</p>
                    </li>
                    <li>
                        <img src={img_checkbox_true} alt="Completed" title="Completed"/>
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

export default OutstandingInvoices;