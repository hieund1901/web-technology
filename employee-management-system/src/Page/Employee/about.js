import React from "react";
import Swal from "sweetalert2";
import $ from "jquery";
import { useEffect, useState } from "react";
import "./about.css";

function AboutE() {
  const [employee, setEmployee] = useState([]);
  const url = "http://localhost:8000/server.php";

  const getEmployee = () => {
    $.ajax({
      type: "GET",
      url: url,
      data: $.param({ opcode: "getNVbyID", id: "9", role: "employee" }),
      success(res) {
        // console.log("res: ", res);
        const data = JSON.parse(res);
        setEmployee(data);
      },
    });
  };

  useEffect(() => {
    getEmployee();
  }, []);

  return (
    <div className="contain-table" style={{ height: "100vh" }}>
      <h2 style={{ textAlign: "center" }}>Employee Profile</h2>

      <div className="card" style={{ backgroundColor: "	#F5F5F5" }}>
        <img alt="image" style={{ width: "100%", marginTop: "10px" }} />
        <h2>{employee.firstName}</h2>
        <p className="title">{employee.lastName}</p>
        <p>Email: {employee.email}</p>
        <p>Salary: {employee.salary}</p>
        <p>Date of Birth: {employee.date}</p>
        <p>
          <button>Edit</button>
        </p>
      </div>
    </div>
  );
}

export default AboutE;
