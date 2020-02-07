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
        "ajax"      : reactInit.url+"/api/v1/users/data",
        "columns": [
            { 
                "data": "fullname", 
                "render": function(data, type, row) {
                  return '<a href="'+reactInit.url+'/users/form/'+row.id+'">'+row.first_name+' '+row.last_name+'</a>';
                }
            },
            { "data": "address", },
            { "data": "phone", },
            { "data": "email", },
        ],
      });
    }
    render() {
        return (
            <table id="grid-project" width="100%" className="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Nama lengkap</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            </table>
        );
    }
}

if (document.getElementById('grid-users')) {
    ReactDOM.render(<Grid />, document.getElementById('grid-users'));
}
