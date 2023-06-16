<?php

    include 'DbConnect/connection.php';
    include 'ProfilePictureOperation.php';


    function getNavbar(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $navbar ='    
        <!-- Sidenav Toggle Button-->
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle">
          <i data-feather="menu"></i>
        </button>
        <!-- Navbar Brand-->
        <p class="navbar-brand pe-3 ps-4 ps-lg-2">'.$_SESSION['Shop_Name'].'</p>
        <!-- Navbar Items-->
        
        <script>
              function profilePictureHelper(event) {
        
                var file = document.getElementById("image");
                if (file != null) {
                  var image = document.getElementById("profile_picture");
                  image.src = URL.createObjectURL(event.target.files[0]);
        
                  var save = document.getElementById("save");
                  save.style.display = "block";
                }
              }
        </script>
        <ul class="navbar-nav align-items-center ms-auto">
          <!-- User Dropdown-->
          <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);"
              role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="img/profile_picture/' . ($_SESSION['profile_picture'] ?? "default.png" ) . '" alt="Profile" class="rounded-circle outer" id="profile_picture">
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
              aria-labelledby="navbarDropdownUserImage">
        
              <style>
              .container {
                width: 50%;
        
                display: block;
                margin: 0 auto;
                margin-bottom: 32pt;
                margin-top: 16pt;
              }
        
              .outer {
                width: 1100% !important;
                height: 100% !important;
                max-width: 100px !important;
                /* any size */
                max-height: 100px !important;
                /* any size */
                margin: auto;
                background-color: #FFFFFF;
                border-radius: 100%;
                position: relative;
              }
        
              .inner {
                background-color: #FFFFFF;
                width: 32px;
                height: 32px;
                border-radius: 100%;
                position: absolute;
                bottom: 0;
                right: 0;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
              }
        
              .inner:hover {
                background-color: #e3e3e3;
        
              }
        
              .inputfile {
                overflow: hidden;
                position: absolute;
                z-index: 1;
                width: 32px;
                height: 32px;
                padding-left: 32px;
                cursor: pointer;
              }
        
              .inputfile+label {
                font-size: 1.25rem;
                text-overflow: ellipsis;
                white-space: nowrap;
                display: inline-block;
                overflow: hidden;
                width: 32px;
                height: 32px;
                line-height: 32px;
                text-align: center;
              }
        
              .inputfile+label svg {
                fill: #fff;
        
              }
              </style>

              <form action="Dashboard.php" method="post" enctype="multipart/form-data">
                <h6 class="dropdown-header d-flex align-items-center">
        
                  <div class="outer">
                
                      <img src="img/profile_picture/' . ($_SESSION['profile_picture'] ?? 'default.png') . '" alt="Profile" class="rounded-circle outer" id="profile_picture">
        
                    <div class="inner">
                      <input class="inputfile" type="file" name="image" accept="image/*" id="image"
                        onchange="profilePictureHelper(event)">
                      <label><a href="#"><i><img src="img/edit.png"></i></a></label>
                    </div>
                  </div>
                  <div class="dropdown-user-details">
                    <div class="dropdown-user-details-name">'.$_SESSION['Shop_Name'].'</div>
                     <div class="dropdown-user-details-email mt-1">'.$_SESSION['Email'].'</div>
                     
                     <div id="save" style="display: none;">
                      <button type="submit" class="btn btn-primary mt-4 ms-2" style="max-height:8px;"
                      name="profile_picture_save" id="profile_picture_save">Save</button>
                     </div>
                 
                  </div>
        
                </h6>
              </form>
              <div class="dropdown-divider"></div>
        
              <a class="dropdown-item" href="LogOutAction.php">
                <div class="dropdown-item-icon">
                  <i data-feather="log-out"></i>
                </div>
                Logout
              </a>
            </div>
          </li>
        </ul>';

        return $navbar;
}

?>