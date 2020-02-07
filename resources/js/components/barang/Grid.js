import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Grid extends Component {
    constructor(props) {
        super(props);
        this.state  = {
            loading         : false,
            btn_disable     : false,
            showLabel       : true,
            showLoad        : false,
            data            : [],
        }
    }
    componentDidMount(){
      $("#grid-project").DataTable({
        "processing": true,
        "serverSide": true,
        "scrollX"   : true,
        "ajax"      : reactInit.url+"/api/v1/data/barang",
        "columns": [
            { 
                "data": "code", 
                "render": function(data, type, row) {
                  return '<a href="'+reactInit.url+'/barang/form/'+row.id+'">'+row.code+'</a>';
                }
            },
            { 
                "data": "barang", 
                "render": function(data, type, row) {
                  return '<a href="'+reactInit.url+'/barang/form/'+row.id+'">'+row.barang+'</a>';
                }
            },
            { "data": "created_at", },
        ],
      });
    }
    render() {
        return (
            <table id="grid-project" width="100%" className="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Code</th>
                <th>Nama Barang</th>
                <th>Created Date</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        );
    }
}

if (document.getElementById('grid-barang')) {
    ReactDOM.render(<Grid />, document.getElementById('grid-barang'));
}
