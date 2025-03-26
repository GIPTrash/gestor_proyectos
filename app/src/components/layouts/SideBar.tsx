import React from 'react';
import { Link } from 'react-router-dom';

// Definición de la interfaz para cada item del sidebar
interface SidebarItem {
  name: string;
  path: string;
}

// Diccionario de items para el sidebar
const sidebarItems: SidebarItem[] = [
  { name: 'Inicio', path: '/' },
  { name: 'Proyectos', path: '/projects' },
];

const Sidebar: React.FC = () => {
  return (
    <aside className="w-64 bg-gray-200 p-4">
      <nav>
        <ul>
          {sidebarItems.map((item) => (
            <li key={item.path} className="mb-2">
              <Link
                to={item.path}
                className="text-gray-700 hover:text-blue-600"
              >
                {item.name}
              </Link>
            </li>
          ))}
        </ul>
      </nav>
    </aside>
  );
};

export default Sidebar;
