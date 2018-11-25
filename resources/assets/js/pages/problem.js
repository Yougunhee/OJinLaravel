require('../app.js');

require('monaco-editor');

import React, { Component } from 'react';
import ReactDOM from 'react-dom';

function submit(problem_id, react_button){
    let input_data = editor.getValue();
    react_button.setState({is_scoring: true});
    let request_data ={
        source: input_data,
        score_problem: problem_id
    };
    window.axios.post('/api/submitCode/', request_data).then((response)=>{

    });

}


export class SubmitButton extends Component{
    constructor(props){
        super(props);
        this.state={
            is_scoring: false
        };
    }
    button_click(){
        submit(this.props.problem_id, this);
    }
    render(){
        let button_class= "button is-primary is-large ";
        if(this.state.is_scoring){
            button_class+='is-loading';
        }
        return(
            <div className="has-text-centered">
                <button className={button_class} onClick={this.button_click.bind(this)}>제출</button>
            </div>
        );
    }
}
$(document).ready(()=> {
    if (document.getElementById('SubmitButton')) {
        let problem_id = document.getElementById('SubmitButton').getAttribute('problem_id');
        ReactDOM.render(<SubmitButton problem_id={problem_id}/>, document.getElementById('SubmitButton'));
    }
    let editor = monaco.editor.create(document.getElementById("monaco-container"),{
        value:
        "#include <cstdio>\n"+
        "\n"+
        "int main(){\n"+
        "return 0;\n"+
        "}",
        language: "cpp",
        automaticLayout: true
    });
});
