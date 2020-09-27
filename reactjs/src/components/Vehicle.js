import React from 'react'

class Vehicle extends React.Component {

    state = {
        vehicle_id: this.props.data.vehicle_id || null,
        man_year: this.props.data.man_year || null,
        make: this.props.data.make || null,
        model: this.props.data.model || null,
        submodel: this.props.data.submodel || null,
        notes: this.props.data.notes || null,
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
                    <h6>{this.props.title}: {this.state.sku_id === null ? "Add New" : "Update Record"}</h6>
                    <ul>
                        <li>
                            <p className="heading">Year: </p>
                        </li>
                        <li>
                            <input type="text" name="year" value={this.state.man_year === null ? this.state.value : this.state.man_year} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Make: </p>
                        </li>
                        <li>
                            <input type="text" name="make" value={this.state.make === null ? this.state.value : this.state.make} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Model: </p>
                        </li>
                        <li>
                            <input type="text" name="model" value={this.state.model === null ? this.state.value : this.state.model} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Submodel: </p>
                        </li>
                        <li>
                            <input type="text" name="submodel" value={this.state.submodel === null ? this.state.value : this.state.submodel} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Notes: </p>
                        </li>
                        <li>
                            <input type="text" name="notes" value={this.state.notes === null ? this.state.value : this.state.notes} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <input type="button" className="buttons" value="Cancel" />
                        </li>
                        <li className="button-end">
                            <input type="submit" className="buttons" value={this.state.sku_id === null ? "Add" : "Update"} onClick={this.handleSubmit} />
                        </li>
                    </ul>
                </section>
            </main>
        );
    }
}

export default Vehicle