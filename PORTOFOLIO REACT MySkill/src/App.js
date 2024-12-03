import "./App.css";
// import Form from "./pages/Form";
// import Option from "./pages/Input";
import ReactGA from "react-ga";
import { Component } from "react";
import $ from "jquery";
import Header from "./Components/Header";
import About from "./Components/About";
import Contact from "./Components/Contact";

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      foo: "bar",
      resumeData: {},
    };

    ReactGA.initialize("UA-110570651-1");
    ReactGA.pageview(window.location.pathname);
  }

  getResumeData() {
    $.ajax({
      url: "./resumeData.json",
      dataType: "json",
      cache: false,
      success: function (data) {
        this.setState({
          resumeData: data,
        });
      }.bind(this),
      error: function (xhr, status, err) {
        console.log(err);
        alert(err);
      },
    });
  }

  componentDidMount() {
    this.getResumeData();
  }

  render() {
    return (
      <div className="App">
        <Header data={this.state.resumeData.main}></Header>
        <About data={this.state.resumeData.main} />
        <Contact data={this.state.resumeData.main} />
      </div>
    );
  }
}

export default App;
