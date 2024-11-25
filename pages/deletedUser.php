<?php 
    session_start(); // Memulai session

    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['npk'])) {
        // Redirect ke halaman ../index.php dengan pesan error
        header("Location: ../index.php?error=Silakan login terlebih dahulu.");
        exit();
    }

    include 'sidebar.php';
    include '../backend/deletedUser.php'; // Include model untuk deleted user

    // Ambil data user non-aktif
    $result = getDeletedUsers();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Deleted Users</title>
    <link rel="stylesheet" href="../src/css/styles.min.css" />
    <link rel="stylesheet" href="../src/css/dashboard.css" />
    <link rel="stylesheet" href="../Header/styles.css" />
    <link rel="stylesheet" href="../src/css/deletedUser.css" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

  <body class="poppins-regular" style="height: 60rem;">
    <h1 style="margin-top: 7rem; margin-left: 18rem;">Deleted User</h1>
    <div class="card Display">
        <div class="card-body">
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NPK</th>
                            <th>Posisi</th>
                            <th>Email</th>
                            <th>Nomor Telpon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="user-table">
                        <?php
                            if ($result->num_rows > 0) {
                                $no = 1; // Nomor urut
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$no}</td>
                                            <td>{$row['nama']}</td>
                                            <td>{$row['npk']}</td>
                                            <td>{$row['posisi']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['no_telp']}</td>
                                            <td>
                                                <button class='restore-btn' data-npk='{$row['npk']}'>Pulihkan</button>
                                            </td>
                                        </tr>";
                                    $no++;
                                }
                            } else {
                                echo "<tr><td colspan='7'>Tidak ada data ditemukan.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
    
    <script src="../backend/deletedUser_restore.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
