import "./TablaNombres.css";
import { FaRegEye } from "react-icons/fa"
import { VscAdd } from "react-icons/vsc"

export const TablaNombres = ({ props }) => {
    const { nombres, sacarNombreLista, verNombre } = props
    
    return (
        <table className="table">
            <thead>
                <tr >
                    <th className="p-3">Ver</th>
                    <th className="p-3">Nombre</th>
                    <th className="p-3">Agregar</th>
                </tr>
            </thead>
            <tbody>
                {nombres.map((data, index) => (
                    <tr key={index}>
                        <td><button className='btn' onClick={() => verNombre(data)}><FaRegEye className='m-2' size='1.2rem' /></button></td>
                        <td >{data}</td>
                        <td><button className='btn' onClick={() => sacarNombreLista(index)}><VscAdd className='m-2' size='1.2rem' /></button></td>
                    </tr>
                ))
                }
            </tbody>
        </table>
    )
};