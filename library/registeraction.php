<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up Page</title>
  <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background: radial-gradient(circle, rgba(2,124,156,1) 0%, rgba(160,189,232,1) 100%);r">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-start py-5 px-4 px-sm-5" style="background:inherit">
                       	<?php
require 'db.php'; // File to handle DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
	 $username = trim($_POST['username']);
  $dob = trim($_POST['dob']);
     $gender = trim($_POST['gender']);
	     $password = md5($_POST['password']);
		 $confirm = md5($_POST['confirm']);
		     $contact = trim($_POST['contact']);
			     $address = trim($_POST['address']);
				      $email = trim($_POST['email']);
					     $memberID = trim($_POST['memberID']);
					       $access = trim($_POST['access']);
						   
					if($password == $confirm){ 
    $query = "INSERT INTO users (name,username,dob,gender,password,contact,address,email,access,memberID) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssssss', $name,$username,$dob,$gender,$password,$contact,$address,$email,$access,$memberID);
    $stmt->execute();

        echo "<div class ='alert alert-success'><h3>Registration Successful</h3>	<span><a href='index.php'>Login</a></span></div>
		<img class='img-fluid'src='registration-successful-account-successfully-created-concept_183665-1512.avif'/> 	
	";
					}else{
						
					echo "<div class='alert alert-danger'>Password does not match</div>";	
					}
 
}

?>
             
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
