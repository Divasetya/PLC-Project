<?php
    include 'databaseconn.php';

    // Fungsi untuk mengambil user aktif
    function getUsers() {
        $conn = getConnection();

        // Query hanya untuk user dengan is_active = 1
        $sql = "SELECT npk, CONCAT(fname, ' ', lname) AS nama, posisi, email, no_telp FROM user WHERE is_active = 1";
        $result = $conn->query($sql);

        if (!$result) {
            die("Query error: " . $conn->error);
        }

        $conn->close();
        return $result;
    }

?>

<?php

if (isset($_POST['npk'])) {
    $npk = intval($_POST['npk']); // Ambil NPK dari request

    $conn = getConnection();
    $sql = "UPDATE user SET is_active = 0 WHERE npk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $npk);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'User berhasil dihapus.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus user.']);
    }

    $stmt->close();
    $conn->close();

}
?>
