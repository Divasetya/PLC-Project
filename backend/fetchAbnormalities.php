<?php
    // Koneksi ke database
    include_once "databaseconn.php";

    // Inisiasi koneksi
    $koneksi = getConnection();

    // Cek koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Query untuk mengambil data
    $query = "SELECT 
    ab.`id`, 
    ds.`serial_no`, 
    ab.`timestamp`, 
    ab.`sensor_name`, 
    ab.`value`, 
    ab.`min_limit`, 
    ab.`max_limit` 
FROM abnormalities AS ab 
JOIN datasensor AS ds ON ab.`id` = ds.`id` 
ORDER BY ab.`timestamp` DESC 
LIMIT 10";

    $result = $koneksi->query($query);

    $id = [];
    $serialNo = [];
    $timestamp = [];
    $sensorName = [];
    $value = [];
    $minLimit = [];
    $maxLimit = [];

    // Tutup koneksi
    $koneksi->close();

?>