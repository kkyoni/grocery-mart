import React, { Component } from "react";
import { Link } from "react-router-dom";
import Service from "../../services/Service";
import './chat.css';
class Chat extends Component {
  constructor(props) {
    super(props)
    this.state = {
      chat: [],
      avatar: 'http://127.0.0.1:8000/storage/avatar/',
      isLoading: true,
    }
  }


  componentDidMount() {
    this.setState({
      isLoading: true,
    });
    setTimeout(() => {
      this.setState({ isLoading: false });
    }, 1000);
    this.getchat(2);
  }
  getchat(id) {
    Service.getChat(id).then((res) => {
      if (res.data.status === 'success') {
        this.setState({ chat: res.data.chat, connection: true, notrecordloading: true });
      } else {
        this.setState({ chat: [], connection: true, notrecordloading: false });
      }
    });
  }
  openForm = () => {
    document.getElementById("myForm").style.display = "block";
  }
  closeForm = () => {
    document.getElementById("myForm").style.display = "none";
  }
  render() {
    console.log("chat", this.state.chat);
    var Chat_HTMLTABLE = "";
    if (this.state.connection) {
      if (this.state.notrecordloading) {
        Chat_HTMLTABLE =
          this.state.chat.map((item, i) => {
            return (
              <div key={i}>
                {item.flage === 'left' ? (
                  <div className="direct-chat-msg">
                    <div className="direct-chat-info clearfix">
                      <span className="direct-chat-name pull-left">{item.name}</span>
                      <span className="direct-chat-timestamp pull-right">{item.date}</span>
                    </div>
                    <img className="direct-chat-img" src={this.state.avatar + item.photo} alt="User" />
                    <div className="direct-chat-text">
                      {item.chat_message}
                    </div>
                  </div>
                ) : (
                  <div className="direct-chat-msg right">
                    <div className="direct-chat-info clearfix">
                      <span className="direct-chat-name pull-right">{item.name}</span>
                      <span className="direct-chat-timestamp pull-left">{item.date}</span>
                    </div>
                    <img className="direct-chat-img" src={this.state.avatar + item.photo} alt="User" />
                    <div className="direct-chat-text">
                      {item.chat_message}
                    </div>
                  </div>
                )}
              </div>
            );
          });
      } else {
        Chat_HTMLTABLE = <img src='assets/images/nodatafound.png' alt="nodatafound" className="img-max" style={{ width: "100%", height: "1%" }} />
      }
    } else {
      Chat_HTMLTABLE = <img src='assets/images/connection_lost.png' alt="connection_lost" className="img-max" style={{ width: "100%", height: "1%" }} />
    }

    return (
      <div>
        <button className="open-button" onClick={() => this.openForm()}><i className='fa fa-comment'></i></button>
        <div className="chat-popup" id="myForm">

          <div className="container">
            <div className="row bootstrap snippets bootdeys">
              <div className="col-md-12">
                <div className="box box-danger direct-chat direct-chat-danger">
                  <div className="box-header with-border">
                    <h3 className="box-title">Direct Chat</h3>
                    <div className="box-tools pull-right">
                      <button type="button" className="btn btn-box-tool" data-widget="collapse" onClick={() => this.closeForm()}><i
                        className="fa fa-minus"></i>
                      </button>
                      <button type="button" className="btn btn-box-tool" data-widget="remove"><i
                        className="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div className="box-body">
                    <div className="direct-chat-messages">
                      {Chat_HTMLTABLE}
                      {/* <div className="direct-chat-msg">
                        <div className="direct-chat-info clearfix">
                          <span className="direct-chat-name pull-left">Alexander Pierce</span>
                          <span className="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                        </div>
                        <img src={'https://bootdey.com/img/Content/user_1.jpg'} alt="User" className="direct-chat-img" />
                        <div className="direct-chat-text">
                          Is this template really for free? That's unbelievable!
                        </div>
                      </div>

                      <div className="direct-chat-msg right">
                        <div className="direct-chat-info clearfix">
                          <span className="direct-chat-name pull-right">Sarah Bullock</span>
                          <span className="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                        </div>
                        <img className="direct-chat-img" src={'https://bootdey.com/img/Content/user_2.jpg'} alt="User" />
                        <div className="direct-chat-text">
                          You better believe it!
                        </div>
                      </div> */}

                    </div>
                    <div className="direct-chat-contacts">
                      <ul className="contacts-list">
                        <li>
                          <Link>
                            <img className="contacts-list-img" src={'https://bootdey.com/img/Content/user_1.jpg'} alt="User" />
                            <div className="contacts-list-info">
                              <span className="contacts-list-name">
                                Count Dracula
                                <small className="contacts-list-date pull-right">2/28/2015</small>
                              </span>
                              <span className="contacts-list-msg">How have you been? I was...</span>
                            </div>
                          </Link>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div className="box-footer">
                    <form action="#" method="post">
                      <div className="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." className="form-control" />
                        <span className="input-group-btn">
                          <button type="submit" className="btn btn-danger btn-flat">Send</button>
                        </span>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}
export default Chat;