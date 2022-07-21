import "./App.css";
import Dashboard from "./Page/Dashboard";
import Navbar from "./Components/Navbar/Navbar";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./Components/options";
import About from "./Components/options/about";
import Events from "./Components/options/events";
import List from "./Components/options/list";
import Annoucements from "./Components/options/annoucement";
import Blogs from "./Components/options/blogs";
import SignUp from "./Components/options/signup";
import Calendar from "./Components/Calendar/Calendar";
import React, { useState } from "react";
import Login from "./Login";

import Employee from "./Page/Employee";

function App() {
  const [resLogin, setResLogin] = useState(0);

  const updateLogin = (x) => {
    setResLogin(x); // 1 la quan li , 2 la nv
  };
  let checkEmploy = false;
  if (resLogin == true) {
    checkEmploy = !checkEmploy;
    console.log("checkEmploy", checkEmploy);
  }

  return (
    <div>
      {resLogin ? (
        <Router>
          <Navbar />
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/about" element={<About />} />
            <Route path="/events" element={<Events />} />
            <Route path="/list" element={<List />} />
            <Route path="/annoucement" element={<Annoucements />} />
            <Route path="/blogs" element={<Blogs />} />
            <Route path="/sign-up" element={<SignUp />} />
          </Routes>
        </Router>
      ) : (
        <Login props={updateLogin} />
      )}
    </div>
  );
}

export default App;
