import React, { useState, useRef, useEffect } from "react";
//import Swal from "sweetalert2";
import $ from "jquery";

function Login({ props , setIsAdmin }) {
  const [email, setEmail] = useState("");
  const [pass, setPass] = useState("");
  //const url = "http://localhost:8000/server.php";

  const handleChange = (e) => {
    setEmail(e.target.value);
  };

  const handleSumbit = (e) => {
    e.preventDefault();
    const form = $(e.target);
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: form.serialize() + "&" + $.param({ login: "login" }), // them role
      success(res) {
        console.log("resAjax: ", res);
        if (res == "trueadmin"){
          props()
          setIsAdmin(true)// them 1 props luu lai id cho cac lan request sau 
        }
        //console.log("Json parse resAjax: ", JSON.parse(res));
         else if (res == "trueemployee"){
          props()
          setIsAdmin(false)
        } else {
          console.log (" Error Login ")
        }
        
        //  khi ko dang nhập đc vs cả admin cả user , có thể props(false), sau đó thêm dòng tbao log in lỗi . 
        //Thêm 1 div chứa đoạn tbao log in lỗi và thuộc tính show or hire phụ thuộc 1 biến props : show={ErrorLogin} voi error login : true or false.     
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
        <label htmlFor="email">Email</label>
        <input
          id="email"
          type="text"
          ref={textInput}
          name="email"
          value={email}
          onChange={(event) => handleChange(event)}
        />
        <label htmlFor="pass">Password</label>
        <input
          id="pass"
          type="text"
          name="pass"
          value={pass}
          onChange={(e) => setPass(e.target.value)}
        />

        <div style={{ marginTop: "30px" }}>
          <input type="submit" value="Login" />
          <input
            style={{ marginLeft: "12px" }}
            className="muted-button"
            type="button"
            value="Cancel"
            //onClick={() => setIsLogin(false)}
          />
        </div>
      </form>
    </div>
  );
}

export default Login;
