import React from 'react'

class Monthy_Stats extends React.Component {

    getMonth = (index) => {
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        return months[index];
    }

    render() { 
        
        return (
            <section className="monthly-stats">
                <h6>Monthly Stats (for current year)</h6>
                    {
                        this.props.monthly_stats.map((amount, index) =>
                            <ul className="col1" key={index}>
                                <li>
                                    <p>{this.getMonth(index)}</p>
                                </li>
                                <li>
                                    <p>${amount === 0 ? "0.00" : amount}</p>
                                </li>
                            </ul>
                        )
                    }
            </section>
        );
    }    
}

export default Monthy_Stats;