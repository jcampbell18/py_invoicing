import React from 'react'
import './SubNav.css'
import img_projectsites from '../../img/icons/512x512/project_sites.png'
import img_invoicing from '../../img/icons/512x512/invoicing.png'
import img_bids from '../../img/icons/512x512/bids.png'
import img_users from '../../img/icons/512x512/users.png'
import img_sku from '../../img/icons/512x512/sku.png'
import img_mileage from '../../img/icons/512x512/mileage.png'
import img_terms from '../../img/icons/512x512/terms.png'

class SubNav extends React.Component {
    render() {
        return (
            <aside>
                <ol>
                    <li>
                        <a href="/#">
                            <img src={img_projectsites} alt="Project Sites" title="Project Sites"/>
                            <h6>Project Sites</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_invoicing} alt="Invoicing" title="Invoicing"/>
                            <h6>Invoicing</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_bids} alt="Bids" title="Bids"/>
                            <h6>Bids</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_users} alt="Clients" title="Clients"/>
                            <h6>Clients</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_sku} alt="SKU" title="SKU"/>
                            <h6>SKU</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_mileage} alt="Mileage" title="Mileage"/>
                            <h6>Mileage</h6>
                        </a>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_terms} alt="Terms" title="Terms"/>
                            <h6>Terms</h6>
                        </a>
                    </li>
                </ol>
            </aside>
        );
    }    
}

export default SubNav;