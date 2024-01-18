import { useState, useContext } from 'react'
import { NombreContext } from '../../../context/NombreContext'
import { FaLongArrowAltDown } from "react-icons/fa"
import { FaLongArrowAltUp } from "react-icons/fa"
import axios from 'axios'

export const Puntuar = () => {

  const { datosUsuario, apellido } = useContext(NombreContext)
  const [puntos, setPuntos] = useState([])

  const cargaPuntos = () => {
    if (puntos.length === 0) {
      const arrayPuntos = []
      datosUsuario.nombres.forEach((nombre, index) => {
        arrayPuntos.push({ nombre: nombre, puntos: ++index })
      })
      setPuntos(arrayPuntos)
    }
  }

  cargaPuntos()

  const bajarPuntos = (index) => {
    if (puntos[index].puntos > 0) {
      const arrayPuntos = [...puntos]
      arrayPuntos[index].puntos++
      arrayPuntos[++index].puntos--
      arrayPuntos.sort((a, b) => a.puntos - b.puntos)
      setPuntos(arrayPuntos)
    }
  }

  const subirPuntos = (index) => {
    const arrayPuntos = [...puntos]
    arrayPuntos[index].puntos--
    arrayPuntos[--index].puntos++
    arrayPuntos.sort((a, b) => a.puntos - b.puntos)
    setPuntos(arrayPuntos)
  }

  const terminar = async () => {
    try {
      const respuesta = await axios.post('/nameapp/terminar', { resultado: puntos })
      if (respuesta.data.success) { window.location.reload() }
    } catch (error) {
      console.error('Error al enviar o recibir datos:', error)
    }
  }

  return (
    <div className="container">
      <h1 className='text-center'>Ordenar los nombres</h1>
      {puntos && (
        <table className="table table-striped text-center">
          <thead className='table-primary'>
            <tr>
              <th scope="col">Posicion</th>
              <th scope="col">Nombre y apellido</th>
              <th scope="col">Cambiar</th>
            </tr>
          </thead>
          <tbody>
            {puntos.map(({ nombre, puntos }, index) => (
              <tr key={index}>
                <td>
                  <span className='m-2'>{puntos}</span></td>
                <td className='text-center'>{nombre} {apellido}</td>
                <td className='text-center'>
                  {(puntos === 10) ? (<></>) : (<button className='btn' onClick={() => bajarPuntos(index)}><FaLongArrowAltDown className='m-2' color='rgb(246, 124, 65)' size='1.2rem' /></button>)}
                  {(puntos === 1) ? (<></>) : (<button className='btn' onClick={() => subirPuntos(index)}><FaLongArrowAltUp className='m-2' color='rgb(246, 124, 65)' size='1.2rem' /></button>)}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      )}
      <div className='d-flex justify-content-center'>
        <button className='btn btn-primary' onClick={terminar}>Terminar</button>
      </div>
    </div>
  )
}
