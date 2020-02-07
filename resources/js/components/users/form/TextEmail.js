import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TextEmail extends Component {
    constructor(props) {
        super(props);
        this.state  = {
            loading         : false,
            btn_disable     : false,
            showLabel       : true,
            showLoad        : false,
            data            : [],
            value           : this.props.email,
        }
    }
    render() {
        return (
            <div>
				<div className="form-group">
					<label>Email</label>
                    <input type="text" className="form-control" id="email" name="email" placeholder="Email" defaultValue={this.state.value}/>
				</div>
            </div>
        );
    }
}

if (document.getElementById('textfield-email')) {
    const app = document.getElementById('textfield-email');
    ReactDOM.render(<TextEmail {...app.dataset}/>, document.getElementById('textfield-email'));
}
