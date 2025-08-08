<?php
session_start();
include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT password FROM admin_user_db WHERE username = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid username.";
    }

    $stmt->close();
} else {
    $error = "Invalid request method.";
}

if (isset($error)) {
    echo "<script>alert('$error'); window.location.href='admin_user.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Tourism Destination</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
     background-image: url('https://storage.pixteller.com/designs/designs-images/2019-03-27/05/love-and-passion-background-backgrounds-love-1-5c9b994ec8376.png');
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
    color: #ff003cff;
    text-decoration: none;
  }
  .signup-link a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>
  <form action="home.php" method="post">

<div class="login-container">
  <h2>Login to Tourism Destination</h2>
  <form method="POST" action="admin_dashboard.php">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required autofocus />

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required />

    <button type="submit">Login</button>
  </form>

  <p class="signup-link">
    Don't have an account? <a href="signup.php">Sign up here</a>
  </p>
</div>

</body>
</html>