import React, { useEffect } from 'react';
import MemberCard from './MemberCard';
import { API_URL } from "../utils/constants"; // Constante contenant le lien vers l'API


export default function MemberList() {
  return (
    <div>
      <h2>Members List</h2>
      <List />
    </div>
  );
}

function List() {
  const [members, setMembers] = React.useState([]);

  useEffect(() => {
    async function getMembers() {
      // On fait la requête à l'API
      try {
        const response = await fetch(`${API_URL}/users`);
        const data = await response.json();
        setMembers(data['data']);
      } catch (error) {
        console.error('Error fetching users:', error);
      }
    }
    getMembers();
  }, []);

  // Fonction pour supprimer un membre depuis l'API
  function handleClick(id) {
    async function deleteMember(id) {
      try {
        await fetch(`${API_URL}/user/${id}`, {
          method: 'DELETE',
        });
      } catch (error) {
        console.error('Error deleting user:', error);
      }
    }
    deleteMember(id);
    setMembers(members.filter((member) => member.id !== id));
  }

  return (
    <ul>
      {members?.map((member) => (
        <li key={member.id}>
          <MemberCard {...member} />
          <button onClick={() => handleClick(member.id)}>Delete</button>
        </li>
      ))}
    </ul>
  );
}