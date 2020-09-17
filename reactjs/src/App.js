import React from 'react';
import Header from './components/Core/Header'
import SubNav from './components/Core/SubNav'
import Dashboard from './components/Dashboard'
import Content from './components/Content'
import Users from './components/Users'
import Footer from './components/Core/Footer'
import './App.css';

class App extends React.Component {

    state = {
        nav: 'Dashboard',
    }

    onNavSelection = (nav) => {
        this.setState (
            {
                nav
            }
        );
    }

    getPage() {
        switch(this.state.nav) {
            case "Content":
                return <Content />
            case "Users":
                return <Users />
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
                <SubNav nav={this.state.nav} />
                {
                    this.getPage()
                }
                <Footer />
            </div>
        );
    }
}

export default App;
