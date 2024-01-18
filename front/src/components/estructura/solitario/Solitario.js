import { useContext, useState } from 'react'
import { NombreContext } from '../../../context/NombreContext'
import { Button } from 'react-bootstrap'
import axios from 'axios'
import { TablaNombres } from './tablaNombres/TablaNombres'

export const Solitario = () => {

    const { datosUsuario, apellido } = useContext(NombreContext)
    const [nombres, setNombres] = useState(datosUsuario.nombres)
    const [activarElegidosConfi, setActivarElegidosConfi] = useState(false)
    const [activarNombresConfi, setActivarNombresConfi] = useState(false)
    const [elegidos, setElegidos] = useState((datosUsuario.elegidos == null) ? [] : datosUsuario.elegidos)
    const [completados, setCompletados] = useState(0)
    const [nombre, setNombre] = useState(nombres[Math.floor(Math.random() * nombres.length)])
    const cambiarNombre = () => { setNombre(nombres[Math.floor(Math.random() * nombres.length)]) }

    const agregarNombre = () => {
        elegidos.push(nombre)
        nombres.splice(nombres.indexOf(nombre), 1)
        setElegidos(elegidos)
        setNombres(nombres)
        setCompletados(completados + 1)
        cambiarNombre()
    }
    const sacarElegidoLista = (index) => {
        nombres.push(elegidos[index])
        elegidos.splice(index, 1)
        setElegidos(elegidos)
        setNombres(nombres)
        setCompletados(completados - 1)
        cambiarNombre()
    }

    const sacarNombreLista = (index) => {
        elegidos.push(nombres[index])
        nombres.splice(index, 1)
        setElegidos(elegidos)
        setNombres(nombres)
        setCompletados(completados - 1)
        cambiarNombre()
    }

    const verNombre = (nombre) => { setNombre(nombre) }

    const activarElegidos = () => {
        setActivarElegidosConfi(!activarElegidosConfi)
    }
    const activarNombres = () => {
        setActivarNombresConfi(!activarNombresConfi)
    }

    const guardar = async () => {
        try {
            const respuesta = await axios.post('/nameapp/solitario-guardar', { nombres: nombres, elegidos: elegidos })
            if (respuesta.data.success) { window.location.reload() }
        } catch (error) {
            console.error('Error al enviar o recibir datos:', error)
        }
    }

    const finalizar = async () => {
        try {
            const respuesta = await axios.post('/nameapp/solitario', { nombres: elegidos })
            if (respuesta.data.success) { window.location.reload() }
        } catch (error) {
            console.error('Error al enviar o recibir datos:', error)
        }
    }

    return (
        <div className="container border border-5 rounded m-2">
            <div className="container text-center">
                <div className='d-flex justify-content-between'>
                    <div className='btn' onClick={activarElegidos} >
                        <p>Elegidos: {elegidos.length}</p>
                    </div>
                    <div className='btn' onClick={activarNombres}>
                        <p>Nombres: {nombres.length}</p>
                    </div>
                </div>
                <h1>{nombre} {apellido}</h1>
                <div className='d-flex justify-content-center'>
                    <Button className='m-2 btn-dark' onClick={agregarNombre}>Agregar</Button>
                    <Button className='m-2 btn-dark' onClick={cambiarNombre}>Cambiar</Button>
                </div>
                <div className='d-flex justify-content-between'>
                    <Button className='m-2' onClick={() => guardar()}>Guardar</Button>
                    <Button className='m-2' onClick={() => finalizar()}>Finalizar</Button>
                </div>
                <div className='d-flex justify-content-between'>
                    {activarElegidosConfi && (
                        <div className="m-3 text-center">
                            <h5>Nombres a sacar</h5>
                            {elegidos.length > 0 ? (
                                <table className="table table-striped">
                                    <thead className='table-primary'>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Sacar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {elegidos.map((a, index) => (
                                            <tr key={index}>
                                                <th scope="row">{++index}</th>
                                                <td>{a}</td>
                                                <td>
                                                    <Button className='btn btn-danger' onClick={() => sacarElegidoLista(--index)}>Sacar</Button>
                                                </td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            ) : (
                                <p>No hay nombres sacados</p>
                            )}
                        </div>
                    )}

                    {activarNombresConfi && (
                        <div className="container m-3 text-center">
                            <h5>Todos los nombres</h5>
                            <TablaNombres props={{ nombres, sacarNombreLista, verNombre }} />
                        </div>
                    )}
                </div>
            </div>
        </div >
    )
}