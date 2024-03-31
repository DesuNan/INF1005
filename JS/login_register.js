// React component to handle login and register forms
function LoginRegister() {
    // State variable to track the current form (login or register)
    const [isLogin, setIsLogin] = React.useState(true);

    // Function to toggle between login and register forms
    function toggleForm() {
        console.log('Toggling form');
        setIsLogin(!isLogin);
        console.log('isLogin: ', isLogin);
    }

    console.log('Rendering LoginRegister component'); // Add console log here

    try {
    // Render either login or register form based on the current state
    return (
        <div>
            {isLogin ? (
                <div>
                    <h1>Member Login</h1>
                    <p>
                        Existing members log in here. For new members, please go to the{" "}
                        <button onClick={toggleForm} style={{ marginLeft: '5px' }}>Member Registration page</button>.
                    </p>
                    <form action="process_login.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input maxlength="45" required type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter email" />
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password:</label>
                            <input type="password" id="pwd" name="pwd" class="form-control"
                                    placeholder="Enter password" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            ) : (
                <div>
                <h1>Member Registration</h1>
                <p>
                    For existing members, please go to the{""}
                    <button onClick={toggleForm} style={{ marginLeft: '5px' }}>Sign In page</button>.
                </p>
                <form action="process_register.php" method="post">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name:</label>
                        <input maxlength="45" type="text" id="fname" name="fname" class="form-control"
                                placeholder="Enter first name" />
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name:</label>
                        <input required maxlength="45" type="text" id="lname" name="lname" class="form-control"
                                placeholder="Enter last name" />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input maxlength="45" required type="email" id="email" name="email" class="form-control"
                                placeholder="Enter email" />
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input required minlength="12" type="password" id="pwd" name="pwd" class="form-control"
                                placeholder="Enter password" />
                    </div>
                    <div class="mb-3">
                        <label for="pwd_confirm" class="form-label">Confirm Password:</label>
                        <input required minlength="12" type="password" id="pwd_confirm" name="pwd_confirm" class="form-control"
                                placeholder="Confirm password" />
                    </div>
                    <div class="mb-3 form-check">
                        <label>
                            <input required type="checkbox" name="agree" id="agree" class="form-check-input" />
                            Agree to terms and conditions.
                        </label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
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