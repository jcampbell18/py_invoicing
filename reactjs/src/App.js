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

import Mileages from './components/Mileages'
import Mileage from './components/Mileage'

import Expenses from './components/Expenses'
import Reports from './components/Reports'

import Content from './components/Content'

import Clients from './components/Clients'
import Client from './components/Client'

import Vendors from './components/Vendors'
import Vendor from './components/Vendor'

import ExpenseCategories from './components/ExpenseCategories'
import ExpenseCategory from './components/ExpenseCategory'

import Skus from './components/Skus'
import Sku from './components/Sku'

import Terms from './components/Terms'
import Term from './components/Term'

import Vehicles from './components/Vehicles'
import Vehicle from './components/Vehicle'

import Users from './components/Users'
import Changelogs from './components/Changelogs'

import Footer from './components/Core/Footer'
import './App.css'

class App extends React.Component {

    state = {
        nav: 'Dashboard',
        subnav: 'Dashboard',

        project_sites: {},
        invoices: {},
        bids: {},
        mileages: {},
        expenses: {},
        reports: {},

        clients: {},
        vendors: {},
        expense_categories: {},
        skus: {},       
        terms: {},
        vehicles: {},

        states: {},
        changelogs: {},
        changelog_categories: {},   

        data: null,
        title: null,
        // action: null,
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
                // action: "Edit or Update",
                data
            }
        );
    }

    getPage() {
        switch(this.state.subnav) {
            case 'Dashboard':
                return <Dashboard invoices={this.state.invoices} />
            case 'Project Sites':
                return <ProjectSites project_sites={this.state.project_sites} onDataSelection={this.onDataSelection} />
            case 'Project Site':
                return <ProjectSite title={this.state.subnav} states={this.state.states} data={this.state.data} />
            case 'Invoices':
                return <Invoices invoices={this.state.invoices} onDataSelection={this.onDataSelection} />
            case 'Invoice':
                return <Invoice title={this.state.subnav} clients={this.state.clients} project_sites={this.state.project_sites} sku={this.state.sku} data={this.state.data} bids={this.state.bids} />
            case 'Bids':
                return <Bids bids={this.state.bids} onDataSelection={this.onDataSelection} />
            case 'Bid':
                return <Bid title={this.state.subnav} clients={this.state.clients} project_sites={this.state.project_sites} skus={this.state.skus} data={this.state.data} />
            case 'Mileages':
                return <Mileages mileages={this.state.mileages} onDataSelection={this.onDataSelection} />
            case 'Mileage':
                return <Mileage title={this.state.subnav} vehicles={this.state.vehicles} project_sites={this.state.project_sites} invoices={this.state.invoices} data={this.state.data} />
            case 'Expenses':
                return <Expenses expenses={this.state.expenses} onDataSelection={this.onDataSelection} />
            case 'Reports':
                return <Reports onDataSelection={this.onDataSelection} />

            case 'Content':
                return <Content />
            case 'Clients':
                return <Clients clients={this.state.clients} onDataSelection={this.onDataSelection} />
            case 'Client':
                return <Client title={this.state.subnav} states={this.state.states} data={this.state.data} />
            case 'Vendors':
                return <Vendors vendors={this.state.vendors} onDataSelection={this.onDataSelection} />
            case 'Vendor':
                return <Vendor title={this.state.subnav} states={this.state.states} data={this.state.data} />
            case 'Expense Categories':
                return <ExpenseCategories expense_categories={this.state.expense_categories} onDataSelection={this.onDataSelection} />
            case 'Expense Category':
                return <ExpenseCategory title={this.state.subnav} data={this.state.data} />
            case 'Skus':
                return <Skus skus={this.state.skus} onDataSelection={this.onDataSelection} />
            case 'Sku':
                return <Sku title={this.state.subnav} data={this.state.data} />
            case 'Terms':
                return <Terms terms={this.state.terms} onDataSelection={this.onDataSelection} />
            case 'Term':
                return <Term title={this.state.subnav} data={this.state.data} />
            case 'Vehicles':
                return <Vehicles vehicles={this.state.vehicles} onDataSelection={this.onDataSelection} />
            case 'Vehicle':
                return <Vehicle title={this.state.subnav} data={this.state.data} />

            case 'Users':
                return <Users />
            case 'Changelog':
                console.log("this.state.changelogs: ", this.state.changelogs);
                return <Changelogs changelogs={this.state.changelogs} />
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
        this.getMileages();
        this.getProjectSites();
        this.getSkus();
        this.getTerms();
        this.getVehicles();
        this.getVendors();
        this.getStates();
    }

    getBids() {
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

    getMileages() {
        fetch('http://localhost:5000/api/mileages', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    mileages: result
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

    getSkus() {
        fetch('http://localhost:5000/api/skus', {
            method: "GET"
        }).then(response => {
            return response.json();
        }).then(result => {
            this.setState(
                {
                    skus: result
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
