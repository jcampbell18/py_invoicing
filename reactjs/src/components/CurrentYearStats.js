import React from 'react'

class CurrentYearStats extends React.Component {
    render() { 
        return (
            <section className="monthly-stats">
                <h6>Current Year Stats</h6>
                <ul className="col1">
                    <li>
                        <p className="heading">Month</p>
                    </li>
                    <li>
                        <p className="heading">Income ($)</p>
                    </li>
                    <li>
                        <p className="heading">Miles</p>
                    </li>
                    <li>
                        <p className="heading">Taxes ($)</p>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>January</p>
                    </li>
                    <li>
                        <p>$0.00</p>
                    </li>
                    <li>
                        <p>0</p>
                    </li>
                    <li>
                        <p>$0.00</p>
                    </li>
                </ul>
            </section>
        );
    }    
}

export default CurrentYearStats;