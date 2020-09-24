import React from 'react'
import img_checkmark from '../img/icons/32x32/checkmark.png'
import img_view from '../img/icons/32x32/view.png'

class Changelog extends React.Component {
    render() { 
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Changelog</h6>
                    <ul>
                        <li>
                            <p className="heading">Date</p>
                        </li>
                        <li>
                            <p className="heading">Category</p>
                        </li>
                        <li>
                            <p className="heading">Description</p>
                        </li>
                        <li>
                            <p className="heading">Complete</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    {  
                        this.props.changelogs.map(changelog =>
                            <ul className="ul-lines" key={changelog.changelog_id}>
                                <li>
                                    <p>{changelog.timestamp}</p>
                                </li>
                                <li>
                                    <p>{changelog.name}</p>
                                </li>
                                <li>
                                    <p>{changelog.description}</p>
                                </li>
                                <li>
                                    {changelog.complete === 1 ? <img src={img_checkmark} alt="Completed" title="Completed" /> : <p>&nbsp;</p> }
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

export default Changelog;