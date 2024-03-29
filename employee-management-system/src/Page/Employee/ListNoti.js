import React, { useState } from "react";
import $ from "jquery";

function ListNoti({ notification }) {
  const url = "http://localhost:8000/server.php";

  const handleRead = (Id, e) => {
    $.ajax({
      type: "POST",
      url: url,
      data: "&" + $.param({ opcode: "readNotification", id: Id }),
      success(data) {
        console.log(data);
      },
    });
  };

  return (
    <div className="contain-table">
      <table className="striped-table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          {notification.length > 0 ? (
            notification.map((notification, i) => (
              <tr key={notification.id}>
                <td>{i + 1}</td>
                <td>{notification.title}</td>
                <td>{notification.content}</td>
                <td>{notification.date} </td>

                {notification.isRead == 1 ? <td> Old </td> : <td> New</td>}
                <td className="text-right">
                  <p
                    onClick={(event) => handleRead(notification.id, event)}
                    className="button muted-button"
                  >
                    Seen
                  </p>
                </td>
              </tr>
            ))
          ) : (
            <tr>
              <td colSpan={7}>No notification</td>
            </tr>
          )}
        </tbody>
      </table>
    </div>
  );
}

export default ListNoti;
