<?php 
    session_start(); // Memulai session

    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['npk'])) {
        // Redirect ke halaman ../index.php dengan pesan error
        header("Location: ../index.php?error=Silakan login terlebih dahulu.");
        exit();
    }

    include 'sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../src/css/styles.min.css" />
    <link rel="stylesheet" href="../src/css/dashboard.css" />
    <link rel="stylesheet" href="../Header/styles.css" />
    <link rel="stylesheet" href="../src/css/addUsers.css" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../backend/manageUser.js"></script>
  </head>

  <body class="poppins-regular" style="height: 60rem;">
    <h1 style="margin-top: 7rem; margin-left: 18rem;">Tambah Akun</h1>
    <div class="card Display">
        <div class="card-body">
            <form method="POST" action="../backend/addUsers.php">
                <div class="row">
                    <div class="col-6">
                        <label for="fname">Nama depan</label><br>
                        <input type="text" id="fname" name="fname"><br>
                    </div>
                    <div class="col-6">
                        <label for="lname">Nama belakang</label><br>
                        <input type="text" id="lname" name="lname"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="npk">NPK</label><br>
                        <input type="text" id="npk" name="npk"><br>
                    </div>
                    <div class="col-4">
                        <label for="position">Posisi</label><br>
                        <input type="text" id="position" name="position"><br>
                    </div>
                    <div class="col-4">
                        <label for="no_telp">No. Telp</label><br>
                        <input type="text" id="no_telp" name="no_telp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="email">Email</label><br>
                        <input type="text" id="email" name="email"><br>
                    </div>
                    <div class="col-6" style="display: none">
                        <label for="password">Password</label><br>
                        <input type="text" id="password" name="password" value="admin123"><br>
                    </div>
                    <div class="col-6">
                        <label for="no_telp">Admin</label><br>
                        <select style="height: 37px; border-radius: 10px; border: 1px solid #ccc;" id="admin" name="admin" class="form-select">
                                <option value="Ya">Ya</option>
                                <option value="Bukan">Bukan</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="alamat">Alamat</label><br>
                        <input type="text" id="alamat" name="alamat">
                    </div>
                </div>
                <div class="row">

                </div>
                <button type="submit" class="addbutton">Buat Akun</button>
            </form>
        </div>
    </div>
      
    <script src="../backend/manageUser_delete.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
