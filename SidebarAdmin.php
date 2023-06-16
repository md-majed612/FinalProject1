<?php

include 'ProfilePictureOperation.php';

function getSidebar($item){
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }

  $GLOBALS['dashboard']="";
  $GLOBALS['Purchase']="";
  $GLOBALS['Customer_Information']="";
  $GLOBALS['Product_price']="";

  $GLOBALS[$item]="active";


  
  $sidebar = ' 
  <div id="layoutSidenav_nav">
  <nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
      <div class="nav accordion" id="accordionSidenav">
        <!-- Sidenav Menu Heading (Core)-->
        <div class="sidenav-menu-heading">Core</div>
        <!-- Sidenav Accordion (Dashboard)-->

        <!-- Dasboard start -->
     
                <a class="nav-link '.$GLOBALS['dashboard'].'" href="Dashboard.php?userId='.$_SESSION['Shop_Id'].'">
                  <div class=" nav-link-icon"><i data-feather="activity"></i></div>
                  Dashboards
                </a>
       
        <!-- Dasboard end -->

        <!-- Purchase start -->

                <a class="nav-link '.$GLOBALS['Purchase'].'" href="Purchase.php?userId='.$_SESSION['Shop_Id'].'">
                  <div class="nav-link-icon"><i data-feather="shopping-cart" style="font-size: 15px"></i></div>
                  Purchase
                </a>
    
        <!-- Purchase end -->

         <!-- Customer Information start -->

                <a class="nav-link '.$GLOBALS['Customer_Information'].'" href="Customer_Information.php?userId='.$_SESSION['Shop_Id'].'">
                  <div class="nav-link-icon">
                    <i class="fa fa-search" aria-hidden="true" style="font-size: 15px"></i>
                  </div>
                  Customer Information
                </a> 

          <!-- Customer Information end -->
       
          <!-- Product Price start -->

                <a class="nav-link '.$GLOBALS['Product_price'].'" href="Product_price.php?userId='.$_SESSION['Shop_Id'].'">
                  <div class="nav-link-icon">
                    <i class="fa fa-list" aria-hidden="true"></i>
                  </div>
                  Product Price
                </a>  
        
          <!-- Product Price end -->
</div>
</div>

<!-- Sidenav Footer-->
<div class="sidenav-footer">
  <div class="sidenav-footer-content">
    <div class="sidenav-footer-subtitle">Logged in as:</div>
     <div class="sidenav-footer-title">'.$_SESSION['Email'].'</div> 
  </div>
</div>
</nav>
</div>';
return $sidebar;

}