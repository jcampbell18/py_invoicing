import React from 'react'
import img_view from '../img/icons/32x32/view.png'

class ProjectSites extends React.Component {

    render() { 

        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Project Sites</h6>
                    <ul>
                        <li>
                            <p className="heading">Address</p>
                        </li>
                        <li>
                            <p className="heading">City</p>
                        </li>
                        <li>
                            <p className="heading">State</p>
                        </li>
                        <li>
                            <p className="heading">Zipcode</p>
                        </li>
                        <li>
                            <p className="heading">Box Code</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                    </ul>
                    { 
                        this.props.project_sites.map(project_site =>
                            <ul className="ul-lines" key={project_site.project_site_id}>
                                <li>
                                    <p>{project_site.address}</p>
                                </li>
                                <li>
                                    <p>{project_site.city}</p>
                                </li>
                                <li>
                                    <p>{project_site.state}</p>
                                </li>
                                <li>
                                    <p>{project_site.zipcode}</p>
                                </li>
                                <li>
                                    <p>{project_site.access_code}</p>
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

export default ProjectSites;