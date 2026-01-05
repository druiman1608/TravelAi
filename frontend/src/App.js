import React, { useEffect, useState } from "react";
import axios from "axios";

function App() {
  const [hoteles, setHoteles] = useState([]);

  useEffect(() => {
    // Llamada API Laravel
    axios
      .get("http://127.0.0.1:8081/api/hoteles")
      .then((res) => setHoteles(res.data))
      .catch((err) => console.error("Error conectando con la API:", err));
  }, []);

  return (
    <div
      style={{
        padding: "40px",
        backgroundColor: "#f4f4f9",
        minHeight: "100vh",
      }}
    >
      <h1 style={{ color: "#333", textAlign: "center" }}>
        ✈️ TravelAI: Tu Agencia de Viajes
      </h1>
      <div
        style={{
          display: "flex",
          flexWrap: "wrap",
          justifyContent: "center",
          gap: "20px",
          marginTop: "30px",
        }}
      >
        {hoteles.map((h) => (
          <div
            key={h.id}
            style={{
              backgroundColor: "white",
              padding: "20px",
              borderRadius: "12px",
              boxShadow: "0 4px 6px rgba(0,0,0,0.1)",
              width: "300px",
            }}
          >
            <h2 style={{ margin: "0 0 10px 0", color: "#007bff" }}>
              {h.nombre}
            </h2>
            <p>
              <strong>📍 {h.ciudad}</strong>
            </p>
            <p>{h.descripcion}</p>
            <div
              style={{
                display: "flex",
                justifyContent: "space-between",
                alignItems: "center",
                marginTop: "15px",
              }}
            >
              <span style={{ fontWeight: "bold", fontSize: "1.2em" }}>
                {h.precio_por_noche}€
              </span>
              <span style={{ color: "#ffc107" }}>
                {"★".repeat(h.estrellas)}
              </span>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

export default App;
