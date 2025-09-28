<?php
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Hardcoded credentials (change as needed)
    if ($username === 'Arjun_549' && $password === 'Arjun21pro') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin-dashboard.php');
        exit;
    } else {
        $error = 'Invalid credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login - MovieBooker</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #141e30, #243b55);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-card {
      width: 100%;
      max-width: 400px;
      background-color: #1c1c1c;
      color: white;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.5);
    }
    .form-control {
      background-color: #2c2c2c;
      border: 1px solid #444;
      color: #fff;
    }
    .form-control:focus {
      background-color: #2c2c2c;
      color: #fff;
      border-color: #007bff;
      box-shadow: none;
    }
    .btn-primary {
      width: 100%;
    }
    h3 {
      text-align: center;
      margin-bottom: 1.5rem;
    }
  </style>
</head>

<body>
  <div class="login-card">
    <h3>🔐 Admin Login</h3>
    <form action="admin-login.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <input type="password" name="password" id="password" class="form-control" required>
          <button class="btn btn-outline-secondary" type="button" id="togglePassword">
              👁
          </button>
          </div>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
  <script>
      const togglePassword = document.getElementById("togglePassword");
      const passwordField = document.getElementById("password");

      togglePassword.addEventListener("click", function () {
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
        this.textContent = type === "password" ? "👁" : "🙈";
        });
  </script>
  <script src="bootstrap.bundle.min.js"></script>
</body>
</html>