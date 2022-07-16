import "./App.css";
import Dashboard from "./Page/Dashboard";
//import { useState } from "react";
//import $ from "jquery";

function App() {

  return (
    <div>
      <Dashboard />
      {/* <div className="App">
        <form
          action="http://localhost:8000/server.php"
          method="post"
          onSubmit={(event) => handleSumbit(event)}
        >
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
      </div> */}
    </div>
  );
}

export default App;
