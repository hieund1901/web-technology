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
  // const updateLoginEm = ()=>{
  //   setResLogin(2);
  // }
  let checkEmploy = false
  console.log("resLogin",resLogin);
  if (resLogin == true){
    checkEmploy = !checkEmploy;
    console.log("checkEmploy",checkEmploy);
  }

  

  // if ( resLogin ==1 ){
    
  //   return (
  //   <div>            
    
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
  //       </Router> 
  //   </div>)

  // } 

  
  
  // if ( resLogin == 2){
    
  //   return (
  //     <div>
  //       <Employee></Employee>
  //     </div>
  //   )
  // }
  


    return (// setIsLogin o day    
      <div>            
        { resLogin  ? (
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
          
        
        ) : (
          
          <Login props={updateLogin}/>
        )}
        
        {!checkEmploy && <Employee/>}
    
      </div>
    );
   

}

export default App;

