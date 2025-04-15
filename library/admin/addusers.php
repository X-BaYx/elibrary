 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  	<!-- PAGE TITLE-->
	<title>elibrary</title>
    
	<!-- FAVICON ICON -->
	<link rel="icon" type="image/png" href="/img/e logo1.png">
	
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <!-- MetisMenu CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.css">

	<!-- Style css -->
    <link href="style.css" rel="stylesheet">
  <style>
    body {
          background-color: #f8f9fa;
        }
        .form-container {
          max-width: 600px;
          margin: 70px auto;
          padding: 20px;
          background: #fff;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
          margin-bottom: 50px;
          text-align: center;
          color: #0c0c0d;
        }
        .form-container .form-label {
          font-weight: bold;
        }
        .form-container .btn-primary {
          width: 100%;
        }
  </style>
</head>
<body>

   <!-- Preloader start-->
	 <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!-- Preloader end-->

    <div id="main-wrapper">

        <!-- Nav header start-->
		<div class="nav-header">
            <a href="admin-dashboard.php" class="brand-logo">
				<img src="public/img/e logo1.png" width="55" height="55" viewbox="0 0 55 55" fill="none" alt="elibrary logo">
				<div class="brand-title">
					<h2 class="" style="color: #0c0c0d">elibrary</h2>
					</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        
		
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
			</div>
		</div>
						
		<!--Header start-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                              Add New User
                            </div>
							
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</li>
							
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="public/img/profile-logo.png" width="56" alt="">
								</a>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>


        <!--  Sidebar start -->
      <?php include("sidebar.php"); ?>
        <!-- Sidebar end -->

<!-- Content body start -->
  <div class="form-container">
  			<?php
require 'db.php'; // File to handle DB connection

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
	 $username = trim($_POST['username']);
	     $password = md5($_POST['password']);
				      $email = trim($_POST['email']);
					       $access = trim($_POST['access']);
						   
					 
    $query = "INSERT INTO users (name,username,password,email,access) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssss', $name,$username,$password,$email,$access);
    $stmt->execute();
if($stmt == true){
      ?>
	<script type="text/javascript">
		alert("USER ADDED SUCCESSFULLY. ADD ANOTHER");
		window.location.href = "addusers.php";
	</script><?php
					}else{
						?>
	<script type="text/javascript">
		alert("FAILED TO ADD USER");
		window.location.href = "addusers.php";
	</script><?php	
					}
 
}

?>
    <h2>Add New User</h2>
    <form action="addusers.php" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
      </div>
	  <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <input type="text" class="form-control" id="name" name="username" placeholder="Username" required>
      </div>
	  <div class="mb-3">
        <label for="name" class="form-label">Password</label>
        <input type="text" class="form-control" id="name" name="password" placeholder="Password" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-control" id="role" name="access" placeholder="Select Role" required>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="register">Add</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>		
    <!-- Main wrapper end ->

    <!- Font awesome Scripts -->
	<script src="https://kit.fontawesome.com/ff488817c2.js" crossorigin="anonymous"></script>      

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

	<!-- MetisMenu JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.js"></script>

    <!-- Required vendors -->
    <script src="public/vendor/global/global.min.js"></script>


	<!-- Scripts -->
  <script src="public/js/admin-dashboard.js"></script>
    <script src="public/js/custom.min.js"></script>
	<script src="public/js/dlabnav-init.js"></script>
	<script src="public/js/demo.js"></script>
  

	<script>
		// Initialize metismenu
		document.addEventListener('DOMContentLoaded', function () {
		  $('#menu').metisMenu();
		});

	  </script>
</body>
</html>