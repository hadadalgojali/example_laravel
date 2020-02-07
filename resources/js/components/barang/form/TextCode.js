import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TextCode extends Component {
    constructor(props) {
        super(props);
        this.state  = {
            loading         : false,
            btn_disable     : false,
            showLabel       : true,
            showLoad        : false,
            data            : [],
            value           : this.props.code,
        }
    }
    render() {
        return (
            <div>
				<div className="form-group">
					<label>Code</label>
					<input type="text" className="form-control" id="code" name="code" placeholder="Kode barang" defaultValue={this.state.value}/>
				</div>
            </div>
        );
    }
}

if (document.getElementById('textfield-code')) {
    const app = document.getElementById('textfield-code');
    ReactDOM.render(<TextCode {...app.dataset}/>, document.getElementById('textfield-code'));
}
