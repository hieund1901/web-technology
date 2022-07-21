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
  const checked = true;
  return (
    <>
      <Nav>
        <Bars />
        <NavMenu>
          <NavLink to="/about">Information</NavLink>
          <NavLink to="/events">Calendar</NavLink>
          <NavLink to="/list">List Employee</NavLink>
          <>
            {checked ? (
              <NavLink to="/annoucement">Make Announcement</NavLink>
            ) : (
              <></>
            )}
          </>
        </NavMenu>
        <NavBtn>
          <NavBtnLink to="/sign-up">Sign Up</NavBtnLink>
          <NavBtnLink to="/signin">Sign In</NavBtnLink>
        </NavBtn>
      </Nav>
    </>
  );
};

export default Navbar;
