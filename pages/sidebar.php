<?php
include 'navbar.php';



// Deteksi halaman aktif berdasarkan URL
$current_page = basename($_SERVER['PHP_SELF']); 
?>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <!-- Sidebar Start -->
  <aside class="left-sidebar" style="background: linear-gradient(to bottom, #102742 0%, #0f67cf 100%);">
    <div style="padding-top: 1rem">
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img poppins-semibold">
          <img style="margin-left: 2.5rem" src="../src/image/icon Pabrik.png" alt="" width="140rem" />
          <p style="color: white; margin-left: 1.5rem; font-size: 0.9rem">PT Astra Daihatsu Motor Tbk</p>
          <p style="color: white; margin-left: 2.8rem; line-height: 0.1rem; font-size: 0.8rem">Casting Plant Karawang</p>
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse"><i class="ti ti-x fs-8"></i></div>
      </div>
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu poppins-semibold" style="font-size: 13px; color: white">General</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link d-flex justify-content-center" href="./dashboard.php" aria-expanded="false" style="background-color: #DEDEDE; <?php echo $current_page == 'dashboard.php' ? '' : 'box-shadow: 0px 3px 3px 1px gray inset;'; ?> border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
              <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-items: center; border-radius: 10px; background-color: <?php echo $current_page == 'dashboard.php' ? '#0A2647' : 'transparent'; ?>;">
                <iconify-icon icon="hugeicons:home-04" style="color: <?php echo $current_page == 'dashboard.php' ? 'white' : '#0A2647'; ?>; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                <span class="hide-menu" style="font-size: 16px; color: <?php echo $current_page == 'dashboard.php' ? 'white' : '#0A2647'; ?>;">Dashboard</span>
                <iconify-icon icon="oui:arrow-right" style="color: <?php echo $current_page == 'dashboard.php' ? 'white' : '#0A2647'; ?>; font-size: 20px; margin-left: 3.2rem; margin-right: -0.3rem;"></iconify-icon>
              </div>
            </a>
            <a class="sidebar-link d-flex justify-content-center" href="lowPressure.php" aria-expanded="false" style="background-color: #DEDEDE; <?php echo $current_page == 'lowPressure.php' ? '' : 'box-shadow: 0px 3px 3px 1px gray inset;'; ?> border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
              <div style="background-color: <?php echo $current_page == 'lowPressure.php' ? '#0A2647' : 'transparent'; ?>; margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-items: center; border-radius: 10px;">
                <iconify-icon icon="ant-design:dashboard-outlined" style="color: <?php echo $current_page == 'lowPressure.php' ? 'white' : '#0A2647'; ?>; font-size: 23px; margin-right: 0.7rem; transform: scaleX(-1);"></iconify-icon>
                <span class="hide-menu poppins-regular" style="font-size: 16px; color: <?php echo $current_page == 'lowPressure.php' ? 'white' : '#0A2647'; ?>;">Low Pressure</span>
                <iconify-icon icon="oui:arrow-right" style="color: <?php echo $current_page == 'lowPressure.php' ? 'white' : '#0A2647'; ?>; font-size: 20px; margin-left: 2.3rem; margin-right: -0.3rem;"></iconify-icon>
              </div>
            </a>
            <a class="sidebar-link d-flex justify-content-center" href="highPressure.php" aria-expanded="false" style="background-color: #DEDEDE; <?php echo $current_page == 'highPressure.php' ? '' : 'box-shadow: 0px 3px 3px 1px gray inset;'; ?> border-radius: 10px; padding: 0.4rem 0rem;">
              <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-items: center; border-radius: 10px; background-color: <?php echo $current_page == 'highPressure.php' ? '#0A2647' : 'transparent'; ?>;">
                <iconify-icon icon="ant-design:dashboard-outlined" style="color: <?php echo $current_page == 'highPressure.php' ? 'white' : '#0A2647'; ?>; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                <span class="hide-menu poppins-regular" style="font-size: 16px; color: <?php echo $current_page == 'highPressure.php' ? 'white' : '#0A2647'; ?>;">High Pressure</span>
                <iconify-icon icon="oui:arrow-right" style="color: <?php echo $current_page == 'highPressure.php' ? 'white' : '#0A2647'; ?>; font-size: 20px; margin-left: 2rem; margin-right: -0.3rem;"></iconify-icon>
              </div>
            </a>
          </li>
          <?php if (isset($_SESSION['admin']) && in_array('1', (array)$_SESSION['admin'])) { ?>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu poppins-semibold" style="font-size: 14px; color: white">Admin</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link d-flex justify-content-center" href="manageUser.php" aria-expanded="false" style="background-color: #DEDEDE; <?php echo $current_page == 'manageUser.php' ? '' : 'box-shadow: 0px 3px 3px 1px gray inset;'; ?> border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
                <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-items: center; border-radius: 10px; background-color: <?php echo $current_page == 'manageUser.php' ? '#0A2647' : 'transparent'; ?>;">
                    <iconify-icon icon="heroicons:user-group-solid" style="color: <?php echo $current_page == 'manageUser.php' ? 'white' : '#0A2647'; ?>; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                    <span class="hide-menu poppins-regular" style="font-size: 16px; color: <?php echo $current_page == 'manageUser.php' ? 'white' : '#0A2647'; ?>;">Manage Users</span>
                    <iconify-icon icon="oui:arrow-right" style="color: <?php echo $current_page == 'manageUser.php' ? 'white' : '#0A2647'; ?>; font-size: 20px; margin-left: 1.7rem; margin-right: -0.3rem;"></iconify-icon>
                </div>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link d-flex justify-content-center" href="deletedUser.php" aria-expanded="false" style="background-color: #DEDEDE; <?php echo $current_page == 'deletedUser.php' ? '' : 'box-shadow: 0px 3px 3px 1px gray inset;'; ?> border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
                <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-items: center; border-radius: 10px; background-color: <?php echo $current_page == 'deletedUser.php' ? '#0A2647' : 'transparent'; ?>;">
                    <iconify-icon icon="mdi:user-block" style="color: <?php echo $current_page == 'deletedUser.php' ? 'white' : '#0A2647'; ?>; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                    <span class="hide-menu poppins-regular" style="font-size: 16px; color: <?php echo $current_page == 'deletedUser.php' ? 'white' : '#0A2647'; ?>;">Deleted User</span>
                    <iconify-icon icon="oui:arrow-right" style="color: <?php echo $current_page == 'deletedUser.php' ? 'white' : '#0A2647'; ?>; font-size: 20px; margin-left: 2.2rem; margin-right: -0.3rem;"></iconify-icon>
                </div>
            </a>
          </li>
          <?php } ?>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
            <span class="hide-menu poppins-semibold" style="font-size: 14px; color: white">Support</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link d-flex justify-content-center" href="help.php" aria-expanded="false" style="background-color: #DEDEDE; <?php echo $current_page == 'help.php' ? '' : 'box-shadow: 0px 3px 3px 1px gray inset;'; ?> border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
              <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-items: center; border-radius: 10px; background-color: <?php echo $current_page == 'help.php' ? '#0A2647' : 'transparent'; ?>;">
                <iconify-icon icon="mynaui:question" style="color: <?php echo $current_page == 'help.php' ? 'white' : '#0A2647'; ?>; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                <span class="hide-menu poppins-regular" style="font-size: 16px; color: <?php echo $current_page == 'help.php' ? 'white' : '#0A2647'; ?>;">Help</span>
                <iconify-icon icon="oui:arrow-right" style="color: <?php echo $current_page == 'help.php' ? 'white' : '#0A2647'; ?>; font-size: 20px; margin-left: 6.5rem; margin-right: -0.3rem;"></iconify-icon>
              </div>
            </a>
            <a class="sidebar-link d-flex justify-content-center" href="setting.php" aria-expanded="false" style="background-color: #DEDEDE; <?php echo $current_page == 'setting.php' ? '' : 'box-shadow: 0px 3px 3px 1px gray inset;'; ?> border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
              <div style="margin: 0rem; padding: 0.2rem 0.5rem; display: flex; align-items: center; border-radius: 10px; background-color: <?php echo $current_page == 'setting.php' ? '#0A2647' : 'transparent'; ?>;">
                <iconify-icon icon="uil:setting" style="color: <?php echo $current_page == 'setting.php' ? 'white' : '#0A2647'; ?>; font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                <span class="hide-menu poppins-regular" style="font-size: 16px; color: <?php echo $current_page == 'setting.php' ? 'white' : '#0A2647'; ?>;">Setting</span>
                <iconify-icon icon="oui:arrow-right" style="color: <?php echo $current_page == 'setting.php' ? 'white' : '#0A2647'; ?>; font-size: 20px; margin-left: 5.3rem; margin-right: -0.3rem;"></iconify-icon>
              </div>
            </a>
            <a class="sidebar-link d-flex justify-content-center" href="../logout.php" aria-expanded="false" style="background-color: #DEDEDE; box-shadow: 0px 3px 3px 1px gray inset; border-radius: 10px; padding: 0.4rem 0rem; margin-bottom: 0.5rem;">
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
    </div>
  </aside>
</div>
