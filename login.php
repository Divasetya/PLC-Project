<?php
session_start();

// Konfigurasi koneksi ke database
$host = "localhost"; // atau IP database server
$dbname = "dummydatasensor"; // Ganti dengan nama database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda

try {
    // Buat koneksi ke database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npk = $_POST['NPK'];
    $password_input = $_POST['password'];

    // Validasi input
    if (!empty($npk) && !empty($password_input)) {
        try {
            // Hash password input dengan SHA256
            $password_hashed = hash('sha256', $password_input);

            // Query untuk mendapatkan data user berdasarkan NPK
            $stmt = $conn->prepare("SELECT * FROM user WHERE npk = :npk AND is_active = 1");
            $stmt->bindParam(':npk', $npk, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Cek apakah pengguna ditemukan dan password cocok
            if ($user && $password_hashed === $user['password']) {
                // Simpan data pengguna ke sesi
                $_SESSION['npk'] = $user['npk'];
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['posisi'] = $user['posisi'];
                $_SESSION['admin'] = $user['admin'];

                // Redirect ke halaman dashboard
                header("Location: pages/dashboard.php");
                exit();
            } else {
                // Redirect kembali ke form login dengan pesan error
                header("Location: index.php?error=NPK atau password salah.");
                exit();
            }
        } catch (Exception $e) {
            // Redirect dengan error jika ada kesalahan pada server
            header("Location: index.php?error=Terjadi kesalahan server.");
            exit();
        }
    } else {
        // Redirect dengan error jika input kosong
        header("Location: index.php?error=NPK dan password wajib diisi.");
        exit();
    }
}
?>
