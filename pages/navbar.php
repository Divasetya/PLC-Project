
      <!-- navbar -->
      <div class="body-wrapper">
        <div class="header fixed-top" style="margin-left: 17rem; border: none;">

          <div class="welcome-message">
              Welcome Back, <span><?php echo htmlspecialchars($_SESSION['fname'] ?? 'Guest'); ?></span>
              <p>Here are your daily updates.</p>
          </div>

          <!-- <div class="search-bar">
            <span class="material-icons icon"><iconify-icon icon="icon-park-outline:search"></iconify-icon></span>
            <input style="border-radius: 10px; border: none; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.3);" type="text" placeholder="Search" />
          </div> -->
          <div class="notification">
            <button type="button" class="notifButton">
              <span><i class="bi bi-bell"></i></span>
            </button>
          </div>
          <div class="profile">
            <div class="row">
              <div class="col-2 d-flex align-items-center">
                <button style="background-color: transparent; border: none;"><i class="bi bi-person-circle"></i></button>
              </div>
              <div class="col-9" style="font-size: 12px; padding-top: 3px; padding-left: 1.5rem">
                <span><?php echo htmlspecialchars($_SESSION['fname'] ?? 'Guest'); ?> <?php echo htmlspecialchars($_SESSION['lname'] ?? 'Guest'); ?></span> <br />
                <span><?php echo htmlspecialchars($_SESSION['posisi'] ?? 'Guest'); ?></span>
              </div>
            </div>
          </div>
          <!-- <div>
            <img style="height: 2.5rem; width: auto; margin-left: 10px" src="../src/image/logo ADM.png" alt="" />
          </div> -->
        </div>
      </div>
    </div>