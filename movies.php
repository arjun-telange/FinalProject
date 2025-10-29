<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Now Showing - MovieBooker</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
            <a class="nav-link active" href="movies.php">Movies</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="admin-login.php">Admin Login</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Movie List Section -->
    <main class="container py-5">
        <h2 class="text-center mb-4">Now Showing</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <!--Shawshank Redemption Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/shawshank.jpg"
                class="card-img-top"
                alt="The Shawshank Redemption poster"
                loading="lazy">
              <!-- Shawshank Redemption card body -->
              <div class="card-body">
                <h5 class="card-title">The Shawshank Redemption</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="The Shawshank Redemption">
                    <input type="hidden" name="showtime" value="1:30 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="13:30">1:30 PM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="The Shawshank Redemption">
                    <input type="hidden" name="showtime" value="8:30 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="20:30">8:30 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>
        
            <!--Demon Slayer Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/demonslayer.jpg"
                class="card-img-top"
                alt="Demon Slayer poster"
                loading="lazy">
              <!-- Demon Slayer card body -->
              <div class="card-body">
                <h5 class="card-title">Demon Slayer- Infinity Castle</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="Demon Slayer">
                    <input type="hidden" name="showtime" value="10:00 AM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="10:00">10:00 AM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="Demon Slayer">
                    <input type="hidden" name="showtime" value="5:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="17:00">5:00 PM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="Demon Slayer">
                    <input type="hidden" name="showtime" value="9:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="21:00">9:00 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

            <!--Mahavatar Narsimha Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/mahavatarnarsimha.jpg"
                class="card-img-top"
                alt="Mahavatar Narsimha poster"
                loading="lazy">
              <!-- Mahavatar Narsimha card body -->
              <div class="card-body">
                <h5 class="card-title">Mahavatar Narsimha</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="Mahavatar Narsimha">
                    <input type="hidden" name="showtime" value="3:30 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="15:30">3:30 PM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="Mahavatar Narsimha">
                    <input type="hidden" name="showtime" value="8:30 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="20:30">8:30 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>            

            <!--The Batman Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/batman.jpg"
                class="card-img-top"
                alt="The Batman poster"
                loading="lazy">
              <!-- The Batman card body -->
              <div class="card-body">
                <h5 class="card-title">The Batman</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="The Batman">
                    <input type="hidden" name="showtime" value="9:30 AM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="09:30">9:30 AM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="The Batman">
                    <input type="hidden" name="showtime" value="8:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="20:00">8:00 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

            <!--Hereditary Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/hereditary.jpg"
                class="card-img-top"
                alt="Hereditary poster"
                loading="lazy">
              <!-- Hereditary card body -->
              <div class="card-body">
                <h5 class="card-title">Hereditary</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="Hereditary">
                    <input type="hidden" name="showtime" value="10:00 AM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="10:00">10:00 AM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="Hereditary">
                    <input type="hidden" name="showtime" value="6:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="18:00">6:00 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>
            
            <!--The Conjuring Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/conjuring.jpg"
                class="card-img-top"
                alt="The Conjuring poster"
                loading="lazy">
              <!-- The Conjuring card body -->
              <div class="card-body">
                <h5 class="card-title">The Conjuring- Last Rites</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="The Conjuring">
                    <input type="hidden" name="showtime" value="1:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="13:00">1:00 PM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="The Conjuring">
                    <input type="hidden" name="showtime" value="5:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="17:00">5:00 PM</button>
                  </form>
                  <!-- Showtime 3 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="The Conjuring">
                    <input type="hidden" name="showtime" value="9:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="21:00">9:00 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>
            
            <!--Evil Dead Rise Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/evildead.jpg"
                class="card-img-top"
                alt="Evil Dead Rise poster"
                loading="lazy">
              <!-- Hereditary card body -->
              <div class="card-body">
                <h5 class="card-title">Evil Dead Rise</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="Evil Dead Rise">
                    <input type="hidden" name="showtime" value="11:00 AM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="11:00">11:00 AM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="Evil Dead Rise">
                    <input type="hidden" name="showtime" value="4:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="16:00">4:00 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

            <!--It Chapter-1 Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/it.jpg"
                class="card-img-top"
                alt="It Chapter-1 poster"
                loading="lazy">
              <!-- It Chapter-1 card body -->
              <div class="card-body">
                <h5 class="card-title">It Chapter-1</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="It Chapter-1">
                    <input type="hidden" name="showtime" value="11:30 AM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="11:30">11:30 AM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="It Chapter-1">
                    <input type="hidden" name="showtime" value="9:30 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="21:30">9:30 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

            <!--Inception Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/inception.jpg"
                class="card-img-top"
                alt="Inception poster"
                loading="lazy">
              <!-- Inception card body -->
              <div class="card-body">
                <h5 class="card-title">Inception</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="Inception">
                    <input type="hidden" name="showtime" value="12:30 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="12:30">12:30 PM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="Inception">
                    <input type="hidden" name="showtime" value="7:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="19:00">7:00 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

            <!--Interstellar Card-->
            <div class="col-md-3 md-4">
            <div class="card h-100 bg-dark text-white">
              <img 
                src="images/interstellar.jpg"
                class="card-img-top"
                alt="Interstellar poster"
                loading="lazy">
              <!-- Interstellar card body -->
              <div class="card-body">
                <h5 class="card-title">Interstellar</h5>
                <p class="mb-2">Showtimes:</p>
                <div class="d-flex flex-wrap gap-2">
                  <!-- Showtime 1 -->
                  <form action="book.php" method="POST"> 
                    <input type="hidden" name="movie" value="Interstellar">
                    <input type="hidden" name="showtime" value="2:00 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="14:00">2:00 PM</button>
                  </form>
                  <!-- Showtime 2 -->
                  <form action="book.php" method="POST">
                    <input type="hidden" name="movie" value="Interstellar">
                    <input type="hidden" name="showtime" value="10:30 PM">
                    <button type="submit" class="btn btn-sm btn-primary" data-date="2025-10-29" data-time="22:30">10:30 PM</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; 2025 MovieBooker. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS (optional, if you need navbar toggle etc.) -->
    <script src="bootstrap.bundle.min.js"></script>

    <!-- New Script-->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const now = new Date();

        document.querySelectorAll("button[data-date][data-time]").forEach(function (btn) {
            const showDate = btn.getAttribute("data-date");
            const showTime = btn.getAttribute("data-time");

            const showDateTime = new Date(showDate + "T" + showTime + ":00"); // e.g. 2025-10-29T13:30:00

            if (showDateTime < now) {
                btn.disabled = true;
                btn.textContent = "Showtime Passed";
                btn.classList.remove("btn-primary");
                btn.classList.add("btn-secondary");
            }
        });
    });
    </script>

    <!--
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          const now = new Date();

          document.querySelectorAll(".card").forEach(function (card) {
              const timeText = card.querySelector(".card-text").textContent; 
              const showDateAttr = card.querySelector(".card-text").getAttribute("data-date");

              const timeMatch = timeText.match(/(\d{1,2}):(\d{2})\s?(AM|PM)/i);
              if (timeMatch && showDateAttr) {
                  let hours = parseInt(timeMatch[1]);
                  const minutes = parseInt(timeMatch[2]);
                  const ampm = timeMatch[3].toUpperCase();

                  if (ampm === "PM" && hours !== 12) hours += 12;
                  if (ampm === "AM" && hours === 12) hours = 0;

                  // Create full datetime from date attribute
                  const showtimeDate = new Date(showDateAttr);
                  showtimeDate.setHours(hours, minutes, 0, 0);

                  if (showtimeDate < now) {
                      const button = card.querySelector("button");
                      button.disabled = true;
                      button.textContent = "Showtime Passed";
                      button.classList.remove("btn-primary");
                      button.classList.add("btn-secondary");
                  }
              }
          });
      });
    </script>
    -->
</body>
</html>