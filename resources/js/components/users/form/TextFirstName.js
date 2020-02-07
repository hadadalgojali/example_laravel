import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TextFirstName extends Component {
    constructor(props) {
        super(props);
        this.state  = {
            loading         : false,
            btn_disable     : false,
            showLabel       : true,
            showLoad        : false,
            data            : [],
            value           : this.props.first_name,
        }
    }
    render() {
        return (
            <div>
				<div className="form-group">
					<label>Nama Depan</label>
					<input type="text" className="form-control" id="first_name" name="first_name" placeholder="Nama Depan" defaultValue={this.state.value}/>
				</div>
            </div>
        );
    }
}

if (document.getElementById('textfield-first_name')) {
    const app = document.getElementById('textfield-first_name');
    ReactDOM.render(<TextFirstName {...app.dataset} />, document.getElementById('textfield-first_name'));
}
