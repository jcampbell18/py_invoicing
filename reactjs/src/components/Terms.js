import React from 'react'

class Terms extends React.Component {
    render() {
        return (
            <section className="outstanding-invoices">
                <h6>Project Sites</h6>
                <ul>
                    <li>
                        <p className="heading">Name</p>
                    </li>
                    <li>
                        <p className="heading">Description</p>
                    </li>
                    <li>
                        <p className="heading">View</p>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>Due on Receipt</p>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_view} alt="View" title="View"/>
                        </a>
                    </li>
                </ul>
            </section>
        );
    }    
}

export default Terms;