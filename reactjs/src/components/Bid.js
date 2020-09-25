import React from 'react'
import Moment from 'moment'

class Bid extends React.Component {

    state = {
        bid_id: this.props.data.bid_id || null,
        company_id: this.props.data.company_id || null,
        project_site_id: this.props.data.project_site_id || null,
        sku_id: this.props.data.sku_id || null,
        bid_date: this.props.data.bid_date || null,
        description: this.props.data.description || null,
        amount: this.props.data.amount || 0.00,
        approve: this.props.data.approve || 0,
        denied: this.props.data.denied || 0,
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

        // let 

        return (
            <main>
                <section className="add-new">
                    <h6>{this.props.title}: Add New</h6>
                    <ul>
                        <li>
                            <p className="heading">Bid #: </p>
                        </li>
                        <li>
                            <input type="text" name="bid_id" readOnly="readonly" placeholder="will be assigned after being added" defaultValue={this.state.bid_id === null ? "" : this.state.bid_id}/>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Date: </p>
                        </li>
                        <li>
                            <input type="date" name="bid_date" value={this.state.bid_date === null ? this.state.value : Moment(this.props.data.bid_date).format('YYYY-MM-DD')} onChange={this.handleChange} />
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
                            <p className="heading">Status: </p>
                        </li>
                        <li>
                            <select name="status" value={this.state.value} onChange={this.handleChange} >
                                <option value="waiting" defaultValue>Waiting</option>
                                <option value="approved">Approved</option>
                                <option value="denied">Denied/Expired</option>
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <input type="button" className="buttons" value="Cancel" />
                        </li>
                        <li className="button-end">
                            <input type="submit" className="buttons" value="Add" onClick={this.handleSubmit} />
                        </li>
                    </ul>
                </section>
            </main>
        );
    }
}

export default Bid