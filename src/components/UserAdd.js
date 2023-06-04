import React, { useState } from "react";
import { API_URL } from "../utils/constants"; // Constante contenant le lien vers l'API

export default function UserAdd() {
    return (
        <div>
            <h2>Add User</h2>
            <Add />
        </div>
    );
}

function Add() {
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [description, setDescription] = useState("");

    function handleSubmit(event) {
        event.preventDefault();
        const user = {
            name: name,
            email: email,
            description: description,
        };
        fetch(`${API_URL}/user`, {
            method: "POST",
            body: JSON.stringify({
                name: user.name,
                email: user.email,
                description: user.description,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data["status"] !== 200) {
                    alert(data);
                    return;
                }

                alert("User added");
            }
            )
            .catch((error) => {
                alert("Error");
            }
            );
    }
    return (
        <>
            <form onSubmit={handleSubmit}>
                <label htmlFor="name">Name:</label>
                <input type="text" id="name" name="name" onChange={(event) => setName(event.target.value)} />
                <label htmlFor="email">Email:</label>
                <input type="text" id="email" name="email" onChange={(event) => setEmail(event.target.value)} />
                <label htmlFor="description">Description:</label>
                <input type="text" id="description" name="description" onChange={(event) => setDescription(event.target.value)} />
                <button type="submit">Add</button>
            </form>
        </>
    );
}