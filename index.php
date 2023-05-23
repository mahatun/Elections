<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/style.css">
</head>
<body>
      
      <div class="container" id="container">
        <div class="form-container sign-up-container">
          <form action="/RegistrationController.php" method="post">
            <h1>Create Account</h1>
            <div class="social-container">
              <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
              <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <input type="text" id='id' placeholder="Id" />
            <input type="text" id = 'username' placeholder="Name" />
            <input type="email" id = 'email' placeholder="Email" />
            
            
            
            <input type="password" id = "password" placeholder="Password" />
            <input type="number"  id = "is_admin" placeholder="0 if user 1 if admin">
            <button>Sign Up</button>
          </form>
        </div>
        <div class="form-container sign-in-container">
          <form action="/loginController.php" method="post">
            <h1>Sign in</h1>
            <div class="social-container">
              <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
              <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="text" id = "id" placeholder="Id" />
            <input type="password" id = "password" placeholder="Password" />
            <input type="number"  id = "is_adminl" placeholder="0 if user 1 if admin">
            <a href="#">Forgot your password?</a>
            <button>Sign In</button>
          </form>
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back!</h1>
              <p>To keep connected with us please login with your personal info</p>
              <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Hello, Friend!</h1>
              <p>Enter your personal details and start journey with us</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
        <div class="erreur">
            <?php
              if (isset($_GET['error'])) {
                if ($_GET['error'] == 0)
                {
                  echo '<div id="error-popup">Incorrect email or password. Please try again.<button id="close-btn">Close</button></div>';
                } else if ($_GET['error'] == 1)
                {
                  echo '<div id="error-popup">Email or username already used. Please try again.<button id="close-btn">Close</button></div>';
                }
              }
            ?>
	    </div>
      </div>

      
<script src="/java.js">
  </script>
  
</body>
</html>
