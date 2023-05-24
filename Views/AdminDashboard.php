
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            UVotingSystem
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./AdminDashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">What do you want to do ?</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./addElection.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Add Election</span>
              </a>
            </li>
            
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
             
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    
                    <a href="authentication-login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
      <style>
            .election{
                border: 1px solid whitesmoke;
                padding: 5px;
                border-radius: 10px;
                margin-bottom: 4%;
                        
            }
            .election span {
                color: lightslategray;
            }
            #El{
                color:lightgreen
            }
            .bor{
                border: hidden;
                margin-left: 36%;
                padding: 3%;
                padding-left: 6%;
                padding-right: 6%;
                margin-top: 6%;
                padding-bottom: 4.3%;
            }
            
                    
                </style>
        <!--  Row 1 -->
        
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body pt-3 p-4 wrap">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">Elections</h5>
                </div>
                
                <?php
                require '../dbconfig.php';
                require '../models/User.php';
                $userModel = new User($conn);
                $fetchData = $userModel->selectAll();
                if(is_array($fetchData)){      
                    foreach($fetchData as $data){
                  
                
                    echo '<div class=" election">
                    <a href="./election-details.php?election_id='.$data["election_id"].'" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                        
                        <div id="El" class="ag-courses-item_title">
                        '.$data["title"].'
                        </div>
            
                        <div class="ag-courses-item_date-box">
                        Start date:
                        <span class="ag-courses-item_date">
                            '.$data["start_date"].'
                        </span>
                        </div>
                        <div class="ag-courses-item_date-box">
                        End date:
                        <span class="ag-courses-item_date">
                            '.$data["end_date"].'
                        </span>
                        </div>
                    </a>
                    
                        <a href="./editElection.php?election_id='.$data["election_id"].'" class="badge bg-secondary rounded-3 fw-semibold bor">Edit</a>
                        
                        
                            
                    
                    </div>';
                }}
                ?>
                
                
              </div>
            </div>
          </div>
          
        </div>
       
        
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>