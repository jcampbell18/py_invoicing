import React from 'react'
import img_checkmark from '../img/icons/32x32/checkmark.png'
import img_view from '../img/icons/32x32/view.png'
import img_print from '../img/icons/32x32/print.png'

class Invoices extends React.Component {

    onView = (invoice) => {
        this.props.onDataSelection("Invoice", invoice);
    }

    render() {
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Invoices</h6>
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
                    {  
                        this.props.invoices.map(invoice =>
                            <ul className="ul-lines" key={invoice.invoice_id}>
                                <li>
                                    <p>{invoice.invoice_id}</p>
                                </li>
                                <li>
                                    <p>{invoice.start_date}</p>
                                </li>
                                <li>
                                    <p>{invoice.address}, {invoice.city}, {invoice.state} {invoice.zipcode}</p>
                                </li>
                                <li>
                                    <p>{invoice.sku_name}</p>
                                </li>
                                <li>
                                    <p>{invoice.amount !== null ? invoice.amount : "$0.00"}</p>
                                </li>
                                <li>
                                    {invoice.complete === 1 ? <img src={img_checkmark} alt="Completed" title="Completed" /> : <p>&nbsp;</p> }
                                </li>
                                <li>
                                    {invoice.paid === 1 ? <img src={img_checkmark} alt="Paid" title="Paid" /> : <p>&nbsp;</p> }
                                </li>
                                <li>
                                    <a href="/#" onClick={() => this.onView(invoice)}>
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
            </main>
        );
    }    
}

export default Invoices;