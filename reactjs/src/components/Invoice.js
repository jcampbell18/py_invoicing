import React from 'react'

class Invoice extends React.Component {

    render() { 

        return (
            <main>
                <section className="add-new">
                    <h6>{this.props.title}: Add New</h6>
                    <ul>
                        <li>
                            <p className="heading">Address: </p>
                        </li>
                        <li>
                            <input type="text" name="address" />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">City: </p>
                        </li>
                        <li>
                            <input type="text" name="city" />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">State: </p>
                        </li>
                        <li>
                            <select name="state_id">
                                {
                                    this.props.states.map(st =>
                                        <option value={st.id}>{st.name} ({st.abbreviation})</option>
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
                            <input type="text" name="zipcode" />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Access Code: </p>
                        </li>
                        <li>
                            <input type="text" name="access_code" />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <p className="heading">Map Link: </p>
                        </li>
                        <li>
                            <input type="text" name="map_link" />
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
                </section>
            </main>
        );
    }
}

export default Invoice