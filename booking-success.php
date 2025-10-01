<?php
  // booking-success.php
  require 'db.php';
  // Simple validation & sanitization
  function safe($v) { return htmlspecialchars($v ?? ''); }

  $name     = safe($_POST['name']    ?? '');
  $email    = safe($_POST['email']   ?? '');
  $date     = safe($_POST['date']    ?? '');
  $seats    = (int)($_POST['seats']  ?? 0);
  // Validate seats
  if ($seats <= 0 || $seats > 10) {
      echo "<script>alert('Seats must be between 1 and 10.'); window.history.back();</script>";
      exit();
  }
  $movie    = safe($_POST['movie']   ?? '');
  $showtime = safe($_POST['showtime']?? '');

  // Basic guard: if something critical missing, redirect back
  if (!$name || !$email || !$date || !$seats || !$movie || !$showtime) {
    header('Location: book.php');
    exit;
  }
  // 🔹 Server-side check to block past date/time (robust)
  $dt = DateTime::createFromFormat('Y-m-d g:i A', $date . ' ' . $showtime);
  if (!$dt) {
      // fallback parse (handles some alternate formats)
      $ts = strtotime($date . ' ' . $showtime);
      if ($ts === false) {
          echo "<script>alert('Invalid date/time. Please select a valid date.'); window.history.back();</script>";
          exit();
      }
      $dt = new DateTime();
      $dt->setTimestamp($ts);
  }

  // Optional: set timezone explicitly if needed, e.g.:
  // $dt->setTimezone(new DateTimeZone('Asia/Kolkata'));

  $now = new DateTime();
  if ($dt < $now) {
      echo "<script>alert('You cannot book for a past date or time. Please choose a future date/time.'); window.history.back();</script>";
      exit();
  }


  $stmt = $mysqli->prepare("INSERT INTO bookings (movie_title, showtime, name, email, date, seats) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssi", $movie, $showtime, $name, $email, $date, $seats);
  $stmt->execute();
  $stmt->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Confirmed - MovieBooker</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <style>
    .card{
        box-shadow: 0 8px 20px rgba(0,0,0,0.5);
    }
  </style>
</head>
<body>
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
      <div class="col-md-7">
        <div class="card bg-dark text-white">
          <div class="card-body">
            <h3 class="mb-3">🎉 Booking Confirmed! 🎉</h3>
            <p class="mb-1"><strong>Movie:</strong> <?php echo $movie; ?></p>
            <p class="mb-1"><strong>Showtime:</strong> <?php echo $showtime; ?></p>
            <p class="mb-1"><strong>Name:</strong> <?php echo $name; ?></p>
            <p class="mb-1"><strong>Email:</strong> <?php echo $email; ?></p>
            <p class="mb-1"><strong>Date:</strong> <?php echo $date; ?></p>
            <p class="mb-1"><strong>Seats:</strong> <?php echo $seats; ?></p>

            <hr class="border-secondary">
            <a href="movies.php" class="btn btn-primary">Book Another</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 MovieBooker. All rights reserved.</p>
  </footer>

  <script src="bootstrap.bundle.min.js"></script>
</body>
</html>