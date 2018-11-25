require('../app.js');

import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {Tab, Tabs, TabList, TabPanel} from 'react-tabs';
import {Modal} from '../components/Modal.jsx';

let contest_id = null;
if (document.getElementById('ContestBox')) {
    contest_id = document.getElementById('ContestBox').getAttribute('contest_id');
}

export class QuestionItems extends Component{
    constructor(props) {
        super(props);
        this.state = {
            modal_title: "",
            modal_content: "",
            modal_active: false,
            question_data: this.props.question_data
        };
        this.loadModal.bind(this);
    }

    loadModal(title, content){
        this.setState({
            modal_title: title,
            modal_content: content,
            modal_active: true
        });
    }

    render(){
        return (
            <div>
                <label className="checkbox">
                    <input type="checkbox" defaultChecked={false}/>
                    내가 한 질문만 보기
                </label>
                <table className="table is-fullwidth">
                    <thead><tr><th>질문 제목</th><th>질문자</th><th>질문 시점</th><th>답변 시점</th><th>공개 여부</th></tr></thead>
                    <tbody>
                    {this.state.question_data.map((question)=>{return(
                        <tr>
                            <td>{question['contestQuestionTitle']}</td>
                            <td>{question['contestQuestionUser']}</td>
                            <td>NULL</td>
                            <td>NULL</td>
                            <td>NULL</td>
                        </tr>
                    );})}
                    </tbody>
                </table>
                <Modal modal_title={this.state.modal_title} modal_content={this.state.modal_content} is_active ={this.state.modal_active} />
            </div>
        );
    }
}

export class ContestBox extends Component {
    constructor(props) {
        super(props);

        this.state = {
            content: this.now_loading()
        };
        this.requireDataChange.bind(this);
        this.contestTable.bind(this);
        this.noticeTable.bind(this);
        this.questionTable.bind(this);
    }

    now_loading(){
        return(
            <div className="has-text-centered">
                <img src={require('../../images/Pacman-loading.svg')}/>
            </div>
        );
    }

    componentDidMount(){
        this.requireDataChange(0);
    }

    showText(text){
        return (<p className="has-text-centered">{text}</p>)
    }

    contestTable(problemData){
        return (
            <table className="table is-fullwidth">
                <thead>
                <tr>
                    <th>번호</th>
                    <th>이름</th>
                    <th>제출 횟수</th>
                    <th>성공 횟수</th>
                    <th>배점</th>
                    <th>점수</th>
                </tr>
                </thead>
                <tbody>
                {
                    problemData.map((problem)=>{return (
                        <tr key={problem['problemIDInContest']}>
                            <td>{problem['problemIDInContest']}</td>
                            <td><a href={'/contestProblemView/'+contest_id+'/'+problem['problemIDInContest']}>{problem['title']}</a></td>
                            <td>NULL</td>
                            <td>NULL</td>
                            <td>{problem['score']}</td>
                            <td>NULL</td>
                        </tr>
                    );})
                }
                </tbody>
            </table>
        );
    }

    noticeTable(noticeData){
        return (
            <table className="table is-fullwidth">
                <thead>
                <tr>
                    <th>공지시간</th>
                    <th>내용</th>
                </tr>
                </thead>
                <tbody>
                {
                    noticeData.map((notice)=>{return (
                        <tr key={notice['noticeID']}>
                            <td>{notice['uploadDate']}</td>
                            <td>{notice['content']}</td>
                        </tr>
                    );})
                }
                </tbody>
            </table>
        );
    }

    questionTable(questionData){
        return(
            <QuestionItems question_data = {questionData} />
        );
    }

    requireDataChange(tabIndex){
        this.setState({
            content: this.now_loading()
        });

        /*
        0번 => 문제
        1번 => 공지
        2번 => 질문
         */
        let request_page = '/api/contestInfo/problem/' + contest_id;
        let tmp_content = this.contestTable;
        switch(tabIndex) {
            case 1:
                request_page = '/api/contestInfo/notice/'+contest_id;
                tmp_content = this.noticeTable;
                break;
            case 2:
                request_page = '/api/contestInfo/question/'+contest_id;
                tmp_content = this.questionTable;
                break;
        }
        window.axios.post(request_page,{
            withCredentials: true
        })
        .then((response) => {
            let data = response['data'];
            if(data.length === 0){
                this.setState({content: this.showText("표시할 내용이 없습니다")});
            }else{
                this.setState({content: tmp_content(data)});
            }
        }).catch((error) => {
            this.setState({content: this.showText("에러가 발생하였습니다."+error)});
        });
    }


    render() {
        return(
            <Tabs selectedTabClassName="is-active" disabledTabClassName="" className="" onSelect={(tabIndex)=>this.requireDataChange(tabIndex)}>
                <div className="tabs is-centered">
                    <TabList className="">
                        <Tab className=""><a>문제</a></Tab>
                        <Tab className=""><a>공지</a></Tab>
                        <Tab className=""><a>질문</a></Tab>
                    </TabList>
                </div>
                <TabPanel>{this.state.content}</TabPanel>
                <TabPanel>{this.state.content}</TabPanel>
                <TabPanel>{this.state.content}</TabPanel>
            </Tabs>
        );

    }
}

if(document.getElementById('ContestBox')){
    ReactDOM.render(<ContestBox />, document.getElementById('ContestBox'));
}
