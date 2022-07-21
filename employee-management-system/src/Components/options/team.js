//import React from "react";
import React, { useState } from "react";
import $ from "jquery";

const Teams = () => {
  const [title, setTitle] = useState("");
  const [content, setContent] = useState("");
  const [date, setDate] = useState("");

  const idVN = 1;

  const handleSumbit = (e) => {
    e.preventDefault();
    const form = $(e.target);
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: form.serialize() + '&' + $.param({ opcode: "createNotification", id: idVN }),
      success(data) {
        console.log("Data res ajax: ", data)

      },
    });
  };


  return (



    <div className="small-container">
      <form
        action="http://localhost:8000/server.php"
        onSubmit={(event) => handleSumbit(event)}
        method="post"
      >
        <h1>Create Notification</h1>
        <label htmlFor="title">Title</label>
        <input
          id="title"
          type="text"
          name="title"
          //value={title}
          onChange={(e) => setTitle(e.target.value)}
        />
        <label htmlFor="content" >Content</label>
        <input
          id="content"
          type="text"
          name="content"
          //value={content}
          onChange={(e) => setContent(e.target.value)}
        />

        <label htmlFor="date">Date</label>
        <input
          id="date"
          type="date"
          name="date"
          //value={date}
          onChange={(e) => setDate(e.target.value)}
        />
        <div style={{ marginTop: "30px" }}>
          <input type="submit" value="Add" />
          <input
            style={{ marginLeft: "12px" }}
            className="muted-button"
            type="button"
            value="Cancel"
          />
        </div>
      </form>

      {/* <h1>{result}</h1> */}
    </div >
  );
};

export default Teams;