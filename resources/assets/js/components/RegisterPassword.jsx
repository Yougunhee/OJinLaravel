import React, {Component} from 'react';
import ReactDOM from 'react-dom';

require('../components/RegisterPassword')

export default class RegisterPassword extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return(
            <div>
                <div className="field">
                    <progress className="progress is-primary" value="15" max="100">15%</progress>
                </div>
                <div className="field">
                    <p className="control has-icons-left">
                        <input className="input" type="password" placeholder="비밀번호" />
                        <span className="icon is-small is-left"><i className="fas fa-lock"></i></span>
                    </p>
                </div>
                <div className="field">

                </div>
            </div>
        );
    }
}
