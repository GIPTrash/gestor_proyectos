import React, { FC } from 'react';

interface LayoutProps {
  children: React.ReactNode;
}

const Layout: FC<LayoutProps> = ({ children }) => {
  return (
    <div className="min-h-screen flex flex-col">
      {/* Header */}
      <header className="bg-blue-600 p-4 text-white">
        <h1 className="text-xl font-bold">Mi Aplicación</h1>
      </header>
      {/* Contenedor principal */}
      <div className="flex flex-1">
        {/* Sidebar */}
        <aside className="w-64 bg-gray-100 p-4">
          <nav>
            <ul>
              <li className="mb-2"><a href="#">Inicio</a></li>
              <li className="mb-2"><a href="#">Acerca de</a></li>
              <li className="mb-2"><a href="#">Contacto</a></li>
            </ul>
          </nav>
        </aside>
        {/* Contenido principal */}
        <main className="flex-1 p-4">
          {children}
        </main>
      </div>
      {/* Footer */}
      <footer className="bg-blue-600 p-4 text-white text-center">
        © 2025 Mi Aplicación
      </footer>
    </div>
  );
};

export default Layout;
