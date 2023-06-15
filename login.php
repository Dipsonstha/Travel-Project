
<div class="login-form-container">
        <span class="close-btn" id="form-close">&times;</span>
        <form class="login-form" method="POST">
            <h3>Login</h3>
            <?php
            if (!empty($error)) {
                echo '<div class="error-message">';
                foreach ($error as $errorMsg) {
                    echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
                echo '</div>';
            }
            ?>
            <input type="email" name="email" class="box" placeholder="Enter your email" required>
            <input type="password" name="password" class="box" placeholder="Enter your password">
            <input type="submit" name="send" class="btn" value="Login now">
            <input type="checkbox" id="remember">
            <label for="remember">Remember me</label>
            <p class="forgot-password">Forgot password? <a href="#" id="forgot-password-link">Click here</a></p>
            <p>Don't have an account? <a href="signup.php">Register now</a></p>
        </form>
    </div>
