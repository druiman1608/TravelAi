import { useState, useEffect } from "react";
import api from "../../api/axios";
import { toast } from "react-toastify";

export default function AddHotel() {
  const [destinos, setDestinos] = useState([]);

  const [formData, setFormData] = useState({
    nombre: "",
    ciudad: "",
    direccion: "",
    estrellas: 1,
    precio_noche: 0,
    descripcion: "",
    imagen_url: "",
    destination_id: "",
  });

  useEffect(() => {
    const fetchDestinos = async () => {
      try {
        const response = await api.get("/destinations");
        setDestinos(response.data);
      } catch (error) {
        console.error("Error al cargar destinos:", error);
        toast.error("No se pudieron cargar los destinos");
      }
    };
    fetchDestinos();
  }, []);

  const handleChange = (e) => {
    const { name, value } = e.target;
    if (name === "precio_noche" && value < 0) return;
    setFormData({ ...formData, [name]: value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await api.post("/admin/hotels", formData);
      toast.success("Hotel añadido con éxito");
      setFormData({
        nombre: "",
        ciudad: "",
        direccion: "",
        estrellas: 0,
        precio_noche: 0,
        descripcion: "",
        imagen_url: "",
        destination_id: "",
      });
    } catch (error) {
      console.error(error.response?.data);
      toast.error("Error al añadir el hotel");
    }
  };

  return (
    <div>
      <h1>Añadir Nuevo Hotel</h1>
      <form onSubmit={handleSubmit} className="hotel-form">
        <label>Destino:</label>
        <select
          name="destination_id"
          value={formData.destination_id}
          onChange={handleChange}
          required
        >
          <option value="">Destinos disponibles:</option>
          {destinos.map((destino) => (
            <option key={destino.id} value={destino.id}>
              {destino.nombre_ciudad}
            </option>
          ))}
        </select>

        <input
          name="nombre"
          placeholder="Nombre"
          value={formData.nombre}
          onChange={handleChange}
          required
        />
        <input
          name="ciudad"
          placeholder="Ciudad"
          value={formData.ciudad}
          onChange={handleChange}
          required
        />
        <input
          name="direccion"
          placeholder="Dirección"
          value={formData.direccion}
          onChange={handleChange}
          required
        />

        <input
          name="descripcion"
          value={formData.descripcion || ""}
          onChange={handleChange}
          placeholder="Descripción del hotel"
        />

        <label>Estrellas:</label>
        <select
          name="estrellas"
          value={formData.estrellas}
          onChange={handleChange}
          required
        >
          {[5, 4, 3, 2, 1].map((num) => (
            <option key={num} value={num}>
              {num} ★
            </option>
          ))}
        </select>

        <label>Precio por noche (€):</label>
        <input
          name="precio_noche"
          type="number"
          step="0.01"
          min="0"
          placeholder="0.00"
          value={formData.precio_noche}
          onChange={handleChange}
          required
        />

        <button type="submit" className="btn-save">
          Confirmar
        </button>
      </form>
    </div>
  );
}
