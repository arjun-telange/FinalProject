<?php
// book.php
// Read selected movie + time from POST (fallback to empty if direct access)
$movie    = isset($_POST['movie']) ? $_POST['movie'] : '';
$showtime = isset($_POST['showtime']) ? $_POST['showtime'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Tickets - MovieBooker</title>
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
      <a class="navbar-brand" href="index.html">MovieBooker</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="movies.php">Now Showing</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-5">
    <h2 class="mb-4 text-center">Book Your Tickets</h2>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card bg-dark text-white">
          <div class="card-body">
            <form action="payment.php" method="POST" novalidate>
              <!-- Carry forward selected movie + showtime -->
              <input type="hidden" name="movie" value="<?php echo htmlspecialchars($movie); ?>">
              <input type="hidden" name="showtime" value="<?php echo htmlspecialchars($showtime); ?>">

              <div class="mb-3">
                <label class="form-label">Movie</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($movie ?: 'Not selected'); ?>" disabled>
              </div>

              <div class="mb-3">
                <label class="form-label">Showtime</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($showtime ?: 'Not selected'); ?>" disabled>
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email (for confirmation)</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>

              <div class="mb-3">
                <label for="seats" class="form-label">Number of Seats</label>
                <input type="number" min="1" max="10" value="1" class="form-control" id="seats" name="seats" required>
              </div>

              <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
            </form>
          </div>
        </div>

        <?php if (!$movie || !$showtime): ?>
          <p class="mt-3 text-warning">Tip: Go back to <a href="movies.php" class="text-info">Now Showing</a> and click <strong>Book Now</strong> on a movie to prefill details.</p>
        <?php endif; ?>
      </div>
    </div>
  </main>

  <footer class="bg-dark text-white text-center py-3 mt-auto">
    <p class="mb-0">&copy; 2025 MovieBooker. All rights reserved.</p>
  </footer>

  <script src="bootstrap.bundle.min.js"></script>
  <!-- Add this warning element just above the Confirm button (inside the form, e.g. after the date input) -->
<div id="dateWarning" class="alert alert-warning mt-2 mb-3" role="alert" style="display:none;">
  Selected date/time is in the past. Please choose a valid date or time.
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const dateInput = document.getElementById("date");
    const submitBtn = document.querySelector("button[type='submit']");
    const showtime = "<?php echo htmlspecialchars($showtime); ?>"; // e.g., "3:30 PM"
    const dateWarning = document.getElementById("dateWarning");

    // 1) Block past dates in calendar by setting min = today (YYYY-MM-DD)
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    const todayStr = ${yyyy}-${mm}-${dd};
    dateInput.setAttribute('min', todayStr);

    // Optionally prefill date to today if you want:
    // dateInput.value = todayStr;

    function parseShowtimeToHoursMinutes(showtimeStr) {
        const timeMatch = showtimeStr.match(/(\d{1,2}):(\d{2})\s?(AM|PM)/i);
        if (!timeMatch) return null;
        let hours = parseInt(timeMatch[1], 10);
        const minutes = parseInt(timeMatch[2], 10);
        const ampm = timeMatch[3].toUpperCase();
        if (ampm === "PM" && hours !== 12) hours += 12;
        if (ampm === "AM" && hours === 12) hours = 0;
        return { hours, minutes };
    }

    function showInvalid(message) {
        dateWarning.textContent = message;
        dateWarning.style.display = "block";
        submitBtn.disabled = true;
        submitBtn.classList.remove("btn-primary");
        submitBtn.classList.add("btn-secondary");
    }

    function clearInvalid() {
        dateWarning.style.display = "none";
        submitBtn.disabled = false;
        submitBtn.textContent = "Confirm Booking";
        submitBtn.classList.remove("btn-secondary");
        submitBtn.classList.add("btn-primary");
    }

    function checkDateTime() {
        // no date picked yet
        if (!dateInput.value) {
            clearInvalid();
            return;
        }

        // construct selected date and time
        const parts = dateInput.value.split('-');
        const selYear = parseInt(parts[0], 10);
        const selMonth = parseInt(parts[1], 10) - 1; // zero-based
        const selDay = parseInt(parts[2], 10);
        const selDate = new Date(selYear, selMonth, selDay);

        const hm = parseShowtimeToHoursMinutes(showtime);
        let selectedDateTime = new Date(selDate);
        if (hm) selectedDateTime.setHours(hm.hours, hm.minutes, 0, 0);
        else selectedDateTime.setHours(0,0,0,0); // fallback

        const now = new Date();

        // 1. If date < today → shouldn't be possible because of min attribute, but handle anyway
        const todayStart = new Date(now.getFullYear(), now.getMonth(), now.getDate());
        const selectedStart = new Date(selectedDateTime.getFullYear(), selectedDateTime.getMonth(), selectedDateTime.getDate());

        if (selectedStart < todayStart) {
            showInvalid("You selected a past date. Please select today or a future date.");
            return;
        }

        // 2. If selected date is today and showtime already passed → warn & disable
        if (selectedStart.getTime() === todayStart.getTime() && selectedDateTime < now) {
            showInvalid("For today, that showtime has already passed. Choose a different date.");
            return;
        }

        // otherwise it's valid
        clearInvalid();
    }

    // run on load (useful if you prefilling date)
    checkDateTime();

    // run on change
    dateInput.addEventListener("change", checkDateTime);
});
</script>
</body>
</html>