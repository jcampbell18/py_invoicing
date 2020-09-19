import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Expenses extends React.Component {
    render() { 
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Expenses</h6>
                    <ul>
                        <li>
                            <p className="heading">Date</p>
                        </li>
                        <li>
                            <p className="heading">Company</p>
                        </li>
                        <li>
                            <p className="heading">Description</p>
                        </li>
                        <li>
                            <p className="heading">Expense Category</p>
                        </li>
                        <li>
                            <p className="heading">Vehicle or Invoice</p>
                        </li>
                        <li>
                            <p className="heading">Quantity @ Amount</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    <ul className="ul-lines">
                        <li>
                            <p>01-03-2011</p>
                        </li>
                        <li>
                            <p>Shell - 395</p>
                        </li>
                        <li>
                            <p>Gas</p>
                        </li>
                        <li>
                            <p>Vehicle Gas</p>
                        </li>
                        <li>
                            <p>1994 Subaru Legacy</p>
                        </li>
                        <li>
                            <p>1 @ $33.73</p>
                        </li>
                        <li>
                            <a href="/#">
                                <img src={img_view} alt="View" title="View"/>
                            </a>
                        </li>
                    </ul>
                </section>
            </main>
        );
    }    
}

export default Expenses;