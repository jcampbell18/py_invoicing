import React from 'react'
import MonthyStats from './MonthyStats'
import StatsCurrentYear from './StatsCurrentYear'
import OutstandingInvoices from './OutstandingInvoices'
import './Core/Main.css'

class Dashboard extends React.Component {

    getOutstandingInvoices = () => {
        const invoices = this.props.invoices;
        const outstanding_invoices = [];

        for (let ix = 0; ix < this.props.invoices.length; ix++) {

            if (invoices[ix].complete === 1 && invoices[ix].paid === 0) {
                outstanding_invoices.push(invoices[ix]);
            }
        }

        return outstanding_invoices;
    }

    getMonthlyStats() {
        const invoices = this.props.invoices;
        const current_year = new Date().getFullYear; 
        const monthly_stats = [];

        for (let ix = 0; ix < 12; ix++) {
            var subtotal = 0.00;

            for (let jx = 0; jx < this.props.invoices.length; jx++) {
                if (invoices[jx].start_date.substring(0,4) === current_year) {
                    if (invoices[jx].start_date.substring(5,7) === ix.toString()) {
                        subtotal += invoices[jx].amount;
                    }
                }
            }

            monthly_stats.push(subtotal);
            subtotal = 0.00;
        }

        return monthly_stats;
    }

    getStats() {
        const invoices = this.props.invoices;
        const current_year = new Date().getFullYear; 
        const stats = {
            paid: 0.00,
            unpaid_completed: 0.00,
            unpaid_incomplete: 0.00,
            total: 0.00
        }

        for (let ix = 0; ix < this.props.invoices.length; ix++) {
            if (current_year === invoices[ix].start_date.substring(0, 4)) {
                if (invoices[ix].paid === 1) {
                    stats.paid += invoices[ix].amount;
                    stats.total += invoices[ix].amount;
                } else {
                    if (invoices[ix].complete === 1) {
                        stats.unpaid_completed += invoices[ix].amount;
                        stats.total += invoices[ix].amount;
                    } else {
                        stats.unpaid_incomplete += invoices[ix].amount;
                        stats.total += invoices[ix].amount;
                    }
                }
            }
        }

        return stats;
    }

    render() {
        return (
            <main>
                <MonthyStats monthly_stats={this.getMonthlyStats()} />
                <StatsCurrentYear stats={this.getStats()} />
                <OutstandingInvoices outstanding_invoices={this.getOutstandingInvoices()}/>
            </main>
        );
    }    
} 

export default Dashboard;