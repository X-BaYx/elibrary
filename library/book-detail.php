<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- PAGE TITLE HERE -->
	<title>Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="public/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	
<!-- Bootstrap css -->
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
            <a href="index.html" class="brand-logo">
				<img src="public/img/e logo1.png" width="55" height="55" viewbox="0 0 55 55" fill="none" alt="elibrary logo">
				<div class="brand-title">
					<h2 class="" style="color: #886CC0">elibrary</h2>
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
		
        <!--   Content body start -->
  	  <?php
require('db.php');
$id = $_GET['id'];
$view = "SELECT * FROM books WHERE md5(id) = '$id'";
$result = $conn->query($view);
$row = $result->fetch_assoc();?>

        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo $row['genre'];?></a></li>
						
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="first">
                                                <img class="img-fluid" src="admin/<?php echo $row['bookfile'];?>" alt="">
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <!--Tab slider End-->
                                    <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content pr">
                                                <h4><?php echo $row['title'];?></h4>
                                                <div class="comment-review star-rating">
												
													<span class="review-text"></span><a class="product-review" href="" data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
												</div>
												
                                                <p>Author: <span class="item"  style="font-size: 11px;"> <?php echo $row['author'];?> </span>
                                                </p>
                                                <p>ISBN: <span class="item" style="font-size: 11px;"><?php echo $row['isbn'];?></span> </p>
												 <p>Quantity: <span class="item" style="font-size: 11px;"><?php echo $row['quantity'];?></span> </p>
                                                <p>Genre:&nbsp;&nbsp;<?php echo $row['genre'];?>
                                                 
                                                
                                                </p>
                         
												<div class="d-flex align-items-end flex-wrap mt-4">
													
													<!-- borrow -->
													<!-- <div class="col-2 px-0  mb-2 me-3">
														<input type="number" name="num" class="form-control input-btn input-number" value="1">
													</div> -->
													
													<div class="mb-2 me-3">
														<a class="btn btn-primary" href="borrowProcess.php?id=<?php echo md5($row['id']);?>">Borrow</a>
													</div>

													<!-- <div class="mb-2 me-3">
														<a class="btn btn-primary" href="javascript:void(0);" onclick="borrowBook()">Borrow</a>
													</div> -->

												</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- review -->
					<div class="modal fade" id="reviewModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Review</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="text-center mb-4">
											<img class="img-fluid rounded" width="78" src="public/img/books/book1.jpg" alt="DexignZone">
										</div>
										<div class="mb-3">
											<div class="rating-widget mb-4 text-center">
												<!-- Rating Stars Box -->
												<div class="rating-stars">
													<ul id="stars">
														<li class="star" title="Poor" data-value="1">
															<i class="fa fa-star fa-fw"></i>
														</li>
														<li class="star" title="Fair" data-value="2">
															<i class="fa fa-star fa-fw"></i>
														</li>
														<li class="star" title="Good" data-value="3">
															<i class="fa fa-star fa-fw"></i>
														</li>
														<li class="star" title="Excellent" data-value="4">
															<i class="fa fa-star fa-fw"></i>
														</li>
														<li class="star" title="WOW!!!" data-value="5">
															<i class="fa fa-star fa-fw"></i>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="mb-3">
											<textarea class="form-control" placeholder="Comment" rows="5"></textarea>
										</div>
										<button class="btn btn-success btn-block">RATE</button>
									</form>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
			<div id="borrowToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header">
					<strong class="me-auto">Notification</strong>
					<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body text-primary">
					Successfully borrowed book!
				</div>
			</div>
		</div>
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
	<!-- <script>
		function borrowBook() {
			alert("You have successfully borrowed the book!");
		}
		</script> -->

		
    
    <!-- Scripts -->
	<script src="https://kit.fontawesome.com/ff488817c2.js" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- MetisMenu JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.7/metisMenu.min.js"></script>

    <!-- Required vendors -->
    <script src="public/vendor/global/global.min.js"></script>


	<!-- Rating -->
	<script src="public/vendor/star-rating/jquery.star-rating-svg.js"></script>
	
	<script src="public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<script src=""></script>
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