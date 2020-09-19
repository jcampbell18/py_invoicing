import React from 'react'

class CurrentYearExpenses extends React.Component {
    render() { 
        return (
            <section className="monthly-stats">
                <h6>Current Year Expenses</h6>
                <ul className="col1">
                    <li>
                        <p className="heading">Category</p>
                    </li>
                    <li>
                        <p className="heading">Expense ($)</p>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>Advertising</p>
                    </li>
                    <li>
                        <p>$0.00</p>
                    </li>
                </ul>
            </section>
        );
    }    
}

export default CurrentYearExpenses;