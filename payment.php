<?php
// payment.php
// Get booking details from POST
$movie    = $_POST['movie'] ?? '';
$showtime = $_POST['showtime'] ?? '';
$date     = $_POST['date'] ?? '';
$seats    = (int)($_POST['seats'] ?? 0);
$name     = $_POST['name'] ?? '';
$email    = $_POST['email'] ?? '';
$pricePerSeat = 150;
$totalAmount  = $seats * $pricePerSeat;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment - MovieBooker</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        body { background-color: #111; color: white; text-align: center; }
        .scanner {
            width: 200px; 
            height: 200px;
            margin: 20px auto;
            border: 3px solid var(--bs-primary); /* Bootstrap green */
            border-radius: 8px; /* Matches button corners */
            background: url('https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=upi://pay?pa=fakeupi@okbank&pn=MovieBooker&am=<?php echo $totalAmount; ?>&cu=INR') no-repeat center;
            background-size: cover;
            position: relative;
            box-shadow: 0 0 10px var(--bs-primary); /* Adds glow effect */
        }

        .scan-line {
            position: absolute;
            width: 100%; height: 4px;
            background: red;
            animation: scan 2s infinite;
        }
        @keyframes scan {
            0% { top: 0; }
            100% { top: 196px; }
        }
        .c1 {
            display: inline-block;     /* shrink background to fit text */
            padding: 5px 10px;         /* space around text */
            box-shadow: 0 0 10px var(--bs-primary); /* Adds glow effect */
            border-radius: 5px;
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

    <div class="container py-5">
        <h1>Complete Your Payment</h1>
        <p>Scan the QR code to pay ₹<?php echo $totalAmount; ?></p>
        
        <div class="scanner">
            <div class="scan-line"></div>
        </div>

        <p class="c1">This is a demo payment. No real money will be transferred.</p>
        
        <!-- Fake Pay Button -->
        <form action="booking-success.php" method="POST" id="payForm">
            <input type="hidden" name="movie" value="<?php echo $movie; ?>">
            <input type="hidden" name="showtime" value="<?php echo $showtime; ?>">
            <input type="hidden" name="date" value="<?php echo $date; ?>">
            <input type="hidden" name="seats" value="<?php echo $seats; ?>">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">

            <button type="button" class="btn btn-primary w-auto" onclick="simulatePayment()" >✅ Simulate Scan & Pay</button>
        </form>
    </div>

    <script>
        function simulatePayment() {
            alert("✅ Payment Successful!");
            document.getElementById('payForm').submit();
        }
    </script>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
     <p class="mb-0">&copy; 2025 MovieBooker. All rights reserved.</p>
    </footer>
</body>
</html>