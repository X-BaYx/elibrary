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
	
	
	<!-- MetisMenu CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


	<!-- Style css -->
    <link href="style.css" rel="stylesheet">

<style>
    
/*ADMIN DASHBOARD */
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


/* Slide-in animations */
@keyframes slideInLeft {
from {
    transform: translateX(-100%);
    opacity: 0;
}
to {
    transform: translateX(0);
    opacity: 1;
}
}

@keyframes slideInRight {
from {
    transform: translateX(100%);
    opacity: 0;
}
to {
    transform: translateX(0);
    opacity: 1;
}
}


/* Apply animations to cards */
.slide-in-left {
animation: slideInLeft 1s ease-out forwards;
}

.slide-in-right {
animation: slideInRight 1s ease-out forwards;
}

/* Delay animations for each card */
.slide-in-left:nth-child(1) {
animation-delay: 0.2s;
}

.slide-in-right:nth-child(2) {
animation-delay: 0.4s;
}

.slide-in-left:nth-child(3) {
animation-delay: 0.6s;
}

.slide-in-right:nth-child(4) {
animation-delay: 0.8s;
}


/* first row profile circle css */
.profile-icon-circle {
display: inline-flex;
align-items: center;
justify-content: center;
width: 40px; /* Adjust the size of the circle */
height: 40px; /* Adjust the size of the circle */
background-color: rgb(48, 42, 116); /* Background color with reduced opacity */
border-radius: 50%; /* Makes it a circle */
font-size: 20px; /* Adjust the icon size */
color: #eff1f4; /* Icon color */
}

.profile-icon-circle i {
font-size: inherit; /* Ensures the icon inherits the size from the parent */
}

/* reduce the height of the widget */
.widget-stat.card {
height: auto; /* Ensure the card height adjusts to its content */
}

.card-body {
padding: 1.4rem; /* Adjust padding to reduce height */
}

.media {
align-items: center; /* Ensure the icon and text are vertically aligned */
}

.media-body {
flex: 1; /* Allow the text to take up remaining space */
}

.progress {
height: 8px; /* Reduce the height of the progress bar */
}

.progress-bar {
height: 100%; /* Ensure the progress bar fills the container */
}

/* ellipse btn */
.ellipsis-btn {
    width: 32px; /* Fixed width for the button */
    height: 32px; /* Fixed height for the button */
    border-radius: 50%; /* Make the button circular */
    display: flex;
    align-items: center;
    justify-content: center;
    border: none; /* Remove default button border */
    background: none; /* Remove default button background */
    transition: background-color 0.3s ease; /* Smooth transition for hover effects */
}

.ellipsis-btn:hover {
    background-color: rgba(0, 123, 255, 0.1); /* Light blue background on hover */
}

.ellipsis-icon {
    font-size: 24px; /* Adjust the size of the ellipsis */
    color: #000; /* Color of the ellipsis */
    line-height: 1; /* Ensure the icon is centered vertically */
}

.dropdown-menu {
    border: none; /* Remove dropdown menu border */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
}

.dropdown-item {
    padding: 0.5rem 1rem; /* Adjust padding for dropdown items */
    color: #333; /* Text color for dropdown items */
    transition: background-color 0.3s ease; /* Smooth transition for hover effects */
}

.dropdown-item:hover {
    background-color: #f8f9fa; /* Light gray background on hover */
}


/* badge */
.badge.light {
opacity: 0.8; /* Reduce opacity for a lighter appearance */
}

