<?php
    header('Content-Type: application/json'); // Pastikan respons berupa JSON
    include 'databaseconn.php'; // File koneksi database

    // Fungsi untuk mengambil user non-aktif
    function getDeletedUsers() {
        $conn = getConnection();

        // Query untuk mengambil user dengan is_active = 0
        $sql = "SELECT npk, CONCAT(fname, ' ', lname) AS nama, posisi, email, no_telp FROM user WHERE is_active = 0";
        $result = $conn->query($sql);

        if (!$result) {
            die(json_encode(['status' => 'error', 'message' => 'Query error: ' . $conn->error]));
        }

        $conn->close();
        return $result;
    }
?>

<?php

if (isset($_POST['npk'])) {
    $npk = intval($_POST['npk']); // Ambil NPK dari request

    $conn = getConnection();
    $sql = "UPDATE user SET is_active = 1 WHERE npk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $npk);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'User berhasil dipulihkan.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal memulihkan user.']);
    }

    $stmt->close();
    $conn->close();

}
?>
