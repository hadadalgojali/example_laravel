import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TextLastName extends Component {
    constructor(props) {
        super(props);
        this.state  = {
            loading         : false,
            btn_disable     : false,
            showLabel       : true,
            showLoad        : false,
            data            : [],
            value           : this.props.last_name,
        }
    }
    render() {
        return (
            <div>
				<div className="form-group">
					<label>Nama Belakang</label>
					<input type="text" className="form-control" id="last_name" name="last_name" placeholder="Nama Belakang" defaultValue={this.state.value}/>
				</div>
            </div>
        );
    }
}

if (document.getElementById('textfield-last_name')) {
    const app = document.getElementById('textfield-last_name');
    ReactDOM.render(<TextLastName {...app.dataset}/>, document.getElementById('textfield-last_name'));
}
