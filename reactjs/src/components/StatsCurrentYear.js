import React from 'react'

class Stats_CurrentYear extends React.Component {
    render() { 
        return (
            <section className="stats-current-year">
                <h6>Stats (Current Year)</h6>
                <ul>
                    <li>
                        <p>Paid</p>
                    </li>
                    <li>
                        <p>${this.props.stats.paid === 0 ? "0.00" : this.props.stats.paid}</p>
                    </li>
                    <li>
                        <p>Unpaid (Completed Projects)</p>
                    </li>
                    <li>
                        <p>${this.props.stats.unpaid_completed === 0 ? "0.00" : this.props.stats.unpaid_completed}</p>
                    </li>
                    <li>
                        <p>Unpaid (Uncompleted Projects)</p>
                    </li>
                    <li>
                        <p>${this.props.stats.unpaid_incomplete === 0 ? "0.00" : this.props.stats.unpaid_incomplete}</p>
                    </li>
                    <li>
                        <p>Total (for 2020)</p>
                    </li>
                    <li>
                        <p>${this.props.stats.total === 0 ? "0.00" : this.props.stats.total}</p>
                    </li>
                </ul>
            </section>
        );
    }    
}

export default Stats_CurrentYear;