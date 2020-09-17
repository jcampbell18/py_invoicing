import React from 'react'
import './SubNav.css'
// dashboard
import img_projectsites from '../../img/icons/64x64/project_sites.png'
import img_invoicing from '../../img/icons/64x64/invoicing.png'
import img_bids from '../../img/icons/64x64/bids.png'
import img_clients from '../../img/icons/64x64/clients.png'
import img_sku from '../../img/icons/64x64/sku.png'
import img_mileage from '../../img/icons/64x64/mileage.png'
import img_terms from '../../img/icons/64x64/terms.png'
// content
import img_changelog from '../../img/icons/64x64/changelog.png'
import img_expenses from '../../img/icons/64x64/expenses.png'
import img_expense_categories from '../../img/icons/64x64/expense_categories.png'
import img_vendors from '../../img/icons/64x64/vendors.png'
import img_vehicles from '../../img/icons/64x64/vehicles.png'
import img_reports from '../../img/icons/64x64/reports.png'

class SubNav extends React.Component {

    getSubNav(nav) {
        switch(nav) {
            case "Content":
                return (
                    <ol>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_changelog} alt="Changelog" title="Changelog"/>
                                <h6>Changelog</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_expenses} alt="Expenses" title="Expenses"/>
                                <h6>Expenses</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_expense_categories} alt="Expense Categories" title="Expense Categories"/>
                                <h6>Expense Categories</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_vendors} alt="Vendors" title="Vendors"/>
                                <h6>Vendors</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_vehicles} alt="Vehicles" title="Vehicles"/>
                                <h6>Vehicles</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_reports} alt="Reports" title="Reports"/>
                                <h6>Reports</h6>
                            </a>
                        </li>
                    </ol>
                );
            default:
                return (
                    <ol>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_projectsites} alt="Project Sites" title="Project Sites"/>
                                <h6>Project Sites</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_invoicing} alt="Invoicing" title="Invoicing"/>
                                <h6>Invoicing</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_bids} alt="Bids" title="Bids"/>
                                <h6>Bids</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_clients} alt="Clients" title="Clients"/>
                                <h6>Clients</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_sku} alt="SKU" title="SKU"/>
                                <h6>SKU</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_mileage} alt="Mileage" title="Mileage"/>
                                <h6>Mileage</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick="">
                                <img src={img_terms} alt="Terms" title="Terms"/>
                                <h6>Terms</h6>
                            </a>
                        </li>
                    </ol>
                );
        }
    }

    render() {
        return (
            <aside>
                {
                    this.getSubNav(this.props.nav)
                }
            </aside>
        );
    }    
}

export default SubNav;