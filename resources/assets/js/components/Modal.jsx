
import React, {Component} from 'react';
import ReactDOM from 'react-dom';


export class Modal extends Component {
    constructor(props){
        super(props);

        this.state = {
            'is_active': this.props.is_active
        }
    }

    close_handler(){
        this.setState({
            'is_active': false
        });
    }

    render(){
        let modal_class= {
            'modal': true,
            'is-active': this.state.is_active
        };
        return(
            <div className={modal_class}>
                <div className="modal-background"></div>
                <div className="modal-card">
                    <header className="modal-card-head">
                        <p className="modal-card-title">{this.props.modal_title}</p>
                        <button className="delete" aria-label="close" onClick={this.close_handler}></button>
                    </header>
                    <section className="modal-card-body">
                        {this.props.children}
                    </section>
                    <footer className="modal-card-foot">
                        <button className="button" onClick={this.close_handler}>닫기</button>
                    </footer>
                </div>
            </div>
        );
    }
}
