import React, { useEffect } from 'react';
import UserCard from './UserCard';
import { API_URL } from "../utils/constants"; // Constante contenant le lien vers l'API


export default function UserList() {
  return (
    <div>
      <h2>User list</h2>
      <List />
    </div>
  );
}

function List() {
  const [users, setUsers] = React.useState([]);

  useEffect(() => {
    async function getUsers() {
      // On fait la requête à l'API
      try {
        const response = await fetch(`${API_URL}/users`);
        const data = await response.json();
        setUsers(data['data']);
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    }
    getUsers();
  }, []);

  // Fonction pour supprimer un membre depuis l'API
  function handleClickDelete(id) {
    async function deleteUser(id) {
      try {
        await fetch(`${API_URL}/user/${id}`, {
          method: 'DELETE',
        });
      } catch (error) {
        console.error('Error deleting user:', error);
      }
    }
    deleteUser(id);
    setUsers(users.filter((user) => user.id !== id));
  }

  // Fonction pour éditer un membre depuis l'API
  function handleClickEdit(id) {
    let name = prompt('Enter new name');
    let email = prompt('Enter new email');
    let description = prompt('Enter new description');

    async function editUser(id, name, email, description) {
      try {
        await fetch(`${API_URL}/user/${id}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ name, email, description }),
        });
      } catch (error) {
        console.error('Error editing user:', error);
      }
    }
    editUser(id, name, email, description);
    // On modifie le membre dans le state
    setUsers(
      users.map((user) => {
        if (user.id === id) {
          return { ...user, name, email, description };
        }
        return user;
      }
      )
    );
  }

  return (
    <ul>
      {users?.map((user) => (
        <li key={user.id}>
          <UserCard {...user} />
          <button onClick={() => handleClickDelete(user.id)}>Delete</button>
          <button onClick={() => handleClickEdit(user.id)}>Edit</button>
        </li>
      ))}
    </ul>
  );
}