<?php
// Database connection
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "dataharvesting"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel
$query = "SELECT id, timestamp, sensor_name, value, min_limit, max_limit FROM abnormalities";
$result = $conn->query($query);

if (!$result) {
    die("Query gagal: " . $conn->error);
}

// Set header untuk file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_abnormalities.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Tulis header tabel ke file Excel
echo "ID\tTimestamp\tSensor Name\tValue\tMin Limit\tMax Limit\n";

// Tulis data ke file Excel
while ($row = $result->fetch_assoc()) {
    echo "{$row['id']}\t{$row['timestamp']}\t{$row['sensor_name']}\t{$row['value']}\t{$row['min_limit']}\t{$row['max_limit']}\n";
}

// Tutup koneksi
$conn->close();
?>
