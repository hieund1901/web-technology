import React, { useEffect, useState } from "react";
import Swal from "sweetalert2";
import $ from "jquery";

import Header2 from "../../Components/Header2.js";
import ListNoti from "./ListNoti";

function Employee() {
  const url = "http://localhost:8000/server.php";

  const [notification, setNotification] = useState([]);

  const getNotification = () => {
    $.ajax({
      type: "GET",
      url: url,
      data: $.param({
        opcode: "getListNotification",
        id: "10",
        role: "employee",
      }),
      success(res) {
        console.log("res: ", res);
        const data = JSON.parse(res);
        setNotification(data);
        // const newResult = Array.from(data);
        // console.log("new result data: ", newResult);
        // setNotification([...newResult]);
      },
    });
  };

  useEffect(() => {
    getNotification();
  }, []);

  return (
    <div className="container">
      {/* List */}
      <>
        <Header2 />
        <ListNoti
          notification={notification}
          //handleRead={handleRead}
        />
      </>
    </div>
  );
}

export default Employee;
