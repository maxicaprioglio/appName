import { useContext } from 'react'
import { NombreContext } from '../../../context/NombreContext'

export const Resultados = () => {
  const { datosUsuario, apellido } = useContext(NombreContext)
  const nombres = datosUsuario.nombres;
  console.log(nombres)

  return (
    <div className="container">
      {nombres.map(item => {
        return (
          <div key={item.nombre} className="row">
            <div className="col-12">
              <div className="card">
                <div className="card-body">
                  <h5 className="card-title">{item.nombre} {apellido}</h5>
                  <p className="card-text">Puntos: {item.puntos}</p>
                </div>
              </div>
            </div>
          </div>
        )
      }
      )}
    </div>
  )
}
