import React from 'react'
import CurrentYearStats from './CurrentYearStats'
import CurrentYearExpenses from './CurrentYearStats'
import UnpaidLoansInterest from './CurrentYearStats'

class Reports extends React.Component {
    render() { 
        return (
            <main>
                <CurrentYearStats />
                <CurrentYearExpenses />
                <UnpaidLoansInterest />
            </main>
        );
    }    
}

export default Reports;