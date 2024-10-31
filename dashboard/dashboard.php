<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../src/css/styles.min.css" />
    <link rel="stylesheet" href="../src/css/dashboard.css" />
    <link rel="stylesheet" href="../Header/styles.css" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
    </head>

  <body class="poppins-regular" style="height: 60rem;">
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar" style="background: linear-gradient(to bottom, #102742 0%, #0f67cf 100%); border-radius: 50px">
        <!-- Sidebar scroll-->
        <div style="padding-top: 1rem">
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img poppins-semibold">
              <img style="margin-left: 2.5rem" src="../src/image/icon Pabrik.png" alt="" width="140rem" />
              <p style="color: white; margin-left: 1.5rem; font-size: 0.9rem">PT Astra Daihatsu Motor Tbk</p>
              <p style="color: white; margin-left: 2.8rem; line-height: 0.1rem; font-size: 0.8rem">Casting Plant Karawang</p>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                <span class="hide-menu poppins-semibold" style="font-size: 13px; color: white">General</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link d-flex justify-content-center" href="dashboard.php" aria-expanded="false" style="background-color: #DEDEDE; border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
                  <div style="background-color: #0A2647; margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-item: center; border-radius: 10px">
                    <iconify-icon icon="hugeicons:home-04" style="color: white; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                    <span class="hide-menu" style="font-size: 16px; color: white">Dashboard</span>
                    <iconify-icon icon="oui:arrow-right" style="color: white; font-size: 20px; margin-left: 3.2rem; margin-right: -0.3rem"></iconify-icon>
                  </div>
                </a>
                <a class="sidebar-link d-flex justify-content-center" href="dashboard.php" aria-expanded="false" style="background-color: #DEDEDE; box-shadow: 0px 3px 3px 1px gray inset; border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
                  <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-item: center; border-radius: 10px">
                    <iconify-icon icon="ant-design:dashboard-outlined" style="color: #0A2647; font-size: 23px; margin-right: 0.7rem; transform: scaleX(-1);"></iconify-icon>
                    <span class="hide-menu poppins-regular" style="font-size: 16px; color: #0A2647">Low Pressure</span>
                    <iconify-icon icon="oui:arrow-right" style="color: #0A2647; font-size: 20px; margin-left: 2.3rem; margin-right: -0.3rem"></iconify-icon>
                  </div>
                </a>
                <a class="sidebar-link d-flex justify-content-center" href="dashboard.php" aria-expanded="false" style="background-color: #DEDEDE; box-shadow: 0px 3px 3px 1px gray inset; border-radius: 10px; padding: 0.4rem 0rem">
                  <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-item: center; border-radius: 10px">
                    <iconify-icon icon="ant-design:dashboard-outlined" style="color: #0A2647; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                    <span class="hide-menu poppins-regular" style="font-size: 16px; color: #0A2647">High Pressure</span>
                    <iconify-icon icon="oui:arrow-right" style="color: #0A2647; font-size: 20px; margin-left: 2rem; margin-right: -0.3rem"></iconify-icon>
                  </div>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                <span class="hide-menu poppins-semibold" style="font-size: 14px; color: white">Support</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link d-flex justify-content-center" href="dashboard.php" aria-expanded="false" style="background-color: #DEDEDE; box-shadow: 0px 3px 3px 1px gray inset; border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
                    <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-item: center; border-radius: 10px">
                      <iconify-icon icon="mynaui:question" style="color: #0A2647; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                      <span class="hide-menu poppins-regular" style="font-size: 16px; color: #0A2647">Help</span>
                      <iconify-icon icon="oui:arrow-right" style="color: #0A2647; font-size: 20px; margin-left: 6.5rem; margin-right: -0.3rem"></iconify-icon>
                    </div>
                </a>
                <a class="sidebar-link d-flex justify-content-center" href="dashboard.php" aria-expanded="false" style="background-color: #DEDEDE; box-shadow: 0px 3px 3px 1px gray inset; border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
                    <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-item: center; border-radius: 10px">
                      <iconify-icon icon="uil:setting" style="color: #0A2647; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                      <span class="hide-menu poppins-regular" style="font-size: 16px; color: #0A2647">Setting</span>
                      <iconify-icon icon="oui:arrow-right" style="color: #0A2647; font-size: 20px; margin-left: 5.3rem; margin-right: -0.3rem"></iconify-icon>
                    </div>
                </a>
                <a class="sidebar-link d-flex justify-content-center" href="dashboard.php" aria-expanded="false" style="background-color: #DEDEDE; box-shadow: 0px 3px 3px 1px gray inset; border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
                    <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-item: center; border-radius: 10px">
                      <iconify-icon icon="bx:log-out" style="color: #0A2647; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                      <span class="hide-menu poppins-regular" style="font-size: 16px; color: #0A2647">Exit</span>
                      <iconify-icon icon="oui:arrow-right" style="color: #0A2647; font-size: 20px; margin-left: 7rem; margin-right: -0.3rem"></iconify-icon>
                    </div>
                </a>
              </li>
            </ul>
            <img src="../src/image/Cuplikan_layar_2024-10-18_142420-removebg-preview 1.png" alt="" style="width: 15rem; margin-top: 1rem">
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>

      <!-- navbar -->
      <div class="body-wrapper">
        <div class="header fixed-top" style="margin-left: 17rem; border: none">
          <div class="welcome-message">
            Welcome Back, <span>Edward</span>
            <p>Here are your daily updates.</p>
          </div>
          <div class="search-bar">
            <span class="material-icons icon"><iconify-icon icon="icon-park-outline:search"></iconify-icon></span>
            <input style="border-radius: 10px; border: none; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);" type="text" placeholder="Search" />
          </div>
          <div class="notification">
            <button type="button" class="notifButton" style="box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);">
              <span><i class="bi bi-bell"></i></span>
            </button>
          </div>
          <div class="profile" style="margin-left: 8rem">
            <div class="row">
              <div class="col-3">
                <button style="background-color: white; border: none"><i class="bi bi-person-circle"></i></button>
              </div>
              <div class="col-9" style="font-size: 12px; padding-top: 0.8rem; padding-left: 1.5rem">
                <span>Edward Lore</span> <br />
                <span>Admin</span>
              </div>
            </div>
          </div>
          <div>
            <img style="height: 2.5rem; width: auto; margin-left: 3rem" src="../src/image/logo ADM.png" alt="" />
          </div>
        </div>
      </div>
    </div>

    <!-- konten -->
    <div class="d-flex justify-content-end align-item-start" style="margin-top: 4rem">
      <div style="padding: 1rem 1rem;">
        <button class="btn dropdown-toggle poppins-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #0555b3; border-color: black; color: white; border-radius: 7px; border-width: 2px; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);">11 - 17 Sept 2024</button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
      <div style="margin-left: -1.5rem; padding: 1rem 1rem;">
        <button class="btn dropdown-toggle poppins-semibold" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #0555b3; border-color: black; color: white; border-radius: 7px; border-width: 2px; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);">11 - 17 Sept 2024</button>
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
        <h5 class="card-title poppins-semibold" style="color: white">Production Report</h5>
        <hr style="background-color: white; opacity: 100%; height: 1.5px" />
        <div class="row">
          <div class="col d-flex justify-content-center">
            <?php
              include "mesin01.php";
            ?>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-9">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #0555b3; color: white; border-radius: 4px; width: 11rem">11 - 17 Sept 2024</button>
            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; color: white; border-radius: 4px; border-color: #0555b3; width: 11rem">
              <i class="bi bi-file-pdf me-2"></i>Export Report
            </button>
          </div>
          <div class="col d-flex justify-content-end">
            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; color: white; border-radius: 4px; border-color: #0555b3; width: 11rem">
              Low Pressure
            </button>
          </div>
        </div>
      </div>
    </div>
                                
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
