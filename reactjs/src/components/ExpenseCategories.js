import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class ExpenseCategories extends React.Component {
    render() { 
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Expense Categories</h6>
                    <ul>
                        <li>
                            <p className="heading">Name</p>
                        </li>
                        <li>
                            <p className="heading">Description</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    <ul className="ul-lines">
                        <li>
                            <p>Vehicle Gas</p>
                        </li>
                        <li>
                            <p>Vehicle Gas</p>
                        </li>
                        <li>
                            <a href="/#">
                                <img src={img_view} alt="View" title="View"/>
                            </a>
                        </li>
                    </ul>
                    <ul className="ul-lines">
                        <li>
                            <p>Building Materials</p>
                        </li>
                        <li>
                            <p>Building Materials</p>
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

export default ExpenseCategories;