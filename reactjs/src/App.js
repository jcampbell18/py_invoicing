import React from 'react';
import Header from './components/Core/Header'
import SubNav from './components/Core/SubNav'
import Dashboard from './components/Dashboard'
import Footer from './components/Core/Footer'
import './App.css';

class App extends React.Component {

    state = {
        nav: 'Dashboard'
    }

    onNavSelection = (nav) => {
        this.setState (
            {
                nav
            }
        );
    }

    render() {
        return (
            <div className="container">
                <Header
                    onNavSelection={this.onNavSelection} 
                />
                <SubNav />
                <Dashboard />
                <Footer />
            </div>
        );
    }
}

export default App;
