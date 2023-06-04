import React, { useState } from "react";
import UserCard from "./UserCard";
import { API_URL } from "../utils/constants"; // Constante contenant le lien vers l'API


export default function UserSearch() {
    return (
        <div>
            <h2>User Search</h2>
            <Search />
        </div>
    );
}

function Search() {
    const [user, setUser] = useState("");
    const [search, setSearch] = useState("");

    function handleSubmit(event) {
        event.preventDefault();
        // On fait la requête à l'API
        fetch(`${API_URL}/user/${search}`)
            .then((response) => response.json())
            .then((data) => {
                if (data['status'] !== 200) {
                    setUser(<p>User not found</p>);
                    return;
                }

                // On met à jour le state
                setUser(
                    <UserCard {...data['data']} />
                );
            })
            .catch((error) => {
                setUser(<p>User not found</p>);
            });
    }
    return (
        <>
            <form onSubmit={handleSubmit}>
                <label htmlFor="search">Search by ID:</label>
                <input type="text" id="search" name="search" onChange={(event) => setSearch(event.target.value)} />
                <button type="submit">Search</button>
            </form>

            {user}
        </>
    );
}