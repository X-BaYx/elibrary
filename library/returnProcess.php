<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
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
		#dynamic-image {
		  transition: opacity 0.8s ease-in-out;
		  
		}

		 /* Responsive adjustments */
		 @media (max-width: 768px) {
      #dynamic-image {
        width: 140px; /* Smaller size for mobile devices */
      }
    }

    @media (max-width: 480px) {
      #dynamic-image {
        width: 100px; /* Even smaller size for very small devices */
      }
    }
	  </style>

</head>
<body>
<?php
session_start();
if(!isset($_SESSION['username'])){

	}
?>
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
            <a href="/dashboard" class="brand-logo">
				<img src="public/img/e logo2.png" width="55" height="55" viewbox="0 0 55 55" fill="none" alt="elibrary logo">
				<div class="brand-title">
					<h2 style="color: black;">elibrary</h2>
					</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        

		<!-- side bar movement -->
       
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
                                Dashboard
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
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <li>
						<a class="" href="dashboard.php" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
					   
				<li>
					<a class="" href="bookstore.php" aria-expanded="false">
					<i class="fas fa-book"></i>
						<span class="nav-text">Explore Books</span>
					</a>
				</li> 
				<li>
					<a class="has-arrow " href="javascript:void()" aria-expanded="false">
					<i class="fas fa-database"></i>
						<span class="nav-text">Loan Management</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="borrowed-db.php">Borrowed Books</a></li>
						<li><a href="return.php">Returned Books</a></li>
						
					</ul>
				</li> 
					
                    <li>
						<a class="" href="logout.php" aria-expanded="false">
						<i class="fa-solid fa-arrow-right-from-bracket"></i>
							<span class="nav-text">Logout</span>
						</a>
                    </li>   
                </ul>
				
				
			</div>
        </div>
        <!-- Sidebar end -->
		
		<!-- Content body start -->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-6">
							
								  <?php
require('db.php');
$id = $_GET['id'];
$view = "SELECT * FROM books WHERE md5(id) = '$id'";
$result = $conn->query($view);
$row = $result->fetch_assoc();

$username = $_SESSION['username'];
$myaccount = "SELECT * FROM users WHERE username = '$username'";
$result22 = $conn->query($myaccount);
$row5 = $result22->fetch_assoc();

$total = $row['quantity'];
$balance = $total + 1;
$user = $row5['id'];
$title = $row['title'];
$author = $row['author'];
$isbn = $row['isbn'];
$bookfile = $row['bookfile'];
$bookimage = $row['bookimage'];
$status = "Returned";

$borrowing = "UPDATE books SET status = 'Returned', quantity = '$balance' WHERE md5(id) = '$id'";
$results = $conn->query($borrowing);

if($results == true){
	echo "<div style='background:green;padding:7px;color:white'>Returned successfully</div>";
}else{
		echo "<div style='background:red;padding:7px;color:white'>Return Failed</div>";
	
}

$borrow = "INSERT INTO returned (user,title,author,isbn,bookfile,bookimage,status) VALUES ('$user','$title','$author','$isbn','$bookfile','$bookimage','$status')";
$final = $conn->query($borrow);

?>


							</div>
					
						</div>
					</div>
				</div>
            </div>
        </div>
        <!-- Content body end -->
		


	</div>
   

    <!-- Scripts -->
	<script src="https://kit.fontawesome.com/ff488817c2.js" crossorigin="anonymous"></script>

	<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- MetisMenu JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.js"></script>


    <!-- Required vendors -->
    <script src="public/vendor/global/global.min.js"></script>
	<script src="public/vendor/chart.js/Chart.bundle.min.js"></script>
	<!-- Apex Chart -->
	<script src="public/vendor/apexchart/apexchart.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="public/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="public/js/dashboard.js"></script>
    <script src="public/js/custom.min.js"></script>
	<script src="public/js/dlabnav-init.js"></script>
	<script src="public/js/demo.js"></script>
  
	<script>
		// Initialize metismenu
		document.addEventListener('DOMContentLoaded', function () {
		  $('#menu').metisMenu();
		});


		// Array of image paths
		const images = [
    "public/img/lib4.png",
    "public/img/lib6.png",
    "public/img/lib5.png",
	"public/img/lib8.png",
	"public/img/lib1.png"
  ];

  let currentIndex = 0; // Track the current image index

  // Function to change the image
  function changeImage() {
    const imgElement = document.getElementById('dynamic-image');
    imgElement.src = images[currentIndex]; // Set the new image source

    // Update the index for the next image
    currentIndex = (currentIndex + 1) % images.length;
  }

  // Change the image every 3 seconds (3000 milliseconds)
  setInterval(changeImage, 6000);


  function changeImage() {
  const imgElement = document.getElementById('dynamic-image');
  
  // Fade out the image
  imgElement.style.opacity = 0;

  // After the fade-out, change the image and fade it back in
  setTimeout(() => {
    imgElement.src = images[currentIndex];
    imgElement.style.opacity = 1;

    // Update the index for the next image
    currentIndex = (currentIndex + 1) % images.length;
  }, 500); // Wait for 500ms (half of the transition duration)
}
	  </script>


</body>
</html>