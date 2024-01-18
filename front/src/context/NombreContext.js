import { createContext, useEffect, useState } from 'react'
import axios from 'axios'

export const NombreContext = createContext()

export const NombreProvider = ({ children }) => {
    const [loading, setLoading] = useState(true);
    const [datosUsuario, setDatosUsuario] = useState(false)
    const [nivel, setNivel] = useState('')
    const [apellido, setApellido] = useState('')

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get('/nameapp/pedido')
                setDatosUsuario(response.data)
                setNivel(response.data.nivel)
                setApellido(response.data.apellido)
            } catch (error) {
                console.error('Error al cargar la variable', error)
            } finally {
                setLoading(false)
            }
        }
        if (!datosUsuario) {
            fetchData()
        }
    }, [datosUsuario])

    return (
        <NombreContext.Provider value={{ datosUsuario, apellido, nivel }}>
            {loading ? <p>Cargando...</p> : children}
        </NombreContext.Provider>
    )
}
