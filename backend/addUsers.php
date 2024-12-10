<?php
    // Hubungkan ke database
    include 'databaseconn.php';

    // Periksa apakah data form dikirim
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $npk = $_POST['npk'];
        $position = $_POST['position'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $admin = ($_POST['admin'] === 'Ya') ? 1 : 0; // Konversi dropdown menjadi angka

        // Validasi sederhana (opsional)
        if (empty($fname) || empty($lname) || empty($npk) || empty($position) || empty($email) || empty($no_telp)) {
            die('Semua data harus diisi!');
        }

        // Query untuk menambahkan user baru
        $query = "INSERT INTO user (`fname`, `lname`, `npk`, `posisi`, `email`, `alamat`, `no_telp`, `admin`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Gunakan prepared statement untuk mencegah SQL injection
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssssssi', $fname, $lname, $npk, $position, $email, $alamat, $no_telp, $admin);

        if ($stmt->execute()) {
            // Redirect ke halaman Manage User dengan pesan sukses
            header("Location: ../pages/manageUser.php?success=User berhasil ditambahkan");
            exit();
        } else {
            echo "Gagal menambahkan user: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Metode tidak valid!";
    }
?>