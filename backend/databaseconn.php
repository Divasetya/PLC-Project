<?php
// Fungsi untuk membuat koneksi ke database
    function getConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dataharvesting";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        return $conn;
    }
?>