import React from 'react'

class Sku extends React.Component {
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
                        <p>Winterize</p>
                    </li>
                    <li>
                        <p>Winterize</p>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_view} alt="View" title="View"/>
                        </a>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>Snow Removal</p>
                    </li>
                    <li>
                        <p>	Shovel Walkway, Driveway, Paths</p>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_view} alt="View" title="View"/>
                        </a>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>Lock Replacement</p>
                    </li>
                    <li>
                        <p>Changeout locks and associated hardware</p>
                    </li>
                    <li>
                        <a href="/#">
                            <img src={img_view} alt="View" title="View"/>
                        </a>
                    </li>
                </ul>
                <ul className="ul-lines">
                    <li>
                        <p>Trash Out</p>
                    </li>
                    <li>
                        <p>Remove all specified debris/junk/garbage from property</p>
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

export default Sku;