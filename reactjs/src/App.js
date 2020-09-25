import React from 'react'
import Header from './components/Core/Header'
import SubNav from './components/Core/SubNav'
import Dashboard from './components/Dashboard'
import ProjectSites from './components/ProjectSites'
import ProjectSite from './components/ProjectSite'
import Invoices from './components/Invoices'
import Invoice from './components/Invoice'
import Bids from './components/Bids'
import Bid from './components/Bid'
import Clients from './components/Clients'
import Sku from './components/Sku'
import Mileage from './components/Mileage'
import Terms from './components/Terms'
import Content from './components/Content'
import Users from './components/Users'
import Changelogs from './components/Changelogs'
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
        subnav: 'Dashboard',

        project_sites: {},
        invoices: {},
        bids: {},
        mileage: {},
        expenses: {},
        reports: {},

        clients: {},
        vendors: {},
        expense_categories: {},
        sku: {},       
        terms: {},
        vehicles: {},

        states: {},
        changelogs: {},
        changelog_categories: {},   

        data: null,
        title: null,
    }

    componentDidMount() {
        this.getData();
    }

    onNavSelection = (nav) => {
        this.setState (
            {
                nav,
                subnav: nav
            }
        );
    }

    onSubNavSelection = (subnav) => {
        this.setState (
            {
                subnav: subnav
            }
        );
    }

    onDataSelection = (subnav, data) => {
        this.setState(
            {
                subnav,
                data
            }
        );
    }

    getPage() {
        switch(this.state.subnav) {
            case 'Dashboard':
                return <Dashboard />
            case 'Project Sites':
                return <ProjectSites project_sites={this.state.project_sites} />
            case 'Project Site':
                return <ProjectSite title={this.state.subnav} states={this.state.states} />
            case 'Invoices':
                return <Invoices invoices={this.state.invoices} />
            case 'Invoice':
                return <Invoice title={this.state.subnav} states={this.state.states} />
            case 'Bids':
                return <Bids bids={this.state.bids} onDataSelection={this.onDataSelection}/>
            case 'Bid':
                return <Bid title={this.state.subnav} clients={this.state.clients} project_sites={this.state.project_sites} sku={this.state.sku} data={this.state.data} />
            case 'Clients':
                return <Clients clients={this.state.clients} />
            case 'Sku':
                return <Sku sku={this.state.sku} />
            case 'Mileage':
                return <Mileage mileage={this.state.mileage} />
            case 'Terms':
                return <Terms terms={this.state.terms} />
            case 'Content':
                return <Content />
            case 'Users':
                return <Users />
            case 'Changelog':
                console.log("this.state.changelogs: ", this.state.changelogs);
                return <Changelogs changelogs={this.state.changelogs} />
            case 'Expenses':
                return <Expenses expenses={this.state.expenses} />
            case 'Expense Categories':
                return <ExpenseCategories expense_categories={this.state.expense_categories} />
            case 'Vendors':
                return <Vendors vendors={this.state.vendors} />
            case 'Vehicles':
                return <Vehicles vehicles={this.state.vehicles} />
            case 'Reports':
                return <Reports />
            default:
                return <Dashboard />
        }
    }

    getData() {
        this.getBids();
        this.getChangelogs();
        this.getChangelogCategories();
        this.getClients();
        this.getExpenses();
        this.getExpenseCategories();
        this.getInvoices();
        this.getMileage();
        this.getProjectSites();
        this.getSku();
        this.getTerms();
        this.getVehicles();
        this.getVendors();
        this.getStates();
    }

    getBids() {
        fetch('http://localhost:5000/api/bids/full', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    bids: result
                }
            );
        });
    }

    getBidsById() {
        fetch('http://localhost:5000/api/bids', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    bids: result
                }
            );
        });
    }

    getChangelogs() {
        fetch('http://localhost:5000/api/changelogs', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    changelogs: result
                }
            );
        });
    }

    getChangelogCategories() {
        fetch('http://localhost:5000/api/changelog_categories', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    changelog_categories: result
                }
            );
        });
    }

    getClients() {
        fetch('http://localhost:5000/api/clients', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    clients: result
                }
            );
        });
    }

    getExpenses() {
        fetch('http://localhost:5000/api/expenses', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    expenses: result
                }
            );
        });
    }

    getExpenseCategories() {
        fetch('http://localhost:5000/api/expense_categories', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    expense_categories: result
                }
            );
        });
    }

    getInvoices() {
        fetch('http://localhost:5000/api/invoices', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    invoices: result
                }
            );
        });
    }

    getMileage() {
        fetch('http://localhost:5000/api/mileage', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    mileage: result
                }
            );
        });
    }

    getProjectSites() {
        fetch('http://localhost:5000/api/project_sites', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    project_sites: result
                }
            );
        });
    }

    getSku() {
        fetch('http://localhost:5000/api/sku', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    sku: result
                }
            );
        });
    }

    getStates() {
        fetch('http://localhost:5000/api/states', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    states: result
                }
            );
        });
    }

    getTerms() {
        fetch('http://localhost:5000/api/terms', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    terms: result
                }
            );
        });
    }

    getVehicles() {
        fetch('http://localhost:5000/api/vehicles', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    vehicles: result
                }
            );
        });
    }

    getVendors() {
        fetch('http://localhost:5000/api/vendors', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    vendors: result
                }
            );
        });
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
