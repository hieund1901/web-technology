import React, { useState,useRef , useEffect} from "react";
//import Swal from "sweetalert2";
import $ from "jquery";



function Login({  props }) {
  const [firstName, setFirstName] = useState("");
  const [lastName, setLastName] = useState("");
  const url = "http://localhost:8000/server.php";


  const handleChange = (e) => {
    setFirstName(e.target.value);
  };

  const handleSumbit = (e) => {
    e.preventDefault();
    const form = $(e.target);
    $.ajax({
      type: "POST",
      url: form.attr("action"),      
      data: form.serialize()+'&' + $.param({login:"login",email:"123rf@gmail.com"}),// them role
      success(res) {
        if(res == "true"){
           props(true) ;
        }
        if (res == 2){
           props(2);
        }

      },
    });
  };

  const textInput = useRef(null);

  useEffect(() => {
    textInput.current.focus();
  }, []);

 

  return (
    <div className="small-container">
      <form
        action="http://localhost:8000/server.php"
        onSubmit={(event) => handleSumbit(event)}
        method="post"
      >
        <h1>Log in</h1>
        <label htmlFor="firstName">Email</label>
        <input
          id="email"
          type="text"
          ref={textInput}
          name="email"
          value={firstName}
          onChange={(event) => handleChange(event)}
        />
        <label htmlFor="lastName">Password</label>
        <input
          id="pass"
          type="text"
          name="pass"
          value={lastName}
          onChange={(e) => setLastName(e.target.value)}
        />

        <div style={{ marginTop: "30px" }}>
          <input type="submit" value="Add" />
          <input
            style={{ marginLeft: "12px" }}
            className="muted-button"
            type="button"
            value="Cancel"
            //onClick={() => setIsLogin(false)}
          />
        </div>
      </form>
      {/* <h1>{result}</h1> */}
    </div>
  );
}

export default Login;
