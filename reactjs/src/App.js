import React from 'react'
import Header from './components/Core/Header'
import SubNav from './components/Core/SubNav'
import Dashboard from './components/Dashboard'
import ProjectSites from './components/ProjectSites'
import Invoicing from './components/Invoicing'
import Bids from './components/Bids'
import Clients from './components/Clients'
import Sku from './components/Sku'
import Mileage from './components/Mileage'
import Terms from './components/Terms'
import Content from './components/Content'
import Users from './components/Users'
import Changelog from './components/Changelog'
import Expenses from './components/Expenses'
import ExpenseCategories from './components/ExpenseCategories'
import Vendors from './components/Vendors'
import Vehicles from './components/Vehicles'
import Reports from './components/Reports'
import Footer from './components/Core/Footer'
import './App.css'

class App extends React.Component {

    state = {
        nav: 'Dashboard',
        subnav: 'Dashboard'
    }

    onNavSelection = (nav) => {
        this.setState (
            {
                nav,
                subnav: nav
            }
        );
        // console.log("nav - state.nav: ", this.state.nav);
        // console.log("nav - state.subnav: ", this.state.subnav);
    }

    onSubNavSelection = (subnav) => {
        console.log("subnav: ", subnav);
        this.setState (
            {
                subnav: subnav
            }
        );
        // console.log("subnav - state.nav: ", this.state.nav);
        // console.log("subnav - state.subnav: ", this.state.subnav);
    }

    getPage() {
        // console.log("getPage: this.state.subnav = ", this.state.subnav);
        switch(this.state.subnav) {
            case 'Dashboard':
                return <Dashboard />
            case 'Project Sites':
                return <ProjectSites />
            case 'Invoicing':
                return <Invoicing />
            case 'Bids':
                return <Bids />
            case 'Clients':
                return <Clients />
            case 'Sku':
                return <Sku />
            case 'Mileage':
                return <Mileage />
            case 'Terms':
                return <Terms />
            case 'Content':
                return <Content />
            case 'Users':
                return <Users />
            case 'Changelog':
                return <Changelog />
            case 'Expenses':
                return <Expenses />
            case 'Expense Categories':
                return <ExpenseCategories />
            case 'Vendors':
                return <Vendors />
            case 'Vehicles':
                return <Vehicles />
            case 'Reports':
                return <Reports />
            default:
                return <Dashboard />
        }
    }

    render() {
        return (
            <div className="container">
                <Header
                    onNavSelection={this.onNavSelection} 
                />
                <SubNav 
                    nav={this.state.nav}
                    subnav={this.state.subnav}
                    onSubNavSelection={this.onSubNavSelection}    
                />
                {
                    this.getPage()
                }
                <Footer />
            </div>
        );
    }
}

export default App;
