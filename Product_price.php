<?php
    
    include 'DbConnect/connection.php';
    include 'ProfilePictureOperation.php';
    include 'SidebarAdmin.php';
    include 'navbar.php';
    include 'SessionCheck.php';
    $insert = false;
   

    
    $tests = [];
    $sql = "SELECT * FROM `price_table` ORDER BY `id` DESC";
    $result = $con->query($sql);
    if($result){
      $tests = $result->fetch_all(MYSQLI_ASSOC);
    }

   
    if(isset($_POST['productName'])){
    
      $productName = $_POST['productName'];
      $productPrice = $_POST['productPrice'];
      
      if(empty($productName) || empty($productPrice))
      {
        
      }
      else{
        $sql = "INSERT INTO `price_table` (`product_name`,`price`)
        VALUES ('$productName','$productPrice');";
      }

      if($con->query($sql)== true){
        $insert = true;
        header("Refresh:0");
      }
      
    }
    
    
    $userId = $_GET['userId'];
    $names = [];
    $sql = "SELECT * FROM `registered_user` WHERE Shop_Id = '$userId'";
    $result = mysqli_query($con, $sql);  
    $names = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    $userEmail = $_SESSION['Email'];
    $userBrand = $_SESSION['Shop_Name'];
    
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
  <title>Product Price</title>
  <link href="css/style1.css" rel="stylesheet" />
  <link href="css/style2.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />

  <script data-search-pseudo-elements defer src="js/script1.js" crossorigin="anonymous"></script>
  <script src="js/script2.js" crossorigin="anonymous">
  </script>
</head>

<!-- Main body -->

<body class="nav-fixed">

  <!-- Navbar -->
  <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
    id="sidenavAccordion">
    <?php echo getNavbar(); ?>
  </nav>
  <!-- Navbar end -->

  <div id="layoutSidenav">
    <!--  sidebar -->
    <?php echo getSidebar("Product_price"); ?>
    <!--  sidebar end -->


    <!-- Minhaj Dashbord -->
    <div id="layoutSidenav_content">
      <main>
        <main>
          <!-- Main page content-->
          <div class="container-xl px-4 mt-4">
            <!-- Price-->
            <div class="card">
              <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                <div class="row justify-content-between align-items-center">
                  <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-start">
                    <!-- Price branding-->
                    <img class="rounded-circle mb-4 h-25 w-25" src="img/file.png" alt="" />
                    <div class="h2 text-white mb-0">Price List</div>
                  </div>
                </div>
              </div>

              <div class="card-body p-4 p-md-5 row justify-content-center">
                <!-- Price table-->
                <div style="width: 75%">
                  <div class="dataTable-top pb-2">
                    <div>
                      <!-- Add Modal end  -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title w-100 font-weight-bold text-primary" id="exampleModalLabel">
                                Add product & Price
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="Product_price.php?userId=<?php echo $userId ?>" method="post">
                                <div class="row gx-3 mb-3">
                                  <!-- Form Group (first name)-->
                                  <div class="col-md-6">
                                    <label class="small mb-1" for="productName">product Name</label>
                                    <input class="form-control" name="productName" id="productName" type="text" />
                                  </div>
                                  <!-- Form Group (last name)-->
                                  <div class="col-md-6">
                                    <label class="small mb-1" for="productPrice">Rate</label>
                                    <input class="form-control" name="productPrice" id="productPrice" type="text" />
                                  </div>
                                </div>

                                <button class="btn btn-outline-primary btn-block buttonAdd" data-bs-dismiss="modal">
                                  Add form
                                  <i class="fas fa-paper-plane-o ml-1"></i>
                                </button>

                              </form>
                            </div>

                          </div>
                        </div>
                      </div>
                      <!-- Add Modal end  -->

                      <!-- Add Button -->
                      <a href="" class="btn btn-blue btn-rounded btn-sm me-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add<i
                          class="fas fa-plus-square ms-1"></i></a>
                      <!-- Add Button end-->


                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table id="datatablesSimple">
                        <thead>
                          <tr>
                            <th>product Name</th>
                            <th>Rate</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              foreach($tests as $test){
                                echo '<tr>';
                                echo '<td data-field="name">'.$test['product_name'].'</td>';
                                echo '<td data-field="name">'.$test['price'].'</td>';
                               
                                echo '<td>
                                        <a class="btn btn-datatable btn-sm"  href="Delete/delete3.php?id='.$test['id'].'&userId='.$userId.'"  title="Delete" >
                                        <i class="fa-solid fa-trash-can ms-3" style="font-size: 15px;"></i>
                                        <i class="fas fa-paper-plane-o ms-1" style="font-size: 15px;"></i>
                                        </a>
                                        
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark ms-3" 
                                href="updatePrice.php?id='.$test['id'].'&userId='.$userId.'"><i data-feather="edit"></i></a>
                                   
                                      </td>';
                                echo '</tr>';
                             
                              }
                          ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                  <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <!-- Invoice - sent to info-->

                    <!-- <div class="h6 mb-1">Company Name</div>
                    <div class="small">1234 Company Dr.</div>
                    <div class="small">Yorktown, MA 39201</div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </main>
      <footer class="footer-admin mt-auto footer-light">
        <div class="container-xl px-4">
          <div class="row">
            <div class="col-md-6 small">
              Copyright &copy;yourwebsite@gmail.com
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--Bootstrap JS -->
  <!-- javascript for dropdown -->
  <script src="bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <script src="bootstrap-5.1.3/dist/js/scripts.js"></script>

  <script src="js/script5.js" crossorigin="anonymous"></script>

  <script src="js/datatables/datatables-simple-demo.js"></script>

  <script src="js/script6.js" crossorigin="anonymous"></script>

  <script src="js/litepicker.js"></script>





</body>

</html>