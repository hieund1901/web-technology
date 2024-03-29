import React, { useEffect, useState } from "react";
import Swal from "sweetalert2";
import $ from "jquery";

import Header from "../../Components/Header.js";
import List from "./List";
import Add from "./Add";
import Edit from "./Edit";
import ListNoti from "../Employee/ListNoti.js";

function Dashboard() {
  const url = "http://localhost:8000/server.php";

  const [employees, setEmployees] = useState([]);
  const [selectedEmployee, setSelectedEmployee] = useState(null);
  const [isAdding, setIsAdding] = useState(false);
  const [isEditing, setIsEditing] = useState(false);

  const getEmployee = () => {
    $.ajax({
      type: "GET",
      url: url,
      data:
        $.param({
          opcode: "getListNV",
          role:"admin",
        }),
      success(res) {
        const data = JSON.parse(res);
        const newResult = Array.from(data);
        console.log("data: ", newResult);
        setEmployees([...newResult]);
      },
    });
  };

  useEffect(() => {
    getEmployee();
  }, []);

  const handleEdit = (id) => {
    const [employee] = employees.filter((employee) => employee.id === id);

    setSelectedEmployee(employee);
    setIsEditing(true);
  };

  const handleDelete = (id, e) => {
    Swal.fire({
      icon: "warning",
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
    }).then((result) => {
      if (result.value) {
        const [employee] = employees.filter((employee) => employee.id === id);

        Swal.fire({
          icon: "success",
          title: "Deleted!",
          text: `${employee.firstName} ${employee.lastName}'s data has been deleted.`,
          showConfirmButton: false,
          timer: 1500,
        });

        e.preventDefault();

        const form = $(e.target);
        $.ajax({
          type: "POST",
          url: url,
          data: $.param({ role:"admin",opcode: "deleteNVbyID", id: id }),
          success(data) {
            console.log(" Deleted id",id)
            console.log("Type of fron end: ", data);
          },
        });

        setEmployees(employees.filter((employee) => employee.id !== id));
      }
    });
  };

  return (
    <div className="container">
      {/* List */}
      {!isAdding && !isEditing && (
        <>
          <Header setIsAdding={setIsAdding} />
          <List
            employees={employees}
            handleEdit={handleEdit}
            handleDelete={handleDelete}
          />
        </>
      )}
      {/* Add */}
      {isAdding && (
        <Add
          employees={employees}
          setEmployees={setEmployees}
          setIsAdding={setIsAdding}
        />
      )}
      {/* Edit */}
      {isEditing && (
        <Edit
          employees={employees}
          selectedEmployee={selectedEmployee}
          setEmployees={setEmployees}
          setIsEditing={setIsEditing}
        />
      )}
    </div>
  );
}

export default Dashboard;
