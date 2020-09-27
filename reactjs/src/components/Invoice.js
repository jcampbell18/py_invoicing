import React from 'react'
import Moment from 'moment'

class Invoice extends React.Component {

    state = {
        invoice_id: this.props.data.invoice_id || null,
        company_id: this.props.data.company_id || null,
        project_site_id: this.props.data.project_site_id || null,
        sku_id: this.props.data.sku_id || null,
        bid_id: this.props.data.bid_id || null,
        term_id: this.props.data.term_id || null,
        start_date: this.props.data.start_date || null,
        end_date: this.props.data.end_date || null,
        description: this.props.data.description || null,
        amount: this.props.data.amount || 0.00,
        receipts: this.props.data.receipts || null,
        images: this.props.data.images || null,
        image_links: this.props.data.image_links || null,
        mileage_id: this.props.data.mileage_id || null,
        loan_amount: this.props.data.loan_amount || 0.00,
        loan_paid: this.props.data.loan_paid || null,
        interest_amount: this.props.data.interest_amount || 0.00,
        interest_paid: this.props.data.interest_paid || null,
        complete: this.props.data.complete || null,
        paid: this.props.data.paid || null,
        paid_checknum: this.props.data.paid_checknum || null,
        paid_date: this.props.data.paid_date || null,
        project_cost: this.props.data.project_cost || 0.00,
        save_tax: this.props.data.save_tax || 0.00,
        actual_net: this.props.data.actual_net || 0.00,
    }

    handleChange = (e) => {
        this.setState(
            {
                [e.target.name]: e.target.name
            }
        );
    }

    handleSubmit = () => {
        console.log("state: ", this.state);
        console.log("this.props.bids: ", this.props.bids);
    }

    render() {  

        // let 

        return (
            <main>
                <section className="add-new">
                    <h6>{this.props.title}: {this.state.invoice_id === null ? "Add New" : "Update Record"}</h6>
                    <ul>
                        <li>
                            <p className="heading">Invoice #: </p>
                        </li>
                        <li>
                            <input type="text" name="invoice_id" readOnly="readonly" placeholder="will be assigned after being added" defaultValue={this.state.invoice_id === null ? "" : this.state.invoice_id}/>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Bid #: </p>
                        </li>
                        <li>
                            <select name="bid_id" value={this.state.bid_id === null ? this.state.value : this.state.bid_id} onChange={this.handleChange} >
                                { 
                                    this.state.bid_id === null ? <option defaultValue value="0">no bid attached</option> : null
                                }
                                {
                                    this.props.bids.map(bid =>
                                        <option value={bid.bid_id} key={bid.bid_id}>{bid.bid_id} - {bid.address} ({bid.sku_name})</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Start Date: </p>
                        </li>
                        <li>
                            <input type="date" name="start_date" value={this.state.start_date === null ? this.state.value : Moment(this.props.data.start_date).format('YYYY-MM-DD')} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Completed Date: </p>
                        </li>
                        <li>
                            <input type="date" name="end_date" value={this.state.end_date === null ? this.state.value : Moment(this.props.data.end_date).format('YYYY-MM-DD')} onChange={this.handleChange} />
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
                            <p className="heading">Project Site: </p>
                        </li>
                        <li>
                            <select name="project_site_id" value={this.state.project_site_id === null ? this.state.value : this.state.project_site_id} onChange={this.handleChange} >
                                { 
                                    this.state.project_site_id === null ? <option defaultValue value="">select a project site</option> : null
                                }
                                {
                                    this.props.project_sites.map(project_site =>
                                        <option value={project_site.project_site_id} key={project_site.project_site_id}>{project_site.address}, {project_site.city}, {project_site.state} {project_site.zipcode}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Work Performing: </p>
                        </li>
                        <li>
                            <select name="sku_id" value={this.state.sku_id === null ? this.state.value : this.state.sku_id} onChange={this.handleChange} >
                                { 
                                    this.state.project_site_id === null ? <option defaultValue value="">select a sku</option> : null
                                }
                                {
                                    this.props.sku.map(sk =>
                                        <option value={sk.sku_id} key={sk.sku_id}>{sk.name}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Description: </p>
                        </li>
                        <li>
                            <textarea name="description" rows="5" className="textarea-s" placeholder="select a sku to get started" value={this.state.description === null ? this.state.value : this.state.description} onChange={this.handleChange} />
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
                            <p className="heading">Completed? </p>
                        </li>
                        <li>
                            <select name="complete" value={this.state.complete === null ? this.state.value : this.state.complete} onChange={this.handleChange} >
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Paid? </p>
                        </li>
                        <li>
                            <select name="paid" value={this.state.paid === null ? this.state.value : this.state.paid} onChange={this.handleChange} >
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Paid Date/Check # </p>
                        </li>
                        <li>
                            <input type="date" name="paid_date" value={this.state.paid_date === null ? this.state.value : Moment(this.props.data.paid_date).format('YYYY-MM-DD')} onChange={this.handleChange} />&nbsp;
                            <input type="text" name="paid_checknum" value={this.state.paid_checknum === null ? this.state.value : this.state.paid_checknum} onChange={this.handleChange} className="small" />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Loan Amount</p>
                        </li>
                        <li>
                            <input type="text" name="loan_amount" value={this.state.loan_amount === 0.00 ? this.state.value : this.state.loan_amount} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Loan Paid? </p>
                        </li>
                        <li>
                            <select name="loan_paid" value={this.state.loan_paid === null ? this.state.value : this.state.loan_paid} onChange={this.handleChange} >
                                <option value="0" defaultValue>No</option>
                                <option value="1">Yes</option>
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Interest Amount</p>
                        </li>
                        <li>
                            <input type="text" name="interest_amount" value={this.state.interest_amount === 0.00 ? this.state.value : this.state.interest_amount} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Interest Paid? </p>
                        </li>
                        <li>
                            <select name="interest_paid" value={this.state.interest_paid === null ? this.state.value : this.state.interest_paid} onChange={this.handleChange} >
                                <option value="0" defaultValue>No</option>
                                <option value="1">Yes</option>
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Cost of Project: </p>
                        </li>
                        <li>
                            <input type="text" name="project_cost" value={this.state.project_cost === 0.00 ? this.state.value : this.state.project_cost} onChange={this.handleChange} />
                        </li>  
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Save for Taxes (35%): </p>
                        </li>
                        <li>
                            <input type="text" name="save_tax" value={this.state.save_tax === 0.00 ? this.state.value : this.state.save_tax} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Actual Net: </p>
                        </li>
                        <li>
                            <input type="text" name="actual_net" value={this.state.actual_net === 0.00 ? this.state.value : this.state.actual_net} onChange={this.handleChange} />
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <input type="button" className="buttons" value="Cancel" />
                        </li>
                        <li className="button-end">
                            <input type="submit" className="buttons" value={this.state.invoice_id === null ? "Add New" : "Update Record"} onClick={this.handleSubmit} />
                        </li>
                    </ul>
                </section>
            </main>
        );
    }
}

export default Invoice