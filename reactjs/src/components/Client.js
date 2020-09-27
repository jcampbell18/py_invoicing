import React from 'react'

class Client extends React.Component {

    state = {
        company_id: this.props.data.company_id || null,
        company_category_id: this.props.data.company_category_id || 1,
        business_name: this.props.data.business_name || null,
        contact_name:  this.props.data.contact_name || null,
        address: this.props.data.address || null,
        city: this.props.data.city || null,
        state_id: this.props.data.state_id || null,
        zipcode: this.props.data.zipcode || null,
        phone: this.props.data.phone || null,
        fax: this.props.data.fax || null,
        email: this.props.data.email || null,
        website: this.props.data.website || null,
        logo_image: this.props.data.logo_image || null,
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
    }

    render() { 

        return (
            <main>
                <section className="add-new">
                    <h6>{this.props.title}: {this.state.company_id === null ? "Add New" : "Update Record"}</h6>
                    <ul>
                        <li>
                            <p className="heading">Business Name: </p>
                        </li>
                        <li>
                            <input type="text" name="business_name" value={this.state.business_name === null ? this.state.value : this.state.business_name} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Contact Name: </p>
                        </li>
                        <li>
                            <input type="text" name="contact_name" value={this.state.contact_name === null ? this.state.value : this.state.contact_name} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Address: </p>
                        </li>
                        <li>
                            <input type="text" name="address" value={this.state.address === null ? this.state.value : this.state.address} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">City: </p>
                        </li>
                        <li>
                            <input type="text" name="city" value={this.state.city === null ? this.state.value : this.state.city} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">State: </p>
                        </li>
                        <li>
                            <select name="state_id" value={this.state.state_id === null ? this.state.value : this.state.state_id} onChange={this.handleChange} >
                                { 
                                    this.state.state_id === null ? <option defaultValue value="0">select a state</option> : null
                                }
                                {
                                    this.props.states.map(state =>
                                        <option value={state.state_id} key={state.state_id}>{state.abbreviation} ({state.name})</option>
                                    )
                                }
                            </select>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Zipcode: </p>
                        </li>
                        <li>
                            <input type="text" name="zipcode" value={this.state.zipcode === null ? this.state.value : this.state.zipcode} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Phone #: </p>
                        </li>
                        <li>
                            <input type="text" name="phone" value={this.state.phone === null ? this.state.value : this.state.phone} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Fax #: </p>
                        </li>
                        <li>
                            <input type="text" name="fax" value={this.state.fax === null ? this.state.value : this.state.fax} onChange={this.handleChange} />
                        </li>  
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Email: </p>
                        </li>
                        <li>
                            <input type="text" name="email" value={this.state.email === null ? this.state.value : this.state.email} onChange={this.handleChange} />
                        </li>  
                    </ul>
                    <ul>
                        <li>
                            <input type="button" className="buttons" value="Cancel" />
                        </li>
                        <li className="button-end">
                            <input type="submit" className="buttons" value={this.state.company_id === null ? "Add" : "Update"} onClick={this.handleSubmit} />
                        </li>
                    </ul>
                </section>
            </main>
        );
    }
}

export default Client