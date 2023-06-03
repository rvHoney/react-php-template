import React from 'react';
import ReactDOM from 'react-dom/client';
import "./index.css";

// Routeur: permet d'ouvrir des pages en fonction de l'URL
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";

// Importation des pages
import Index from './pages/Index';
import ManageMembers from './pages/ManageMembers';
import Members from './pages/Members';

const router = createBrowserRouter([
  {
    path: "/",
    element: <Index />,
  },
  {
    path: "/managemembers",
    element: <ManageMembers />,
  },
  {
    path: "/members",
    element: <Members />,
  }
]);

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <RouterProvider router={router} />
  </React.StrictMode>
);