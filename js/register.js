// React component to handle login and register forms
function LoginRegister() {
    // State variable to track the current form (login or register)
    const [student, setIsStudent] = React.useState(true);

    // Function to toggle between login and register forms
    function toggleForm() {
        console.log('Toggling form');
        setIsStudent(!student);
        console.log('isRegister: ', student);
    }

    console.log('Rendering LoginRegister component'); // Add console log here

    try {
    // Render either login or register form based on the current state
    return (
        <div>
            {student ? (
                <div>
                    <h1>Student Registration</h1>
                    <p>
                        To register as student, please go to the 
                        <span style={{ marginLeft: '5px', cursor: 'pointer', color: 'purple', fontWeight: 'bold', textDecoration: 'none' }} onClick={toggleForm} onMouseEnter={(e) => { e.target.style.textDecoration = 'underline';}} onMouseLeave={(e) => { e.target.style.textDecoration = 'none';}}>Instructor Register</span> page.
                    </p>
                    <form action="process_register.php" method="post">
                        <div class="input-boxes">
                            <div class="input-hidden">
                                <input hidden id="accType" name="accType" value="student" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input maxlength="45" type="text" id="fname" name="fname" placeholder="Enter your first name" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input required maxlength="45" type="text" id="lname" name="lname" placeholder="Enter your last name" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input required maxlength="45" type="text" id="email" name="email" placeholder="Enter your email" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input required minlength="12" type="password" id="pwd" name="pwd" placeholder="Enter your password" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input required minlength="12" type="password" id="pwd_confirm" name="pwd_confirm" placeholder="Enter your password" />
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Submit" />
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                        </div>
                    </form>
                </div>
            ) : (
                <div>
                    <h1>Instructor Registration</h1>
                    <p>
                        To register as student, please go to the 
                        <span style={{ marginLeft: '5px', cursor: 'pointer', color: 'purple', fontWeight: 'bold', textDecoration: 'none' }} onClick={toggleForm} onMouseEnter={(e) => { e.target.style.textDecoration = 'underline';}} onMouseLeave={(e) => { e.target.style.textDecoration = 'none';}}>Student Register</span> page.
                    </p>
                    <form action="process_register.php" method="post">
                        <div class="input-boxes">
                            <div class="input-hidden">
                                <input hidden id="accType" name="accType" value="instructor" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input maxlength="45" type="text" id="fname" name="fname" placeholder="Enter your first name" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input required maxlength="45" type="text" id="lname" name="lname" placeholder="Enter your last name" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input required maxlength="45" type="text" id="email" name="email" placeholder="Enter your email" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input required minlength="12" type="password" id="pwd" name="pwd" placeholder="Enter your password" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input required minlength="12" type="password" id="pwd_confirm" name="pwd_confirm" placeholder="Enter your password" />
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Submit" />
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
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
ReactDOM.render(<LoginRegister />, document.getElementById('signup-form'));