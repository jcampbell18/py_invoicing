import React from 'react'

class ExpenseCategory extends React.Component {

    state = {
        expense_category_id: this.props.data.expense_category_id || null,
        name: this.props.data.name || null,
        description: this.props.data.description || null,
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
                    <h6>{this.props.title}: {this.state.expense_category_id === null ? "Add New" : "Update Record"}</h6>
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
                            <p className="heading">Description: </p>
                        </li>
                        <li>
                            <textarea name="description" rows="5" className="textarea-s" placeholder="enter description" value={this.state.description === null ? this.state.value : this.state.description} onChange={this.handleChange} />
                        </li> 
                    </ul>
                    <ul>
                        <li>
                            <input type="button" className="buttons" value="Cancel" />
                        </li>
                        <li className="button-end">
                            <input type="submit" className="buttons" value={this.state.expense_category_id === null ? "Add" : "Update"} onClick={this.handleSubmit} />
                        </li>
                    </ul>
                </section>
            </main>
        );
    }
}

export default ExpenseCategory