<?php 
include 'db_connection.php';
?>

<!DOCTYPE html> 
<html lang="en">
<head>
     <meta charset="UTF-8" /> 
     <meta name="viewport" content="width=device-width, initial-scale=1" /> 
     <title>Login</title>
<style> 
      body { 
        font-family: Arial, sans-serif; 
        background-image: url('http://www.pixelstalk.net/wp-content/uploads/2016/07/Free-Plain-HD-Photos.jpg'); ; 
        color: #444; 
        margin: 0; 
        padding: 0; 
      } 

      .login-container { 
        max-width: 900px; 
        margin: 50px auto; 
        display: flex; 
        justify-content: center; /* center horizontally */ 
        padding: 0 20px; 
      }

      form {
        width: 320px; 
        border: 1px solid #eee; 
        padding: 40px 20px 20px 20px; 
        background: #fafafa; 
        border-radius: 4px; 
        box-shadow: 0 0 15px rgba(0,0,0,0.1); 
        text-align: center; 
        position: relative; 
        font-size: 14px; 
      } 

      form::before { 
        content: ""; 
        position: absolute; 
        top: 20px; 
        left: 50%; 
        width: 150px; 
        height: 150px; 
        background-image: url(' https://clipartcraft.com/images/blue-logo-1.png '); 
        background-repeat: no-repeat; 
        background-size: contain; 
        background-position: center; 
        opacity: 0.1; 
        transform: translateX(-50%); 
        pointer-events: none; 
        z-index: 0;
      } 

      h3 { 
        margin-bottom: 15px; 
        font-weight: 600; 
        position: relative; 
        z-index: 1; 
      } 

      input[type="text"], input[type="password"] { 
        width: 90%; 
        padding: 10px; 
        margin: 10px 0; 
        border-radius: 3px; 
        border: 1px solid #ccc; 
        font-size: 14px; 
        position: relative; 
        z-index: 1; 
      } 

      .btn { 
        padding: 8px 16px; 
        margin: 10px 5px 0 5px; 
        border: none; 
        border-radius: 3px; 
        cursor: pointer; 
        font-size: 14px; 
        position: relative; 
        z-index: 1; 
      } 

      .btn-login {
        background-color: #007bff; 
        color: white; 
      } 

      .btn-close {
        background-color: #ffc107; 
        color: black; 
      } 
</style> 
</head> 
<body>
      <div class="login-container"> 
        <form method="POST" action="login.php" id="loginForm"> 
          <h3>LOGIN</h3> 
              <input type="text" name="username" placeholder="Username" required /> 
              <input type="password" name="password" placeholder="Password" required />
              <br />
              <button type="button" class="btn-close" onclick="window.location.href='index.php'">Cancel</button> 
              <button type="submit" class="btn btn-login">Login</button>
        </form> 
      </div>
  </body> 
</html>