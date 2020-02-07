import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class TextBarang extends Component {
    constructor(props) {
        super(props);
        this.state  = {
            loading         : false,
            btn_disable     : false,
            showLabel       : true,
            showLoad        : false,
            data            : [],
            value           : this.props.barang,
        }
    }
    render() {
        return (
            <div>
				<div className="form-group">
					<label>Nama Barang</label>
					<input type="text" className="form-control" id="barang" name="barang" placeholder="Nama barang" defaultValue={this.state.value}/>
				</div>
            </div>
        );
    }
}

if (document.getElementById('textfield-barang')) {
    const app = document.getElementById('textfield-barang');
    ReactDOM.render(<TextBarang {...app.dataset} />, document.getElementById('textfield-barang'));
}
