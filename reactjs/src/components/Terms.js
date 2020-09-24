import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class Terms extends React.Component {
    render() {
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Terms</h6>
                    <ul>
                        <li>
                            <p className="heading">Name</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    {  
                        this.props.terms.map(term =>
                            <ul className="ul-lines" key={term.term_id}>
                                <li>
                                    <p>{term.name}</p>
                                </li>
                                <li>
                                    <a href="/#">
                                        <img src={img_view} alt="View" title="View"/>
                                    </a>
                                </li>
                            </ul>
                        )
                    }
                </section>
            </main>
        );
    }    
}

export default Terms;