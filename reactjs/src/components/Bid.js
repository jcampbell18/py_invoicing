import React from 'react'

class Bid extends React.Component {

    state = {
        textarea: "",
        sku: this.props.sku
    }

    handleSku(e) {
        e.preventDefault();
        console.log("yup");
        console.log("this.state", this.state);
        // console.log("this.props: ", this.props);
        // for(let sk in this.state.sku) {
        //     console.log("sku id: ", sk.sku_id);
        //     if (sk.sku_id === e.target.value) {
        //         this.setState(
        //             {
        //                 textarea: sk.description
        //             }
        //         );
        //     }
        // }
    }

    render() { 
        
        return (
            <main>
                <section className="add-new">
                    <h6>{this.props.title}: Add New</h6>
                    <ul>
                        <li>
                            <p className="heading">Date: </p>
                        </li>
                        <li>
                            <input type="text" name="date" />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Client: </p>
                        </li>
                        <li>
                            <select name="company_id">
                                <option defaultValue value="">select a company</option>
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
                            <select name="project_site_id">
                                <option defaultValue value="">select a project site</option>
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
                            <select name="sku_id" onChange={this.handleSku}>
                                <option defaultValue value="">select a sku</option>
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
                            <textarea name="description" rows="5" className="textarea-s" defaultValue={this.state.textarea} placeholder="select a sku to get started"/>
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Amount: </p>
                        </li>
                        <li>
                            <input type="text" name="amount" />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Status: </p>
                        </li>
                        <li>
                            <select name="status">
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
                            <input type="submit" className="buttons" value="Add" />
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">State sku: </p>
                        </li>
                        <li>
                            {
                                this.state.sku.map(sk =>
                                    <p key={sk.sku_id}>{sk.name}: {sk.description}</p>
                                )
                            }
                        </li> 
                    </ul>
                </section>
            </main>
        );
    }
}

export default Bid