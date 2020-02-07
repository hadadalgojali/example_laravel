import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TextAddress extends Component {
    constructor(props) {
        super(props);
        this.state  = {
            loading         : false,
            btn_disable     : false,
            showLabel       : true,
            showLoad        : false,
            data            : [],
            value           : this.props.address,
        }
    }
    render() {
        return (
            <div>
				<div className="form-group">
					<label>Alamat</label>
                    <input type="text" className="form-control" id="address" name="address" placeholder="Alamat" defaultValue={this.state.value}/>
				</div>
            </div>
        );
    }
}

if (document.getElementById('textfield-address')) {
    const app = document.getElementById('textfield-address');
    ReactDOM.render(<TextAddress {...app.dataset}/>, document.getElementById('textfield-address'));
}
