import "./App.css";
import React, { useState } from 'react'
import Dashboard from "./Page/Dashboard";
import Navbar from "./Components/Navbar/Navbar";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./Components/options";
import About from "./Components/options/about";
import Events from "./Components/options/events";
import AnnualReport from "./Components/options/annual";
import Teams from "./Components/options/team";
import Blogs from "./Components/options/blogs";
import SignUp from "./Components/options/signup";
import Login from './Login';
import Employee from './Page/Employee/employee'




function App() {
  const [resLogin, setResLogin] = useState(0);

  const updateLogin = (x)=>{
    setResLogin(x); // 1 la quan li , 2 la nv
  }

  

  if ( resLogin ==1 ){
    
    return (
    <div>            
    
        <Router>
        <Navbar />
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/about" element={<About />} />
          <Route path="/events" element={<Events />} />
          <Route path="/annual" element={<AnnualReport />} />
          <Route path="/team" element={<Teams />} />
          <Route path="/blogs" element={<Blogs />} />
          <Route path="/sign-up" element={<SignUp />} />
        </Routes>
        <Dashboard />
        </Router> 
    </div>)

  } 

  
  
  if ( resLogin == 2){
    
    return (
      <div>
        <Employee></Employee>
      </div>
    )
  }

  // return (// setIsLogin o day
    
  //   <div>
            
  //     { resLogin == 1 ? (
  //       <Router>
  //       <Navbar />
  //       <Routes>
  //         <Route path="/" element={<Home />} />
  //         <Route path="/about" element={<About />} />
  //         <Route path="/events" element={<Events />} />
  //         <Route path="/annual" element={<AnnualReport />} />
  //         <Route path="/team" element={<Teams />} />
  //         <Route path="/blogs" element={<Blogs />} />
  //         <Route path="/sign-up" element={<SignUp />} />
  //       </Routes>
  //       <Dashboard />
  //     </Router>
  //     ) : (
  //       <Login updateLogin={updateLogin}
  //        />      
  //     )}

  //   {/* {resLogin == 2&&resLogin ==1? (<Employee></Employee>):(<Login updateLogin={updateLogin}/>)}   */}
   
  //   </div>
  // );

  return (
    <div>
      <Login />
    </div>

  )
}

export default App;

