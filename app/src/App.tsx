import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Layout from './layouts/Layout';
import Home from './pages/Home';
import Projects from './pages/Projects';

const App = () => {
  return (
    <BrowserRouter>
      <Routes>
        {/* Ruta padre con layout */}
        <Route path="/" element={<Layout />}>
          {/* Rutas hijas que se renderizarán en <Outlet /> */}
          <Route index element={<Home />} />
          <Route path="projects" element={<Projects />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
};

export default App;
