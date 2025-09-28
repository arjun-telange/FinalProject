<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin-login.php');
    exit;
}

require 'db.php';

$search = $_GET['search'] ?? '';
$filter_date = $_GET['filter_date'] ?? '';

if (!empty($search) && !empty($filter_date)) {
    $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE movie_title LIKE ? AND date = ? ORDER BY id DESC");
    $like = "%$search%";
    $stmt->bind_param("ss", $like, $filter_date);
    $stmt->execute();
    $result = $stmt->get_result();

} elseif (!empty($search)) {
    $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE movie_title LIKE ? ORDER BY id DESC");
    $like = "%$search%";
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $result = $stmt->get_result();

} elseif (!empty($filter_date)) {
    $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE date = ? ORDER BY id DESC");
    $stmt->bind_param("s", $filter_date);
    $stmt->execute();
    $result = $stmt->get_result();

} else {
    // This was missing in your case
    $result = $mysqli->query("SELECT * FROM bookings ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-4 py-2 d-flex justify-content-between align-items-center">
      <h2 class="text-white m-0">🎟 All Bookings</h2>
      <a href="logout.php" class="btn btn-danger btn-sm">🔒 Logout</a>
    </nav><br>
    <form method="GET" class="container mb-4">
      <div class="row g-2">
        <div class="col-md-4">
          <input type="text" name="search" class="form-control" placeholder="Search by movie title" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" />
        </div>
        <div class="col-md-4">
          <input type="date" name="filter_date" class="form-control" value="<?php echo htmlspecialchars($_GET['filter_date'] ?? ''); ?>" />
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
      </div>
    </form>
    <!-- Booking Table -->
    <div class="container-fluid mt-4">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-dark w-100">
          <!-- Table content here -->
            <tr>
                <th>ID</th>
                <th>Movie</th>
                <th>Showtime</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Seats</th>
            </tr>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['movie_title']) ?></td>
                <td><?= htmlspecialchars($row['showtime']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['date']) ?></td>
                <td><?= htmlspecialchars($row['seats']) ?></td>
            </tr>
          <?php endwhile;?>
        </table>
      </div>
    </div>
    <form action="export.php" method="GET" class="mb-3">
      <input type="hidden" name="search" value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
      <input type="hidden" name="filter_date" value="<?php echo htmlspecialchars($_GET['filter_date'] ?? ''); ?>">
      <button type="submit" class="btn btn-primary">⬇ Export CSV</button>
    </form>

</body>
</html>