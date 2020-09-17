import React from 'react'
import Nav from './Nav'
import './Header.css'
import img_current_user from '../../img/jcampbell.jpg'

class Header extends React.Component {
    render() {
      return (
        <header>
            <section className="title_area">
                <h1>Doc<span className="orange">Jas</span>.com</h1>
                <h4>repair &amp; renovation</h4>
            </section>
            <section className="login_area">
                <h5>Welcome User!</h5>
                <h6 className="access_level">logged in as <span className="white">accesslevel</span></h6>
                <h6 className="timestamp orange">12:59pm 10/10/2020</h6>
                <img src={img_current_user} alt="Jason Campbell" title="Jason Campbell"/>
            </section>      
            <Nav 
                onNavSelection={this.props.onNavSelection}
            />
        </header>
      );
    }
}

export default Header;
  