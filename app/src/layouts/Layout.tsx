import React from 'react';
import { Outlet } from 'react-router-dom';
import Sidebar from './SideBar';

const Layout: React.FC = () => {
  return (
    <div className="min-h-screen flex flex-col">
      {/* Header */}
      <header className="bg-blue-600 p-4 text-white">
        <h1 className="text-xl font-bold">Mi Aplicación</h1>
      </header>
      <div className="flex flex-1">
        {/* Sidebar */}
        <Sidebar />
        {/* Contenido principal */}
        <main className="flex-1 p-4">
          <Outlet />
        </main>
      </div>
      {/* Footer */}
      <footer className="bg-blue-600 p-4 text-white text-center">
        © 2025 Gestor de proyectos
      </footer>
    </div>
  );
};

export default Layout;
