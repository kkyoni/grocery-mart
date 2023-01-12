import React, { Component } from "react";
import './chat.css';
class Chat extends Component {
  openForm = () => {
    document.getElementById("myForm").style.display = "block";
  }
  closeForm = () => {
    document.getElementById("myForm").style.display = "none";
  }
  render() {
    return (
      <div>
        <button className="open-button" onClick={() => this.openForm()}><i className='fa fa-comment'></i></button>
        <div className="chat-popup" id="myForm">
          <form action="/action_page.php" className="form-container">
            <div style={{marginBottom:"35px"}}>
              {/* <h4 className="float_left">Chat</h4> */}
              <i className="fa fa-close float_right" onClick={() => this.closeForm()}></i>
            </div>
            <textarea className="form-control" id="w3lMessage" placeholder="Type message.." name="msg" required></textarea>
            <button type="submit" className="btn btn-style">Send</button>
          </form>
        </div>
      </div>
    )
  }
}
export default Chat;