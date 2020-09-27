import React from 'react'

class Term extends React.Component {

    state = {
        term_id: this.props.data.term_id || null,
        name: this.props.data.name || null,
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
                    <h6>{this.props.title}: {this.state.term_id === null ? "Add New" : "Update Record"}</h6>
                    <ul>
                        <li>
                            <p className="heading">Name: </p>
                        </li>
                        <li>
                            <input type="text" name="name" value={this.state.name === null ? this.state.value : this.state.name} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <input type="button" className="buttons" value="Cancel" />
                        </li>
                        <li className="button-end">
                            <input type="submit" className="buttons" value={this.state.term_id === null ? "Add" : "Update"} onClick={this.handleSubmit} />
                        </li>
                    </ul>
                </section>
            </main>
        );
    }
}

export default Term