import React from 'react'
import { RiLogoutCircleRLine } from "react-icons/ri";
import { IoRefreshSharp } from "react-icons/io5";
import axios from 'axios'

export const Navbar = () => {

  const handleLogout = async () => {
    try {
      const respuesta = await axios.post('/nameapp/logout');
      (respuesta.data.success) ? window.location.reload() : console.log('Error al cerrar sesión');

    } catch (error) {
      console.error('Error al cerrar sesión:', error);
    }
  }

  const handleRefresh = () => {
    window.location.reload();
  };

  return (
    <div className='d-flex justify-content-between'>
      <div className='btn align-self-center' onClick={handleRefresh}>
        <IoRefreshSharp className='m-2' color='rgb(7,158,101)' size='1.2rem' />
      </div>
      <h1 className='text-center m-4'>Nameapp</h1>
      <div className='btn align-self-center' onClick={handleLogout}>
        <RiLogoutCircleRLine className='m-2' color='rgb(120,1,22)' size='1.2rem' />
      </div>
    </div >
  )
}
