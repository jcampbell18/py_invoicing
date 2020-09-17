import React from 'react'
import MonthyStats from './MonthyStats'
import StatsCurrentYear from './StatsCurrentYear'
import OutstandingInvoices from './OutstandingInvoices'
import './Core/Main.css'

class Dashboard extends React.Component {
    render() {
        return (
            <main>
                <MonthyStats />
                <StatsCurrentYear />
                <OutstandingInvoices />
            </main>
        );
    }    
} 

export default Dashboard;