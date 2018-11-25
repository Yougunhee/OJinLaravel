import React, { Component } from 'react';
import ReactDOM from 'react-dom';


export class ServerTimer extends Component{
    constructor(props){
        super(props);
        let current_time = new Date(this.props.current_time);
        let text = this.parse_time(current_time);
        this.state={
            current_time: current_time,
            text: text
        };
        this.timer.bind(this);
    }
    parse_time(time_object){
        let text = time_object.getFullYear()+"년 "+
            (time_object.getMonth()+1)+"월 "+
            (time_object.getDate())+"일 "+
            (time_object.getHours())+"시 "+
            (time_object.getMinutes())+"분 "+
            (time_object.getSeconds())+"초";
        return text;
    }
    timer() {
        this.state.current_time.setSeconds(this.state.current_time.getSeconds() + 1);
        let text = this.parse_time(this.state.current_time);
        this.setState({text: text});
    }
    componentDidMount() {
        this.intervalId = setInterval(this.timer.bind(this), 1000);
    }
    componentWillUnmount(){
        clearInterval(this.intervalId);
    }
    render(){
        return(
            <span>{this.state.text}</span>
        );
    }
}

export class Timer extends Component {
    constructor(props){
        super(props);
        let start_time = new Date(this.props.start_time), current_time= new Date(this.props.current_time), end_time= new Date(this.props.end_time);
        this.state={
            start_time: start_time,
            current_time: current_time,
            end_time: end_time,
            text: this.parse_time(start_time, current_time, end_time)
        };
        this.timer.bind(this);
    }
    parse_time(start_time, current_time, end_time){
        let parse_time_inner=(a,b)=>{
            let restTime = a.getTime() - b.getTime();
            let result ="";
            let d = Math.floor(restTime / (1000 * 60 * 60 * 24));
            let h = Math.floor((restTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let m = Math.floor((restTime % (1000 * 60 * 60)) / (1000 * 60));
            let s = Math.floor((restTime % (1000 * 60)) / 1000);
            if(d!==0) result+=d+"일 ";
            result+=h+"시간 "+m+"분 "+s+"초";
            return result;
        };
        let text = "";
        // 시작 전인 경우
        if(start_time.getTime()>current_time.getTime()){
            text = "시작까지 "+parse_time_inner(start_time, current_time);
        }else if(current_time.getTime()>end_time.getTime()){
            //끝난 경우
            text = "종료 후 "+parse_time_inner(current_time, end_time);
        }else{
            text = "종료까지 "+parse_time_inner(end_time, current_time );
        }

        return text;
    }
    timer() {
        let text = this.parse_time(this.state.start_time, this.state.current_time, this.state.end_time);
        this.state.current_time.setSeconds(this.state.current_time.getSeconds()+1);
        this.setState({text: text});
    }
    componentDidMount() {
        this.intervalId = setInterval(this.timer.bind(this), 1000);
    }
    componentWillUnmount(){
        clearInterval(this.intervalId);
    }
    render(){
        return(
            <p className="has-text-right">{this.state.text}</p>
        );
    }
}

document.addEventListener("DOMContentLoaded", function() {
    if (document.getElementById('Timer')) {
        let current = document.getElementById('Timer').getAttribute('current_time');
        let start_time = document.getElementById('Timer').getAttribute('start_time');
        let end_time = document.getElementById('Timer').getAttribute('end_time');
        ReactDOM.render(<Timer current_time={current} start_time={start_time}
                               end_time={end_time}/>, document.getElementById('Timer'));
    }

    if (document.getElementById('ServerTimer')) {
        let current = document.getElementById('ServerTimer').getAttribute('current_time');
        ReactDOM.render(<ServerTimer current_time={current}/>, document.getElementById('ServerTimer'));
    }
});
