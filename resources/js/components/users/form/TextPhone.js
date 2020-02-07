import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TextPhone extends Component {
    constructor(props) {
        super(props);
        this.state  = {
            loading         : false,
            btn_disable     : false,
            showLabel       : true,
            showLoad        : false,
            data            : [],
            value           : this.props.phone,
        }
    }
    render() {
        return (
            <div>
				<div className="form-group">
					<label>Telepon</label>
                    <input type="number" className="form-control" id="phone" name="phone" placeholder="Telepon" defaultValue={this.state.value}/>
				</div>
            </div>
        );
    }
}

if (document.getElementById('textfield-phone')) {
    const app = document.getElementById('textfield-phone');
    ReactDOM.render(<TextPhone {...app.dataset}/>, document.getElementById('textfield-phone'));
}
