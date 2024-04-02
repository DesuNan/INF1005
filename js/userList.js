import React, { useState, useEffect } from 'react';

function UserList() {
    const [users, setUsers] = useState([]);

    useEffect(() => {
        fetchUserData();
    }, []);

    const fetchUserData = () => {
        fetch('process_getMember.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                setUsers(data);
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    };

    return (
        <div>
            <ul>
                {users.map(user => (
                    <li>
                        First Name: {user.fname} - Email: {user.email}
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default UserList;
