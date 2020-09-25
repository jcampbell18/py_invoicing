import React from 'react'
import img_checkmark from '../img/icons/32x32/checkmark.png'
import img_view from '../img/icons/32x32/view.png'
import img_print from '../img/icons/32x32/print.png'

class Bids extends React.Component {

    onView = (bid) => {
        this.props.onDataSelection("Bid", bid);
    }

    render() {
        return (
            <main>
                <section className="outstanding-invoices">
                    <h6>Bids</h6>
                    <ul>
                        <li>
                            <p className="heading">Bid #</p>
                        </li>
                        <li>
                            <p className="heading">Date</p>
                        </li>
                        <li>
                            <p className="heading">Project Site</p>
                        </li>
                        <li>
                            <p className="heading">Work Performed</p>
                        </li>
                        <li>
                            <p className="heading">Amount</p>
                        </li>
                        <li>
                            <p className="heading">Approved?</p>
                        </li>
                        <li>
                            <p className="heading">View</p>
                        </li>
                        <li>
                            <p className="heading">Print</p>
                        </li>
                    </ul>
                    { 
                        this.props.bids.map(bid =>
                            <ul className="ul-lines" key={bid.bid_id}>
                                <li>
                                    <p>{bid.bid_id}</p>
                                </li>
                                <li>
                                    <p>{bid.bid_date}</p>
                                </li>
                                <li>
                                    <p>{bid.address}, {bid.city}, {bid.state} {bid.zipcode}</p>
                                </li>
                                <li>
                                    <p>{bid.sku_name}</p>
                                </li>
                                <li>
                                    <p>${bid.amount}</p>
                                </li>
                                <li>
                                    {bid.approve === 1 ? <img src={img_checkmark} alt="Approved" title="Approved" /> : <p>&nbsp;</p> }
                                </li>
                                <li>
                                    <a href="/#" onClick={() => this.onView(bid)}>
                                        <img src={img_view} alt="View" title="View"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="/#">
                                        <img src={img_print} alt="Print" title="Print"/>
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

export default Bids;