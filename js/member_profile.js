//import UserList from "./userList";

// React component to handle login and register forms
function LoginRegister() {
    // State variable to track the current form (login or register)
    const [viewOnly, setIsEdit] = React.useState(true);

    // Function to toggle between login and register forms
    function toggleForm() {
        console.log('Toggling form');
        setIsEdit(!viewOnly);
        console.log('isEdit: ', viewOnly);
    }

    console.log('Rendering Member Profile component'); // Add console log here

    try {
    // Render either login or register form based on the current state
    return (
        <div>
            {viewOnly ? (
                <div>
                    <h1>Member Profile</h1>
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name:</label>
                        <input maxlength="45" type="text" id="fname" name="fname" class="form-control"
                                placeholder="Enter first name" />
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input maxlength="45" type="text" id="lname" name="lname" class="form-control"
                                placeholder="Enter last name" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input maxlength="45" required type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter email" />
                    </div>
                    <div class="mb-3">
                            <button onClick={toggleForm} style={{ marginLeft: '5px' }}>Edit Profile</button>
                    </div>
                </div>
            ) : (
                <div>
                <h1>Member Profile</h1>
                <form action="process_updateMember.php" method="post">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name:</label>
                        <input maxlength="45" type="text" id="fname" name="fname" class="form-control"
                                placeholder="Enter first name" />
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input maxlength="45" type="text" id="lname" name="lname" class="form-control"
                                placeholder="Enter last name" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input maxlength="45" type="email" id="email" name="email" class="form-control"
                                placeholder="Enter email" />
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input minlength="12" type="password" id="pwd" name="pwd" class="form-control"
                                placeholder="Enter password" />
                    </div>
                    <div class="mb-3">
                        <label for="pwd_confirm" class="form-label">Confirm Password:</label>
                        <input minlength="12" type="password" id="pwd_confirm" name="pwd_confirm" class="form-control"
                                placeholder="Confirm password" />
                    </div>
                    <div class="mb-3">
                        <button onClick={toggleForm} style={{ marginLeft: '5px' }}>Discard Changes</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <form action="process_deleteMember.php" method="post">
                    <button type="delete" class="btn btn-alert">Delete</button>
                </form>
                </div>
            )}
        </div>
    );
    } catch (error) {
        console.error('Error rendering component:', error);
        return null; // Render null or an error message
    }
}

// Mount the component to the DOM
ReactDOM.render(<LoginRegister />, document.getElementById('app'));