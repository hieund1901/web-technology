import React, { useState, useRef, useEffect } from "react";
import Swal from "sweetalert2";
import $ from "jquery";

function Add({ employees, setEmployees, setIsAdding }) {
  const url = "http://localhost:8000/server.php";

  const [firstName, setFirstName] = useState("");
  const [lastName, setLastName] = useState("");
  const [email, setEmail] = useState("");
  const [salary, setSalary] = useState("");
  const [date, setDate] = useState("");

  const [result, setResult] = useState([]);

  const handleChange = (e) => {
    setFirstName(e.target.value);
  };

  const textInput = useRef(null);

  useEffect(() => {
    textInput.current.focus();
  }, []);

  const handleAdd = (e) => {
    e.preventDefault();
    const form = $(e.target);
    $.ajax({
      type: "POST",
      url: url,
      data: form.serialize() + "&" + $.param({ opcode: "addNV" }),
      success(data) {
        setResult(data);// neu them thanh cong thi ms hien Swal 
      },
    });
    if (!firstName || !lastName || !email || !salary || !date) {
      return Swal.fire({
        icon: "error",
        title: "Error!",
        text: "All fields are required.",
        showConfirmButton: true,
      });
    }

    const id = employees.length + 1;
    const newEmployee = {
      id,
      firstName,
      lastName,
      email,
      salary,
      date,
    };
    employees.push(newEmployee);
    setEmployees(employees);
    setIsAdding(false);

    Swal.fire({
      icon: "success",
      title: "Added!",
      text: `${firstName} ${lastName}'s data has been Added.`,
      showConfirmButton: false,
      timer: 1500,
    });
  };

  const getAJAX = (e) => {
    e.preventDefault();

    const form = $(e.target);

    $.ajax({
      type: "GET",

      url: form.attr("action"),

      success(res) {
        const data = JSON.parse(res);
        const newResult = Array.from(data);
        // console.log("data: ", newResult);
        setResult([...newResult]);
      },
    });
  };

  return (
    <div className="small-container">
      <form
        action="http://localhost:8000/server.php"
        onSubmit={(event) => handleAdd(event)}
        method="post"
      >
        <h1>Add Employee</h1>
        <label htmlFor="firstName">First Name</label>
        <input
          id="firstName"
          type="text"
          ref={textInput}
          name="firstName"
          value={firstName}
          onChange={(event) => handleChange(event)}
        />
        <label htmlFor="lastName">Last Name</label>
        <input
          id="lastName"
          type="text"
          name="lastName"
          value={lastName}
          onChange={(e) => setLastName(e.target.value)}
        />
        <label htmlFor="email">Email</label>
        <input
          id="email"
          type="email"
          name="email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />
        <label htmlFor="salary">Salary ($)</label>
        <input
          id="salary"
          type="number"
          name="salary"
          value={salary}
          onChange={(e) => setSalary(e.target.value)}
        />
        <label htmlFor="date">Date</label>
        <input
          id="date"
          type="date"
          name="date"
          value={date}
          onChange={(e) => setDate(e.target.value)}
        />
        <div style={{ marginTop: "30px" }}>
          <input type="submit" value="Add" />
          <input
            style={{ marginLeft: "12px" }}
            className="muted-button"
            type="button"
            value="Cancel"
            onClick={() => setIsAdding(false)}
          />
        </div>
      </form>
    </div>
  );
}

export default Add;
