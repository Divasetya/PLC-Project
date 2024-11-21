<?php
header('Content-Type: application/json'); // Pastikan respons berupa JSON
include 'databaseconn.php'; // File koneksi database

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
} else {
    echo json_encode(['status' => 'error', 'message' => 'NPK tidak ditemukan.']);
}
?>
