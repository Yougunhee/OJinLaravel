require('../app.js');

import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export class RegisterBox extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return(
            <div className="container">
                <div className="columns">
                    <div className="column is-half is-offset-one-quarter">
                        <div className="box">
                            <form>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

$(document).ready(()=> {
    if (document.getElementById('RegisterBox')) {
        ReactDOM.render(<RegisterBox />, document.getElementById(('RegisterBox')));
    }
});
