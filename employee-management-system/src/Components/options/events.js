import React from "react";
import Calendar from "../Calendar/Calendar";

const Events = () => {
  return (
    <div
      style={{
        display: "flex",
        justifyContent: "center",
        alignItems: "right",
      }}
    >
      <Calendar />
    </div>
  );
};

export default Events;
