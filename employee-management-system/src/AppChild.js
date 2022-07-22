import "./App.css";
//import Dashboard from "./Page/Dashboard";
import Navbar from "./Components/Navbar/Navbar";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./Components/options";
import About from "./Components/options/about";
import AboutE from "./Page/Employee/about"
import Events from "./Components/options/events";
import EventsE from "./Page/Employee/events"
import List from "./Components/options/list";
import Annoucements from "./Components/options/annoucement";
import AnnoucementsE from "./Page/Employee"
import Blogs from "./Components/options/blogs";
import SignUp from "./Components/options/signup";
import React, { useState } from "react";


//import Employee from "./Page/Employee";

function AppChild({isAdmin}) {  

  console.log(" isAdmin ",isAdmin) 


  return (// 1 bien check admin  hay user , neu la use nav bar ko co list
  
    <div>      
        <Router>
          <Navbar />
          <Routes>
            <Route path="/" element={<Home />} />//check admin or user tat ca cac route
            <Route path="/about" element={isAdmin? (<About/>):(<AboutE/>)} />
            <Route path="/events" element={isAdmin?(<Events />):(<EventsE/>)} />
            <Route path="/list" element={isAdmin && (<List />)} />
            <Route path="/annoucement" element={isAdmin?(<Annoucements />):(<AnnoucementsE/>)} />
            <Route path="/blogs" element={<Blogs />} />
            <Route path="/sign-up" element={<SignUp />} />
          </Routes>
        </Router>
    </div>
  );
}

export default AppChild;
