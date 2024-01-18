import { useContext } from 'react'
import { NombreContext } from '../../context/NombreContext'
import { Sumar } from './sumar/Sumar'
import { Puntuar } from './puntuar/Puntuar'
import { Resultados } from './resultados/Resultados'
import { Restar } from './restar/Restar'
import { Solitario } from './solitario/Solitario'

export const Estructura = () => {
    const { datosUsuario, nivel } = useContext(NombreContext)
    const activo = datosUsuario.activo

    const contenidoOpciones = {
        solitario: <Solitario />,
        sumar: <Sumar />,
        restar: <Restar />,
        puntuar: <Puntuar />,
        resultado: <Resultados />
    }

    const contenido = contenidoOpciones[nivel] || null
    
    return (
        <div className='container' >
            <div className='d-flex justify-content-center'>
                {activo ? (
                    <>
                        {contenido}
                    </>
                ) : (
                    <div className="container text-center">
                        <h1>Esperando al otro jugador</h1>
                    </div>
                )
                }
            </div>
        </div >
    )
}

