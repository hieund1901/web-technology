import React from "react";
import Calendar from "../Calendar/Calendar";

const Events = () => {
  return (
    <div
      style={{
        display: "flex",
        justifyContent: "flex-start",
        alignItems: "right",
      }}
    >
      <Calendar />
    </div>
  );
};

export default Events;
