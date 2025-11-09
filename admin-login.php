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
    min-height: 100vh;
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    flex-direction: column;
  }

  main {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 60px; /* push below navbar */
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
  </style>
</head>

<body>
  <!-- ✅ Navbar added -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand" href="index.html">
          <img src="images/logo.png" alt="Logo" width="35" height="35" class="me-2">MovieBooker
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="movies.php">Now Showing</a>
        </li>
      </ul>
      </div>
  </div>
  </nav>

  <main class="container py-5">
    <div class="row justify-content-center">
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
   </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; 2025 MovieBooker. All rights reserved.</p>
  </footer>

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