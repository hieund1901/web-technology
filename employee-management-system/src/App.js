import React, { useState } from "react";
import AppChild from './AppChild'
import Login from './Login'

function App() {
  const [resLogin, setResLogin] = useState(false);
  const [isAdmin, setIsAdmin] = useState(false);

  const updateLogin = () => {
    setResLogin(true); 
  };

  const updateIsAdmin = (x) => {
    setIsAdmin(x);
  }


  return (// 1 bien check admin  hay user , neu la use nav bar ko co list
    <div>
      { resLogin ?(<AppChild isAdmin={isAdmin}/>):(<Login props = {updateLogin} setIsAdmin={updateIsAdmin}/>)}
    </div>
  );
}

export default App;
