import React from 'react'
import './SubNav.css'
// dashboard
import img_projectsites from '../../img/icons/64x64/project_sites.png'
import img_invoices from '../../img/icons/64x64/invoices.png'
import img_bids from '../../img/icons/64x64/bids.png'
import img_mileage from '../../img/icons/64x64/mileage.png'
import img_expenses from '../../img/icons/64x64/expenses.png'
import img_reports from '../../img/icons/64x64/reports.png'
// content
import img_clients from '../../img/icons/64x64/clients.png'
import img_vendors from '../../img/icons/64x64/vendors.png'
import img_expense_categories from '../../img/icons/64x64/expense_categories.png'
import img_sku from '../../img/icons/64x64/sku.png'
import img_terms from '../../img/icons/64x64/terms.png'
import img_vehicles from '../../img/icons/64x64/vehicles.png'
//other
import img_changelog from '../../img/icons/64x64/changelog.png'
import img_back from '../../img/icons/64x64/back-arrow.png'
import img_add from '../../img/icons/64x64/add.png'

class SubNav extends React.Component {

    onSubMenuSelection = (e) => {
        e.preventDefault();
        const sel = e.currentTarget.querySelector('h6').innerHTML;

        if (sel === 'Back') {
            this.props.onSubNavSelection(this.props.nav);
        } else {
            this.props.onSubNavSelection(sel);
        }
    }

    onAdd = (e) => {
        e.preventDefault();
        
        if (this.props.subnav.substring(this.props.subnav.length-3) === 'ies') {
            this.props.onSubNavSelection(this.props.subnav.substring(0, this.props.subnav.length-3) + 'y');
        } else {
            this.props.onSubNavSelection(this.props.subnav.substring(0, this.props.subnav.length-1));
        }
    }

    getSubNav() {
        switch(this.props.subnav) {
            case "Dashboard":
                return (
                    <ol>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_projectsites} alt="Project Sites" title="Project Sites"/>
                                <h6 className="title">Project Sites</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_invoices} alt="Invoices" title="Invoices"/>
                                <h6>Invoices</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_bids} alt="Bids" title="Bids"/>
                                <h6>Bids</h6>
                            </a>
                        </li>                       
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_mileage} alt="Mileages" title="Mileages"/>
                                <h6>Mileages</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_expenses} alt="Expenses" title="Expenses"/>
                                <h6>Expenses</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_reports} alt="Reports" title="Reports"/>
                                <h6>Reports</h6>
                            </a>
                        </li>
                    </ol>
                );
            case "Content":
                return (
                    <ol>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_clients} alt="Clients" title="Clients"/>
                                <h6>Clients</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_vendors} alt="Vendors" title="Vendors"/>
                                <h6>Vendors</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_expense_categories} alt="Expense Categories" title="Expense Categories"/>
                                <h6>Expense Categories</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_sku} alt="SKU" title="SKU"/>
                                <h6>Skus</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_terms} alt="Terms" title="Terms"/>
                                <h6>Terms</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_vehicles} alt="Vehicles" title="Vehicles"/>
                                <h6>Vehicles</h6>
                            </a>
                        </li>
                    </ol>
                );
                case "Settings":
                    return (
                        <ol>
                            <li>
                                <a href="/#" onClick={this.onSubMenuSelection}>
                                    <img src={img_changelog} alt="Changelog" title="Changelog"/>
                                    <h6>Changelog</h6>
                                </a>
                            </li>
                        </ol>
                    );
            case "Project Site":
            case "Invoice":
            case "Bid":
            case "Mileage":
            case "Expense":
            case "Client":
            case "Vendor":
            case "Expense Category":
            case "Sku":
            case "Term":
            case "Vehicle":
                return (
                    <ol>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_back} alt="Back" title="Back"/>
                                <h6>Back</h6>
                            </a>
                        </li>
                        {/* <li>
                            <a href="/#" onClick={this.onAdd}>
                                <img src={img_add} alt="Add New" title="Add New"/>
                                <h6>Add</h6>
                            </a>
                        </li> */}
                    </ol>
                );
            default:
                return (
                    <ol>
                        <li>
                            <a href="/#" onClick={this.onSubMenuSelection}>
                                <img src={img_back} alt="Back" title="Back"/>
                                <h6>Back</h6>
                            </a>
                        </li>
                        <li>
                            <a href="/#" onClick={this.onAdd}>
                                <img src={img_add} alt="Add New" title="Add New"/>
                                <h6>Add</h6>
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
                    this.getSubNav()
                }
            </aside>
        );
    }    
}

export default SubNav;