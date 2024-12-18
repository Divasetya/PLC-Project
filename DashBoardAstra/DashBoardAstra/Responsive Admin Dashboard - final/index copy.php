<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="../Header/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container-fluid ps-0 ms-0">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon" style="margin-right: 0px;">
                            <img src="../Responsive Admin Dashboard - final/assets/imgs/logoTemp.png" alt="Logo" style="width: 28px; height: 38px; margin-right: 0rem; margin-top: 25px;">


                        </span>
                        <span class="title" style="font-family: 'Pacifico', cursive;
                            font-size: 22px;
                            color: rgb(250, 250, 250);
                            padding-top: 15px;    
                            padding-bottom: 10px;
                            padding-left: -20px;   
                            padding-right: 20px;  
                            display: inline-block; ">TempWatch</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <iconify-icon icon="hugeicons:home-04" style="font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <iconify-icon icon="ant-design:dashboard-outlined" style="font-size: 23px; margin-right: 0.7rem; transform: scaleX(-1);"></iconify-icon>
                        </span>
                        <span class="title">Low Pressure</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <iconify-icon icon="ant-design:dashboard-outlined" style="font-size: 23px; margin-right: 0.7rem;"></ion-icon>
                        </span>
                        <span class="title">High Pressure</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-circle-outline" style="font-size: 23px; margin-right: 0.7rem;"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <iconify-icon icon="uil:setting" style="font-size: 23px; margin-right: 0.7rem;"></iconify-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Exit</span>
                    </a>
                </li>

            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="welcome-message">
                    Welcome Back, <span>Edward</span>
                    <p>Here are your daily updates.</p>
                  </div>

                <div class="search">
                    <label>
                      <input type="text" placeholder="Search here" />
                      <ion-icon name="search-outline"></ion-icon>
                    </label>
                  </div>

                  <div class="notification">
                    <button type="button" class="notifButton" style="box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);">
                      <span><i class="bi bi-bell"></i></span>
                    </button>
                  </div>

                  <div class="user">
                    <div class="user-info" id="userInfo">
                        <button style="background-color: white; border: none" onclick="toggleDropdown()">
                            <i class="bi bi-person-circle" style="font-size: 2rem;   cursor: pointer;"></i>
                        </button>
                        <div class="user-details">
                            <span>Edward Lore</span><br />
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <div class="dropdown-header" style="display: flex; align-items: center;">
                            <img src="../Responsive Admin Dashboard - final/assets/imgs/Profilpoto.png" 
                                 class="employee-photo" 
                                 style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; padding: 0 5px;" />
                            <span class="employee-name" style="margin-left: 10px;">Edward Lore</span>
                        </div>                        
                        <a href="#" class="dropdown-item">
                            <img src="../Responsive Admin Dashboard - final/assets/imgs/profile.png" style="width: 25px; margin-left: 10px;" alt="Settings" class="dropdown-icon"  />
                            <span style="margin-left: 20px;">Edit Profile</span></a>
                        <a href="#" class="dropdown-item">
                            <img src="../Responsive Admin Dashboard - final/assets/imgs/setting.png" style="width: 25px; margin-left: 10px;" alt="Settings" class="dropdown-icon" />
                            <span style="margin-left: 20px;">Settings</span></a>
                        </a>
                        <a href="#" class="dropdown-item">
                            <img src="../Responsive Admin Dashboard - final/assets/imgs/help.png" style="width: 25px; margin-left: 10px;" alt="Settings" class="dropdown-icon" />
                            <span style="margin-left: 20px;">Help</span></a>
                        </a>
                        <a href="#" class="dropdown-item"><img src="../Responsive Admin Dashboard - final/assets/imgs/logout.png" style="width: 25px; margin-left: 10px;" alt="Settings" class="dropdown-icon" />
                            <span style="margin-left: 20px;">Logout</span></a>
                        </a>
                    </div>
                    
                </div>
                  <div>
                    <img style="height: 2.5rem; width: auto; margin-left: 1px" src="../Responsive Admin Dashboard - final/assets/imgs/logo ADM.png" />
                  </div>
                </div>
                <div class="details">
                    <div class="recentOrders">
                    
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>