<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>elibrary</title>
    <link rel="icon" type="image/png" href="/img/e logo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.css">
    <link href="style.css" rel="stylesheet">
    <style>
        /* Animation for table */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        #usersTable {
            animation: fadeIn 1s ease-in-out;
        }

        .card {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <!-- Preloader start -->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader end -->

    <div id="main-wrapper">
        <!-- Nav header start -->
        <div class="nav-header">
            <a href="/admin-dashboard" class="brand-logo">
                <img src="public/img/e logo1.png" width="55" height="55" alt="elibrary logo">
                <div class="brand-title">
                    <h2 style="color: #0c0c0d">elibrary</h2>
                </div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <!-- Header start -->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Update/Delete Users
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item d-flex align-items-center">
                                <div class="input-group search-area">
                                    <input type="text" class="form-control" placeholder="Search here...">
                                    <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="public/img/profile-logo.png" width="56" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Sidebar start -->
       <?php include("sidebar.php"); ?>
        <!-- Sidebar end -->

        <!-- Content body start -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users Inventory</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
									 <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                          		     <?php
require('db.php');
$view = "SELECT * FROM users";
$result = $conn->query($view);
if($result->num_rows > 0){
while($row = $result->fetch_array()){?>
                                         <tr>
										  <td><?php echo $row['id'];?></td>
										 <td><?php echo $row['name'];?></td>
										 	 <td><?php echo $row['username'];?></td>
										  <td><?php echo $row['email'];?></td>
										   <td><?php echo $row['access'];?></td>
										
											  <td><a href="deleteuser.php?id=<?php echo md5($row['id']);?>"><i class="fa fa-trash"></i></a></td>
										 </tr>
										   <?php
					
							}

						}else{
							echo " <div class='alert alert-success alert-dismissible'>
	       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                     
             No  record found
                    </div>";
						}
					
				$conn->close();
				?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/ff488817c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.js"></script>
    <script src="public/vendor/global/global.min.js"></script>
    <script src="public/js/custom.min.js"></script>
    <script src="public/js/dlabnav-init.js"></script>
    <script src="public/js/demo.js"></script>
    <script src="public/js/admin-dashboard.js"></script>

    <script>
    
    </script>
</body>
</html>