import React from 'react'
import img_checkmark from '../img/icons/32x32/checkmark.png'
import img_view from '../img/icons/32x32/view.png'
import img_print from '../img/icons/32x32/print.png'

class OutstandingInvoices extends React.Component {
    render() { 
        return (
            <section className="outstanding-invoices">
                <h6>Outstanding Invoices ({this.props.outstanding_invoices.length})</h6>
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
                {  
                    this.props.outstanding_invoices.map(outstanding_invoice =>
                        <ul className="ul-lines" key={outstanding_invoice.invoice_id}>
                            <li>
                                <p>{outstanding_invoice.invoice_id}</p>
                            </li>
                            <li>
                                <p>{outstanding_invoice.start_date}</p>
                            </li>
                            <li>
                                <p>{outstanding_invoice.address}, {outstanding_invoice.city}, {outstanding_invoice.state} {outstanding_invoice.zipcode}</p>
                            </li>
                            <li>
                                <p>{outstanding_invoice.sku_name}</p>
                            </li>
                            <li>
                                <p>{outstanding_invoice.amount !== null ? outstanding_invoice.amount : "$0.00"}</p>
                            </li>
                            <li>
                                {outstanding_invoice.complete === 1 ? <img src={img_checkmark} alt="Completed" title="Completed" /> : <p>&nbsp;</p> }
                            </li>
                            <li>
                                <a href="/#" onClick={() => this.onView(outstanding_invoice)}>
                                    <img src={img_view} alt="View" title="View"/>
                                </a>
                            </li>
                            <li>
                                <a href="/#">
                                    <img src={img_print} alt="Print" title="Print"/>
                                </a>
                            </li>
                        </ul>
                    )
                }
            </section>
        );
    }    
}

export default OutstandingInvoices;