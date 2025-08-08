<?php
include("db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Login - Tourism Destination</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
     background-image: url('http://www.pixelstalk.net/wp-content/uploads/2016/07/Free-Plain-HD-Photos.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;
  }
  .login-container {
    background: white;
    padding: 40px 50px;
    border-radius: 8px;
    box-shadow: 0 0 10px lightcoral;
    width: 100%;
    max-width: 400px;
    text-align: center;
  }
  .login-container h2 {
    margin-bottom: 25px;
    color: #fa002aff;
  }
  .login-container label {
    text-align: left;
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 15px;
  }
  .login-container input {
    padding: 10px;
    width: 100%;
    border: 1px solid #de0c52ff;
    border-radius: 4px;
    margin-bottom: 10px;
    font-size: 16px;
  }
  .login-container button {
    margin-top: 15px;
    padding: 10px;
    width: 100%;
    background-color: #de0c52ff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
  }
  .login-container button:hover {
    background-color: #f20443ff;
  }
  .error-message {
    color: red;
    margin-top: 15px;
  }
  .signup-link {
    margin-top: 20px;
    font-size: 14px;
  }
  .signup-link a {
    color: #00ffeeff;
    text-decoration: none;
  }
  .signup-link a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>
<div class="login-container">
  <h2>Login to Tourism Destination</h2>
  <form action="home.php" method="post">
  <div class="signup">
  <h1 style="color:Green">Log In</h1>
  <h4>It's free and only takes a minute</h4>
    <label for="username">Username</label>
    <input type="email" name="mail" required autofocus />
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required />
    <button type="submit">Login</button>
  </form>
  <p style="text-allign:center">By clicking the Log In button, you agree to our<br>
        <a href="termsandconditions.php">Terms and Condition</a>and <a href="#">Policy Privacy</a>
    </p>
    <p>Not have an account? <a href="signup.php">Sign Up Here</a></p>
    </div>
</div>
</body>
</html>