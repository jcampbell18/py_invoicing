import React from 'react'
import './Nav.css'
import img_dashboard from '../../img/icons/32x32/dashboard.png' 
import img_content from '../../img/icons/32x32/content.png'
import img_users from '../../img/icons/32x32/user.png'
import img_settings from '../../img/icons/32x32/settings.png'
import img_logout from '../../img/icons/32x32/logout.png'

class Nav extends React.Component {

    onMenuSelection = (e) => {
        e.preventDefault();
        this.props.onNavSelection(e.target.innerHTML);
    }

    render() {
        return (
            <nav>
                <ol>
                    <li>
                        <a href="/#" onClick={this.onMenuSelection} data="Dashboard">
                            <img src={img_dashboard} alt="Dashboard" title="Dashboard"/>
                            <h6>Dashboard</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#" onClick={this.onMenuSelection}>
                            <img src={img_content} alt="Content" title="Content"/>
                            <h6>Content</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#" onClick={this.onMenuSelection}>
                            <img src={img_users} alt="Users" title="Users"/>
                            <h6>Users</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#" onClick={this.onMenuSelection}>
                            <img src={img_settings} alt="Settings" title="Settings"/>
                            <h6>Settings</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#" onClick={this.onMenuSelection}>
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