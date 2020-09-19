import React from 'react'

class UnpaidLoansInterest extends React.Component {
    render() { 
        return (
            <section className="monthly-stats">
                <h6>Unpaid Loans/Interest</h6>
                <ul className="col1">
                    <li>
                        <p className="heading">Invoice (#)</p>
                    </li>
                    <li>
                        <p className="heading">Loan ($)</p>
                    </li>
                    <li>
                        <p className="heading">Interest ($)</p>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p># 0092</p>
                    </li>
                    <li>
                        <p>$0.00</p>
                    </li>
                    <li>
                        <p>$0.00</p>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p className="heading">Total</p>
                    </li>
                    <li>
                        <p>$0.00</p>
                    </li>
                    <li>
                        <p>$0.00</p>
                    </li>
                </ul>
            </section>
        );
    }    
}

export default UnpaidLoansInterest;