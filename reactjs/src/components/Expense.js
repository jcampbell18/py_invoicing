import React from 'react'
import Moment from 'moment'

class Expense extends React.Component { 

    state = {
        expense_id: this.props.data.expense_id || null,
        invoice_id: this.props.data.invoice_id || null,
        company_id: this.props.data.company_id || null,
        expense_category_id: this.props.data.expense_category_id || null,
        vehicle_id: this.props.data.vehicle_id || null,
        pdate: this.props.data.pdate || null,
        name: this.props.data.name || null,
        quantity: this.props.data.quantity || 0,
        amount: this.props.data.amount || 0.00,
        subtotal: this.props.data.subtotal || 0.00,
        tax_included: this.props.data.tax_included || 0,
        tax: this.props.data.tax || 0.00,
        total: this.props.data.total || 0.00,
        receipt_reference: this.props.data.receipt_reference || null,
        receipt_image: this.props.data.receipt_image || null,
    }

    handleChange = (e) => {
        if (e.target.name === 'status') {
            if (e.target.value === 'approved') {
                this.setState(
                    {
                        approved: 1,
                        denied: 0
                    }
                );
            } else if (e.target.value === 'denied') {
                this.setState(
                    {
                        approved: 0,
                        denied: 1
                    }
                );
            }
        } else {
            this.setState(
                {
                    [e.target.name]: e.target.name === 'bid_date' ? Moment(e.target.value).format('MM-DD-YYYY') : e.target.value
                }
            );
        }
    }

    handleSubmit = () => {
        console.log("state: ", this.state);
    }

    render() {  

        return (
            <main>
                <section className="add-new">
                    <h6>{this.props.title}: {this.state.bid_id === null ? "Add New" : "Update Record"}</h6>
                    <ul>
                        <li>
                            <p className="heading">Date: </p>
                        </li>
                        <li>
                            <input type="date" name="pdate" value={this.state.pdate === null ? this.state.value : Moment(this.props.data.pdate).format('YYYY-MM-DD')} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Category: </p>
                        </li>
                        <li>
                            <select name="expense_category_id" value={this.state.expense_category_id === null ? this.state.value : this.state.expense_category_id} onChange={this.handleChange} >
                                { 
                                    this.state.expense_category_id === null ? <option defaultValue value="">select a category</option> : null
                                }
                                {
                                    this.props.expense_categories.map(expense_category =>
                                        <option value={expense_category.expense_category_id} key={expense_category.expense_category_id}>{expense_category.name}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Invoice #: </p>
                        </li>
                        <li>
                            <select name="invoice_id" value={this.state.invoice_id === null ? this.state.value : this.state.invoice_id} onChange={this.handleChange} >
                                <option defaultValue value="">no invoice</option>
                                {
                                    this.props.invoices.map(invoice =>
                                        <option value={invoice.invoice_id} key={invoice.invoice_id}>{invoice.invoice_id}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Client: </p>
                        </li>
                        <li>
                            <select name="company_id" value={this.state.company_id === null ? this.state.value : this.state.company_id} onChange={this.handleChange} >
                                { 
                                    this.state.company_id === null ? <option defaultValue value="">select a company</option> : null
                                }
                                {
                                    this.props.clients.map(client =>
                                        <option value={client.company_id} key={client.company_id}>{client.business_name}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Vehicle: </p>
                        </li>
                        <li>
                            <select name="vehicle_id" value={this.state.vehicle_id === null ? this.state.value : this.state.vehicle_id} onChange={this.handleChange} >
                                <option value="null">no vehicle</option>
                                {
                                    this.props.vehicles.map(vehicle =>
                                    <option value={vehicle.vehicle_id} key={vehicle.vehicle_id}>{vehicle.man_year} {vehicle.make} {vehicle.model}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Item Name: </p>
                        </li>
                        <li>
                            <input type="text" name="name" value={this.state.name === 0.00 ? this.state.value : this.state.name} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Quantity: </p>
                        </li>
                        <li>
                            <input type="text" name="quantity" value={this.state.quantity === 0 ? this.state.value : this.state.quantity} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Amount: </p>
                        </li>
                        <li>
                            <input type="text" name="amount" value={this.state.amount === 0.00 ? this.state.value : this.state.amount} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Subtotal: </p>
                        </li>
                        <li>
                            <input type="text" readOnly="readonly" name="subtotal" value={this.state.subtotal === 0.00 ? this.state.value : this.state.subtotal} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Tax Included? {this.state.tax_included}</p>
                        </li>
                        <li>
                            <select name="tax_included" value={this.state.value} onChange={this.handleChange} >
                                <option value="0" defaultValue>No, Tax Exempt</option>
                                <option value="1">Yes, Taxed Item</option>
                            </select>
                        </li>  
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Tax Amount: </p>
                        </li>
                        <li>
                            <input type="text" name="tax" value={this.state.tax === 0.00 ? this.state.value : this.state.tax} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Total: </p>
                        </li>
                        <li>
                            <input type="text" readOnly="readonly" name="total" value={this.state.total === 0.00 ? this.state.value : this.state.total} onChange={this.handleChange} />
                        </li> 
                    </ul>
 {/* 
 e.receipt_reference, e.receipt_image 
 */}
                    <ul>
                        <li>
                            <p className="heading">Receipt Reference: </p>
                        </li>
                        <li>
                            <input type="text" name="receipt_reference" value={this.state.receipt_reference === 0.00 ? this.state.value : this.state.receipt_reference} onChange={this.handleChange} />
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="button" className="buttons" value="Cancel" />
                        </li>
                        <li className="button-end">
                            <input type="submit" className="buttons" value={this.state.bid_id === null ? "Add" : "Update"} onClick={this.handleSubmit} />
                        </li>
                    </ul>
                </section>
            </main>
        );
    }
}

export default Expense