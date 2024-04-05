// React component to handle login and register forms
function LoginRegister() {
    // State variable to track the current form (login or register)
    const [viewOnly, setIsEdit] = React.useState(true);
    const [userData, setUserData] = React.useState(null); // State to store user data

    // Function to fetch user details from the server
    function fetchUserDetails() {        
        console.log("Getting particulars");
        // Make an AJAX request to fetch user details from the server
        fetch('process_getMember.php')
        .then(response => response.json()) // assuming your PHP script returns JSON
        .then(data => {
            console.log("Data received: ", data);
            // Update the state with the retrieved user details
            setUserData(data);
        })
        .catch(error => {
            console.log("error");
            console.error('Error fetching user details:', error);
        });
    }

    // Call fetchUserDetails function when the component mounts
    React.useEffect(() => {
        fetchUserDetails();
    }, []);

    // Function to toggle between login and register forms
    function toggleForm() {
        console.log('Toggling form');
        setIsEdit(!viewOnly);
        console.log('isEdit: ', viewOnly);
    }

    console.log('Rendering Member Profile component'); // Add console log here

    // Render either login or register form based on the current state
    return (
        <div>
            {viewOnly ? (
                <div>
                    <h1>Member Profile</h1>
                    {userData ? (
                        <div>
                            <table class="user-table">
                                 <tr>
                                    <th>First Name</th>
                                    <td>{userData.fname}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{userData.lname}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{userData.email}</td>
                                </tr>
                            </table>
                            <div><br /></div>
                        </div>
                    ) : (
                        <p>Loading user data...</p>
                    )}
                    <div>
                        <button onClick={toggleForm} style={{ marginLeft: '5px' }}>Edit Particulars</button>
                    </div>
                </div>
            ) : (
                <div>
                <h1>Member Profile</h1>
                <form action="process_updateMember.php" method="post">
                    <div className="mb-3">
                        <label htmlFor="fname" className="form-label">First Name:</label>
                        <input maxLength="45" type="text" id="fname" name="fname" className="form-control"
                                placeholder="Enter first name" />
                    </div>
                    <div className="mb-3">
                        <label htmlFor="lname" className="form-label">Last Name:</label>
                        <input maxLength="45" type="text" id="lname" name="lname" className="form-control"
                                placeholder="Enter last name" />
                    </div>
                    <div className="mb-3">
                        <label htmlFor="email" className="form-label">Email:</label>
                        <input maxLength="45" type="email" id="email" name="email" className="form-control"
                                placeholder="Enter email" />
                    </div>
                    <div className="mb-3">
                        <label htmlFor="pwd" className="form-label">Password:</label>
                        <input minLength="12" type="password" id="pwd" name="pwd" className="form-control"
                                placeholder="Enter password" />
                    </div>
                    <div className="mb-3">
                        <label htmlFor="pwd_confirm" className="form-label">Confirm Password:</label>
                        <input minLength="12" type="password" id="pwd_confirm" name="pwd_confirm" className="form-control"
                                placeholder="Confirm password" />
                    </div>
                    <div className="mb-3">
                        <button onClick={toggleForm} style={{ marginLeft: '5px' }}>Discard Changes</button>
                        <button type="submit" className="btn btn-primary">Submit</button>
                    </div>
                </form>
                <form action="process_deleteMember.php" method="post">
                    <button type="delete" className="btn btn-danger">Delete</button>
                </form>
                </div>
            )}
        </div>
    );
}

// Mount the component to the DOM
ReactDOM.render(<LoginRegister />, document.getElementById('app'));
