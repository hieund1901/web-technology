import "./App.css";
import Dashboard from "./Page/Dashboard";
import Navbar from "./Components/Navbar/Navbar";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./Components/options";
import About from "./Components/options/about";
import Events from "./Components/options/events";
import AnnualReport from "./Components/options/annual";
import Teams from "./Components/options/team";
import Blogs from "./Components/options/blogs";
import SignUp from "./Components/options/signup";

function App() {
  return (
    <div>
      <Router>
        <Navbar />
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/about" element={<About />} />
          <Route path="/events" element={<Events />} />
          <Route path="/annual" element={<AnnualReport />} />
          <Route path="/team" element={<Teams />} />
          <Route path="/blogs" element={<Blogs />} />
          <Route path="/sign-up" element={<SignUp />} />
        </Routes>
      </Router>
      <Dashboard />
    </div>
  );
}

export default App;
