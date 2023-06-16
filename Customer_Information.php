<?php
  
  include 'DbConnect/connection.php';
  include 'ProfilePictureOperation.php';
  include 'SidebarAdmin.php';
  include 'navbar.php';
  include 'SessionCheck.php';
    
      
      $userId = $_GET['userId'];
      $names = [];
      $sql = "SELECT * FROM `registered_user` WHERE Shop_Id = '$userId'";
      $result = mysqli_query($con, $sql);  
      $names = mysqli_fetch_array($result, MYSQLI_ASSOC); 
      $userEmail = $_SESSION['Email'];
      $userBrand = $_SESSION['Shop_Name'];


      $customers = [];
      $sql = "SELECT * FROM `customer_data` ORDER BY `id` DESC";
      $result = $con->query($sql);
      if($result){
        $customers = $result->fetch_all(MYSQLI_ASSOC);
        
      }
    $con->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Customer Information</title>
  <link href="css/style1.css" rel="stylesheet" />
  <link href="css/style2.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />

  <script data-search-pseudo-elements defer src="js/script1.js" crossorigin="anonymous"></script>
  <script src="js/script2.js" crossorigin="anonymous">
  </script>
</head>

<body class="nav-fixed">
  <!-- Navbar -->
  <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
    id="sidenavAccordion">
    <?php echo getNavbar(); ?>
  </nav>
  <!-- Navbar end -->

  <div id="layoutSidenav">
    <!--  sidebar -->
    <?php echo getSidebar("Customer_Information"); ?>
    <!--  sidebar end -->

    <div id="layoutSidenav_content">
      <main>
        <!-- Main page content-->
        <div class="container-fluid px-4 mt-5">
          <div class="card mb-4">
            <div class="card-header ps-3">
              <div style="width: 300px">
                <form class="d-flex" action="Customer_Information.php?userId=<?php echo $userId?>" method="post">
                  <input class="form-control me-2" placeholder="customer ID" type="text" aria-label="Search"
                    id="myInput" />
                  <button class="btn btn-outline-primary" type="submit">
                    Search
                  </button>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <!-- Billing history table-->
              <div class="table-responsive table-billing-history">
                <!-- Modal Section -->
                <section>
                  <!-- dlt modal -->
                  <div class="modal fade" id="DeleteButtonModal" tabindex="-1" role="dialog"
                    aria-labelledby="modalDelete" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header text-center">
                          <h4 class="modal-title w-100 font-weight-bold ml-5 text-danger">
                            Delete
                          </h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body mx-3">
                          <p class="text-center h4">
                            Are you sure to delete selected row?
                          </p>
                        </div>
                        <div class="modal-footer d-flex justify-content-center deleteButtonsWrapper">
                          <button type="button" class="btn btn-danger btnYesClass" id="btnYes" data-bs-dismiss="modal">
                            Yes
                          </button>
                          <button type="button" class="btn btn-primary btnNoClass" id="btnNo" data-bs-dismiss="modal"
                            aria-label="Close">
                            No
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th class="border-gray-200" scope="col">customer ID</th>
                      <th class="border-gray-200" scope="col">Date</th>
                      <th class="border-gray-200" scope="col">
                        customer Name
                      </th>
                      <th class="border-gray-200" scope="col">Paid</th>

                    </tr>
                  </thead>
                  <tbody id="myTable">
                    <?php

                        foreach($customers as $customer){
                         
                          echo '<tr>';
                          
                          echo '<td data-field="name">'.$customer['customerID'].'</td>';
                          echo '<td data-field="name">'.$customer['date'].'</td>';
                          echo '<td data-field="name">'.$customer['customerName'].'</td>';
                          echo '<td data-field="name">'.$customer['paidTk'].'</td>';
                         
                          echo '<tr>';
                        }
                    
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="footer-admin mt-auto footer-light">
        <div class="container-xl px-4">
          <div class="row">
            <div class="col-md-6 small">
              Copyright &copy; Your Website 2021
            </div>
            <div class="col-md-6 text-md-end small">
              <a href="#!">Privacy Policy</a>
              &middot;
              <a href="#!">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--Bootstrap JS -->
  <script src="js/script4.js"></script>
  <script src=" bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="bootstrap-5.1.3/dist/js/scripts.js"></script>

  <script src="js/script5.js" crossorigin="anonymous"></script>

  <script src="js/datatables/datatables-simple-demo.js"></script>

  <script src="js/script6.js" crossorigin="anonymous"></script>

  <script src="js/litepicker.js"></script>
</body>

</html>