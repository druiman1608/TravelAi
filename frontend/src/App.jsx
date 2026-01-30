import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

import AddHotel from "./pages/admin/AddHotel";

function App() {
  return (
    <Router>
      <ToastContainer position="top-right" autoClose={3000} />
      <Routes>
        <Route path="/" element={<h1>Inicio TravelAI</h1>} />
        <Route path="/admin/hoteles/nuevo" element={<AddHotel />} />
      </Routes>
    </Router>
  );
}

export default App;
