<?php
require 'db.php';

$search = $_GET['search'] ?? '';
$filter_date = $_GET['filter_date'] ?? '';

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="bookings.csv"');

$output = fopen("php://output", "w");
fputcsv($output, ['ID', 'Movie', 'Showtime', 'Name', 'Email', 'Date', 'Seats']);

if (!empty($search) && !empty($filter_date)) {
    $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE movie_title LIKE ? AND date = ? ORDER BY id DESC");
    $like = "%$search%";
    $stmt->bind_param("ss", $like, $filter_date);
} elseif (!empty($search)) {
    $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE movie_title LIKE ? ORDER BY id DESC");
    $like = "%$search%";
    $stmt->bind_param("s", $like);
} elseif (!empty($filter_date)) {
    $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE date = ? ORDER BY id DESC");
    $stmt->bind_param("s", $filter_date);
} else {
    $stmt = $mysqli->prepare("SELECT * FROM bookings ORDER BY id DESC");
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['id'],
        $row['movie_title'],
        $row['showtime'],
        $row['name'],
        $row['email'],
        $row['date'],
        $row['seats']
    ]);
}

fclose($output);
exit;
?>