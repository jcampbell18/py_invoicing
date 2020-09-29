import React from 'react'
import Moment from 'moment'

class Mileage extends React.Component {

    state = {
        mileage_id: this.props.data.mileage_id || null,
        project_site_id: this.props.data.project_site_id || null,
        vehicle_id: this.props.data.vehicle_id || null,
        invoice_id1: this.props.data.invoice_id1 || null,
        invoice_id2: this.props.data.invoice_id2 || null,
        invoice_id3: this.props.data.invoice_id3 || null,
        drive_date: this.props.data.drive_date || null,
        start_mileage: this.props.data.start_mileage || null,
        end_mileage: this.props.data.end_mileage || null,
        subtotal: this.props.data.subtotal || 0,
        notes: this.props.data.notes || null,
    }

    handleChange = (e) => {

        if (e.target.name === "end_mileage") {
            const subtotal = parseInt(e.target.value) - parseInt(this.state.start_mileage);
            this.setState(
                {
                    subtotal
                }
            );
        }

        this.setState(
            {
                [e.target.name]: e.target.name
            }
        );
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
                            <p className="heading">Vehicle: </p>
                        </li>
                        <li>
                            <select name="vehicle_id" value={this.state.vehicle_id === null ? this.state.value : this.state.vehicle_id} onChange={this.handleChange} >
                                { 
                                    this.state.vehicle_id === null ? <option defaultValue value="">select a vehicle</option> : null
                                }
                                {
                                    this.props.vehicles.map(vehicle =>
                                        <option value={vehicle.vehicle_id} key={vehicle.vehicle_id}>{vehicle.man_year} {vehicle.make} {vehicle.model} {vehicle.submodel}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Link to Project Site: </p>
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
                            <p className="heading">Link to Invoice (1): </p>
                        </li>
                        <li>
                            <select name="invoice_id1" value={this.state.invoice_id1 === null ? this.state.value : this.state.invoice_id1} onChange={this.handleChange} >
                                { 
                                    this.state.invoice_id1 === null ? <option defaultValue value="0">no invoice</option> : <option defaultValue value="0">no invoice</option>
                                }
                                {
                                    this.props.invoices.map(invoice =>
                                        <option value={invoice.invoice_id} key={invoice.invoice_id}>Invoice #{invoice.invoice_id}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Link to Invoice (2): </p>
                        </li>
                        <li>
                            <select name="invoice_id2" value={this.state.invoice_id2 === null ? this.state.value : this.state.invoice_id2} onChange={this.handleChange} >
                                { 
                                    this.state.invoice_id2 === null ? <option defaultValue value="0">no invoice</option> : <option defaultValue value="0">no invoice</option>
                                }
                                {
                                    this.props.invoices.map(invoice =>
                                        <option value={invoice.invoice_id} key={invoice.invoice_id}>Invoice #{invoice.invoice_id}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Link to Invoice (3): </p>
                        </li>
                        <li>
                            <select name="invoice_id3" value={this.state.invoice_id3 === null ? this.state.value : this.state.invoice_id3} onChange={this.handleChange} >
                                { 
                                    this.state.invoice_id3 === null ? <option defaultValue value="0">no invoice</option> : <option defaultValue value="0">no invoice</option>
                                }
                                {
                                    this.props.invoices.map(invoice =>
                                        <option value={invoice.invoice_id} key={invoice.invoice_id}>Invoice #{invoice.invoice_id}</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Drive Date: </p>
                        </li>
                        <li>
                            <input type="date" name="drive_date" value={this.state.drive_date === null ? this.state.value : Moment(this.props.data.drive_date).format('YYYY-MM-DD')} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Start Mileage: </p>
                        </li>
                        <li>
                            <input type="text" name="start_mileage" value={this.state.start_mileage === 0.00 ? this.state.value : this.state.start_mileage} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">End Mileage: </p>
                        </li>
                        <li>
                            <input type="text" name="end_mileage" value={this.state.end_mileage === 0.00 ? this.state.value : this.state.end_mileage} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Subtotal: </p>
                        </li>
                        <li>
                            <input type="text" readOnly="readonly" name="subtotal" value={this.state.subtotal === 0 ? this.state.value : this.state.subtotal} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Notes: </p>
                        </li>
                        <li>
                            <textarea name="notes" rows="5" className="textarea-s" value={this.state.notes === null ? this.state.value : this.state.notes} onChange={this.handleChange} />
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

export default Mileage