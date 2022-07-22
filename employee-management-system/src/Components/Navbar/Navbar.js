import React, { useState } from "react";
import {
  Nav,
  NavLink,
  Bars,
  NavMenu,
  NavBtn,
  NavBtnLink,
} from "./NavbarElements";

const Navbar = () => {
  return (
    <>
      <Nav>
        <Bars />
        <NavMenu>
            <NavLink to="/about">Information</NavLink>
            <NavLink to="/events">Calendar</NavLink>
            <NavLink to="/list">List Employee</NavLink>                     
            <NavLink to="/annoucement">Announcement</NavLink>
        </NavMenu>
        <NavBtn>
          <NavBtnLink to="/logout">Log out</NavBtnLink>
          <NavBtnLink to="/login">Log In</NavBtnLink>
        </NavBtn>
      </Nav>
    </>
  );
};

export default Navbar;
