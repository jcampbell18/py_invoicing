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
                    {  
                        this.props.expenses.map(expense =>
                            <ul className="ul-lines" key={expense.expense_id}>
                                <li>
                                    <p>{expense.pdate}</p>
                                </li>
                                <li>
                                    <p>{expense.business_name}</p>
                                </li>
                                <li>
                                    <p>{expense.name}</p>
                                </li>
                                <li>
                                    <p>{expense.expense_category}</p>
                                </li>
                                <li>
                                    <p>{expense.invoice_id === null ? (expense.vehicle_id === null ? expense.man_year + " " + expense.make + " " + expense.model : <span>&nbsp;</span>) : "INV# " + expense.invoice_id}</p>
                                </li>
                                <li>
                                    <p>{expense.quantity} @ ${expense.amount}</p>
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

export default Expenses;