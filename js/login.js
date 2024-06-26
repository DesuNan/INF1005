// React component to handle login and register forms
function LoginRegister() {
    // State variable to track the current form (login or register)
    const [student, setIsStudent] = React.useState(true);

    // Function to toggle between login and register forms
    function toggleForm() {
        console.log('Toggling form');
        setIsStudent(!student);
        console.log('isLogin: ', student);
    }

    console.log('Rendering Member Profile component'); // Add console log here

    try {
    // Render either login or register form based on the current state
    return (
        <div>
            {student ? (
                <div>
                    <h1>Student Login</h1>
                    <p>
                        To login as instructor, please go to the 
                        <span style={{ marginLeft: '5px', cursor: 'pointer', color: 'purple', fontWeight: 'bold', textDecoration: 'none' }} onClick={toggleForm} onMouseEnter={(e) => { e.target.style.textDecoration = 'underline';}} onMouseLeave={(e) => { e.target.style.textDecoration = 'none';}}>Instructor Login</span> page.
                    </p>
                    <form action="process_login.php" method="post">
                        <div class="input-boxes">
                            <div class="input-hidden">
                                <input hidden id="accType" name="accType" value="student" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input required type="text" id="email" name="email" placeholder="Enter your email" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input required type="password" id="pwd" name="pwd" placeholder="Enter your password" />
                            </div>
                            <div class="text">
                                <a href="passReset.php">Forgot password?</a>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Submit" />
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
                        </div>
                    </form>
                </div>
            ) : (
                <div>
                    <h1>Instructor Login</h1>
                    <p>
                        To login as instructor, please go to the 
                        <span style={{ marginLeft: '5px', cursor: 'pointer', color: 'purple', fontWeight: 'bold', textDecoration: 'none' }} onClick={toggleForm} onMouseEnter={(e) => { e.target.style.textDecoration = 'underline';}} onMouseLeave={(e) => { e.target.style.textDecoration = 'none';}}>Student Login</span> page.
                    </p>
                    <form action="process_login.php" method="post">
                        <div class="input-boxes">
                            <div class="input-hidden">
                                <input hidden id="accType" name="accType" value="instructor" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input required type="text" id="email" name="email" placeholder="Enter your email" />
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input required type="password" id="pwd" name="pwd" placeholder="Enter your password" />
                            </div>
                            <div class="text">
                                <a href="passReset.php">Forgot password?</a>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Submit" />
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
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
ReactDOM.render(<LoginRegister />, document.getElementById('login-form'));