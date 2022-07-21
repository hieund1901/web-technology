import React, { useEffect, useState } from "react";
import Swal from "sweetalert2";
import $ from "jquery";

//import Header2 from "../../Components/Header2.js";
import ListNoti from "./List"


function Employee() {
    const url = "http://localhost:8000/server.php";



    const [notification, setNotification] = useState([]);
    //const [selectedEmployee, setSelectedEmployee] = useState(null);
    //const [isAdding, setIsAdding] = useState(false);
    //const [isEditing, setIsEditing] = useState(false);

    const getNotification = () => {
        $.ajax({
            type: "GET",
            url: url,
            data: '&' + $.param({ opcode: "getListNotification", date: "2001-20-11", shift: "1", id: "1" }),
            success(res) {
                const data = JSON.parse(res);
                const newResult = Array.from(data);
                console.log("new result data: ", newResult);
                setNotification([...newResult]);

                console.log("list noti :", notification);
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
                {/* <Header2 /> */}
                <ListNoti
                    notification={notification}
                //handleRead={handleRead}
                />
            </>
        </div>
    );
}

export default Employee;
