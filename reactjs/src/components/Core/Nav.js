import React from 'react'
import './Nav.css'
import img_dashboard from '../../img/icons/512x512/dashboard.png'
import img_content from '../../img/icons/512x512/content.png'
import img_users from '../../img/icons/512x512/user.png'
import img_settings from '../../img/icons/512x512/settings.png'
import img_logout from '../../img/icons/512x512/logout.png'

class Nav extends React.Component {

    onDashboard = (e) => {
        e.preventDefault();
        const selection = 'Dashboard';
        this.props.onNavSelection(selection);
        console.log("selected: ", selection);
    }

    onContent = (e) => {
        e.preventDefault();
        const selection = 'Content';
        this.props.onNavSelection(selection);
    }

    onUsers = (e) => {
        e.preventDefault();
        const selection = 'Users';
        this.props.onNavSelection(selection);
    }

    onSettings = (e) => {
        e.preventDefault();
        const selection = 'Settings';
        this.props.onNavSelection(selection);
    }

    onLogout = (e) => {
        e.preventDefault();
        const selection = 'Logout';
        this.props.onNavSelection(selection);
    }

    render() {
        return (
            <nav>
                <ol>
                    <li>
                        <a href="/#" onClick={this.onDashboard}>
                            <img src={img_dashboard} alt="Dashboard" title="Dashboard"/>
                            <h6>Dashboard</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#" onClick={this.onContent}>
                            <img src={img_content} alt="Content" title="Content"/>
                            <h6>Content</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#" onClick={this.onUsers}>
                            <img src={img_users} alt="Users" title="Users"/>
                            <h6>Users</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#" onClick={this.onSettings}>
                            <img src={img_settings} alt="Settings" title="Settings"/>
                            <h6>Settings</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#" onClick={this.onLogout}>
                            <img src={img_logout} alt="Logout" title="Logout"/>
                            <h6>Logout</h6>
                        </a>
                    </li>
                </ol>
            </nav>
        );
    }    
}

export default Nav;