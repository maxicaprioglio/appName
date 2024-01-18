import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import { Footer } from './components/footer/Footer';
import { Navbar } from './components/navbar/Navbar';
import { NombreProvider } from './context/NombreContext';
import { Estructura } from './components/estructura/Estructura';

function App() {

  return (
    <NombreProvider>
      <Navbar />
      <Estructura />
      <Footer />
    </NombreProvider>
  );
}

export default App;
