import "./App.css";
import Dashboard from "./Page/Dashboard";
import { useState } from "react";
import $ from "jquery";
import axios from "axios";

function App() {
  const [name, setName] = useState("");
  const [result, setResult] = useState("");

  const handleChange = (e) => {
    setName(e.target.value);
  };

  const handleSumbit = (e) => {
    e.preventDefault();
    // const form = $(e.target);
    // $.ajax({
    //   type: "POST",
    //   url: form.attr("action"),
    //   data: form.serialize(),
    //   success(data) {
    //     setResult(data);
    //   },
    // });

    const user = {
      name: "Test",
    };

    axios
      .post(`http://localhost:8000/server.php`, { user })
      .then((res) => {
        console.log("Res:", res);
        console.log("Success");
        setResult(res?.data);
      })
      .catch((err) => console.log(`failed ${err}`));
  };
  return (
    <div>
      {/* <Dashboard /> */}
      <div className="App">
        <form method="post" onSubmit={(event) => handleSumbit(event)}>
          <label htmlFor="name">Name: </label>
          <input
            type="text"
            id="name"
            name="name"
            value={name}
            onChange={(event) => handleChange(event)}
          />
          <br />
          <button type="submit">Submit</button>
        </form>
        <h1>{result}</h1>
      </div>
    </div>
  );
}

export default App;