/* Carousel Styles */
.carousel-container {
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
  height: 10%;
        background-color: #f8f9fa;
        padding: 10px 0;
        margin-top: 20px;
    }

    .carousel-track {
        display: inline-block;
        white-space: nowrap;
        animation: moveCarousel 20s linear infinite;
    }

    .carousel-item {
        display: inline-block;
        margin-right: 20px;
        text-align: center;
        vertical-align: top;
        width: 150px;
    }

    .carousel-item img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .carousel-item p {
        margin-top: 10px;
        font-size: 14px;
        color: #333;
    }

    @keyframes moveCarousel {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }


    /* User / book Table Styles */
  .user-table {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 5px;
        padding: 10px 20px 20px 20px;
    }
    

    .user-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .user-table th,
    .user-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .user-table th {
        background-color: #FFCF50;
        font-weight: 600;
    }

    .user-table tbody tr:hover {
        background-color: #bcb1fe;
    }


    .see-more-link {
        text-align: right;
        margin-top: 10px;
    }

    .see-more-link a {
        color: #8371fd;
        text-decoration: none;
        font-weight: 500;
    }

    .see-more-link a:hover {
        text-decoration: underline;
    }

    /* book table styles*/
    .book-table2{
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 10px;
        padding: 10px 20px 20px 20px;

    }
    .book-table2 table {
        width: 100%;
        border-collapse: collapse;
    }

    .book-table2 th,
    .book-table2 td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .book-table2 th {
        background-color: #FFCF50;
        font-weight: 600;
    }

    .book-table2 tbody tr:hover {
        background-color: #f1f1f1;
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
            <a href="/admin-dashboard" class="brand-logo">
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
                                Admin Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
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
    <div class="content-body">
             <!-- Display real-time date and time -->
			<div style="padding: 15px;">
				<h2>Hello, Admin</h2>
				<p id="real-time-date" style="font-size: 18px; color: #333;"></p>
			  </div>

              <div class="row" style="padding: 15px;">
                <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                    <div class="widget-stat card slide-in-left" style="background-color: #FFCF50;">
                        <div class="card-body p-4">
                            <div class="media">
                                <span class="me-3">
                                    <div class="profile-icon-circle">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Users</p>
                                    <h3 class="text-white">          <?php
		     require('db.php');
			$sql = "SELECT * FROM users";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
    
    // Display result
    printf($rowcount);
 }
	  ?></h3>
                                    <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                    </div>
                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                    <div class="widget-stat card slide-in-right" style="background-color: #FFCF50;">
                        <div class="card-body p-4">
                            <div class="media">
                                <div class="profile-icon-circle">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="media-body text-white">
                                    <p class="mb-1">Total Books</p>
                                    <h3 class="text-white mb-2"><?php
		     require('db.php');
			$sql = "SELECT * FROM books";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
    
    // Display result
    printf($rowcount);
 }
	  ?></h3>
                                    <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                    </div>
                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                    <div class="widget-stat card slide-in-left" style="background-color: #FFCF50;">
                        <div class="card-body p-4">
                            <div class="media">
                                <div class="profile-icon-circle">
                                    <i class="fa-solid fa-file-export"></i>
                                </div>
                                <div class="media-body text-white">
                                    <p class="mb-1">Borrowed Books</p>
                                    <h3 class="text-white"><?php
		     require('db.php');
			$sql = "SELECT * FROM borrowed WHERE status = 'Borrowed'";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
    
    // Display result
    printf($rowcount);
 }
	  ?></h3>
                                    <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                    <div class="widget-stat card slide-in-right" style="background-color: #FFCF50;">
                        <div class="card-body p-4">
                            <div class="media">
                                <span class="me-3">
                                    <div class="profile-icon-circle">
                                        <i class="fa-solid fa-hourglass-half"></i>
                                    </div>
                                </span>
                                <div class="media-body text-white">
                                    <p class="mb-1">Overdue Books</p>
                                    <h3 class="text-white"></h3>
                                    <div class="progress mb-2 bg-secondary">
                                        <div class="progress-bar progress-animated bg-light" style="width: 58%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			  <!-- Horizontal Carousel of Books -->
			  <div class="carousel-container">
                <div class="carousel-track">
                    <div class="carousel-item">
                        <img src="public/img/books/book1.jpg" alt="Book 1">
                        <p>The Critique of Pure Reason</p>
                    </div>
                    <div class="carousel-item">
                        <img src="public/img/books/book2.jpg" alt="Book 2">
                        <p>Stroller</p>
                    </div>
                    <div class="carousel-item">
                        <img src="public/img/books/book3.jpg" alt="Book 3">
                        <p>The Design of Everyday Things</p>
                    </div>
                    <div class="carousel-item">
                        <img src="public/img/books/book4.jpg" alt="Book 4">
                        <p>Lemux</p>
                    </div>
                    <div class="carousel-item">
                        <img src="public/img/books/book5.jpg" alt="Book 5">
                        <p>The Republic</p>
                    </div>
                    <div class="carousel-item">
                        <img src="public/img/books/book6.jpg" alt="Book 6">
                        <p>Ancestor Trouble</p>
                    </div>
                </div>
            </div>

			
    
    <!-- book table -->
    <div class="book-table2">
        <div class="card-body">
            <div class="horizontal-scroll-container">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive-md">
                         <thead>
                                            <tr>
                                                <th>Book ID</th>
                                                <th>Book Title</th>
                                                <th>Author</th>
                                                <th>ISBN</th>
                                                <th>Genre</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
										
                                        <tbody>
										     <?php
require('db.php');
$view = "SELECT * FROM books";
$result = $conn->query($view);
if($result->num_rows > 0){
while($row = $result->fetch_array()){?>
                                         <tr>
										  <td><?php echo $row['id'];?></td>
										 <td><?php echo $row['title'];?></td>
										  <td><?php echo $row['author'];?></td>
										   <td><?php echo $row['isbn'];?></td>
										    <td><?php echo $row['genre'];?></td>
											 <td><?php echo $row['quantity'];?></td>
											  <td><a href=""><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href=""><i class="fa fa-trash"></i></a></td>
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
        <!-- Content body end -->
		

    <!-- Scripts -->
	<script src="https://kit.fontawesome.com/ff488817c2.js" crossorigin="anonymous"></script>

	<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	
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
    <script src="public/js/admin-dashboard.js"></script>
    <script src="public/js/custom.min.js"></script>
	<script src="public/js/dlabnav-init.js"></script>
	<script src="public/js/demo.js"></script>
  
	<script>
		// Initialize metismenu for display dropdown of side menu tabs
		document.addEventListener('DOMContentLoaded', function () {
		  $('#menu').metisMenu();
		});
	  </script>


</body>
</html>


