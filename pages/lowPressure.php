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
    <link rel="stylesheet" href="../src/css/lowPressure.css" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
  </head>

  <body class="poppins-regular" style="height: 60rem;">

    <!-- konten -->
    <div class="d-flex justify-content-end align-item-start" style="margin-top: 4rem">
      <div style="padding: 1rem 1rem;">
        <button class="btn dropdown-toggle poppins-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #0555b3; border-color: black; color: white; border-radius: 7px; border-width: 2px; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);">Tanggal</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
      <div style="margin-left: -1.5rem; padding: 1rem 1rem;">
        <button class="btn dropdown-toggle poppins-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #0555b3; border-color: black; color: white; border-radius: 7px; border-width: 2px; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);">Shift</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </div>
    
    <div class="d-flex" style="margin-left: 17rem; padding: 0rem 1rem; margin-top: -1rem">
      <p class="poppins-semibold" style="color: black; font-weight: 600; font-size: 18px; margin-right: 9px">Low Pressure Gedung B</p>
      <p class="poppins-regular" style="color: black; font-size: 18px">17 September 2024</p>
    </div>

    

    <div class="card" style="margin-left: 18rem; width: 75.8rem; background-color: #00336d; border-radius: 50px">
      <div class="card-body">
        <!-- tabel abnormality -->
        <?php include "lowPressure_abnormalityTable.php"; ?>

        <!-- production report -->
        <h5 class="card-title poppins-semibold" style="color: white">Production Report</h5>
        <hr style="background-color: white; opacity: 100%; height: 1.5px" />
        <div class="row">
          <div class="col d-flex justify-content-between">
            <?php include "grafikLowPress/grafik1.php" ?>
            <?php include "grafikLowPress/grafik2.php" ?>
            <!-- <div style="width: 50%; height: 18rem; background-color: white; border-radius: 30px; padding: 0rem 1.8rem;">
              tempat untuk menampilkan node-red
            </div> -->
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-between">
            <?php include "grafikLowPress/grafik3.php" ?>
            <?php include "grafikLowPress/grafik4.php" ?>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-between">
            <?php include "grafikLowPress/grafik5.php" ?>
          </div>
        </div>
      </div>
    </div>
                                
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
