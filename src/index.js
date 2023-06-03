import React from 'react';
import ReactDOM from 'react-dom/client';
import "./css/index.css";

// Routeur: permet d'ouvrir des pages en fonction de l'URL
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";

// Importation des pages
// AJOUTER ICI LES PAGES
import Home from './pages/Home';
import Members from './pages/Members';
import NotFound from './pages/NotFound';

// Création du routeur
// AJOUTER LES ROUTES ICI
const router = createBrowserRouter([
  {
    path: "/",
    element: <Home />,
  },
  {
    path: "/members",
    element: <Members />,
  },
  {
    path: "*",
    element: <NotFound />,
  },
]);

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
      <RouterProvider router={router} />
  </React.StrictMode>
);