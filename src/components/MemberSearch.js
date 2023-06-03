import React, { useState } from "react";
import MemberCard from "./MemberCard";
import { API_URL } from "../utils/constants"; // Constante contenant le lien vers l'API


export default function MemberSearch() {
    return (
        <div>
            <h2>MemberSearch</h2>
            <Search />
        </div>
    );
}

function Search() {
    const [member, setMember] = useState("");
    const [search, setSearch] = useState("");

    function handleSubmit(event) {
        event.preventDefault();
        // On fait la requête à l'API
        fetch(`${API_URL}/user/${search}`)
            .then((response) => response.json())
            .then((data) => {
                if (data['status'] !== 200) {
                    setMember(<p>Member not found</p>);
                    return;
                }

                // On met à jour le state
                setMember(
                    <MemberCard {...data['data']} />
                );
            })
            .catch((error) => {
                setMember(<p>Member not found</p>);
            });
    }
    return (
        <>
            <form onSubmit={handleSubmit}>
                <label htmlFor="search">Search by ID:</label>
                <input type="text" id="search" name="search" onChange={(event) => setSearch(event.target.value)} />
                <button type="submit">Search</button>
            </form>

            {member}
        </>
    );
}