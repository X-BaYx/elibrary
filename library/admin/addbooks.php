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
        body {
          background-color: #f8f9fa;
        }
        .form-container {
          max-width: 600px;
          margin: 50px auto;
          padding: 20px;
          background: #fff;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
          margin-bottom: 20px;
          text-align: center;
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
            <a href="/admin-dashboard" class="brand-logo">
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
                              Add New Book
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
      <?php include("sidebar.php");?>
        <!-- Sidebar end -->
		
		<!-- Content body start -->

        <div class="content-body">        
                <div class="row">
                    <div class="form-container">
								<?php
require 'db.php'; // File to handle DB connection

if (isset($_POST['addbook'])) {
    $title = trim($_POST['title']);
	 $author = trim($_POST['author']);
	     $isbn = trim($_POST['isbn']);
				      $genre = trim($_POST['genre']);
					       $quantity = trim($_POST['quantity']);
						       $status = trim($_POST['status']);
						   
						    $cover_dir = "uploads/covers/"; // Directory for cover images
    $book_dir = "uploads/books/"; // Directory for book files

    // Ensure directories exist
    if (!is_dir($cover_dir)) {
        mkdir($cover_dir, 0777, true);
    }
    if (!is_dir($book_dir)) {
        mkdir($book_dir, 0777, true);
    }

    // Upload cover image
    $cover_name = $_FILES['bookimage']['name'];
    $cover_tmp_name = $_FILES['bookimage']['tmp_name'];
    $cover_extension = pathinfo($cover_name, PATHINFO_EXTENSION);
    $cover_new_name = uniqid() . '.' . $cover_extension;

    $cover_path = $cover_dir . $cover_new_name;

    // Upload book file
    $book_name = $_FILES['bookfile']['name'];
    $book_tmp_name = $_FILES['bookfile']['tmp_name'];
    $book_extension = pathinfo($book_name, PATHINFO_EXTENSION);
    $book_new_name = uniqid() . '.' . $book_extension;

    $book_path = $book_dir . $book_new_name;

						   
	 if (move_uploaded_file($cover_tmp_name, $cover_path) && move_uploaded_file($book_tmp_name, $book_path)) {
        // Insert the data into the database
        $sql = "INSERT INTO books (title, author, isbn, genre, quantity, status, bookfile, bookimage) 
                VALUES ('$title','$author','$isbn','$genre','$quantity', '$status', '$cover_path', '$book_path')";

        if ($conn->query($sql) === TRUE) {
            echo "Book uploaded successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "File upload failed!";
    }				 

 
}

?>
                        <h2>Add New Book</h2>
                        <form action="addbooks.php" method="POST" enctype="multipart/form-data">
                          <div class="mb-3">
                            <label for="title" class="form-label">Book Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Book Title" required>
                          </div>
                          <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Author" required>
                          </div>
                          <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" required>
                          </div>
                          <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre" placeholder="Genre" required>
							 <input type="hidden" class="form-control"  name="status" value="available" required>
                          </div>
                          <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
                          </div>
                          <div class="mb-3">
                            <label for="bookFile" class="form-label">Upload Book File</label>
                            <input type="file" class="form-control" id="bookFile" name="bookfile" placeholder="Upload Book File" accept=".pdf,.epub,.doc,.docx" required>
                          </div>
                          <div class="mb-3">
                            <label for="bookImage" class="form-label">Upload Book Image</label>
                            <input type="file" class="form-control" id="bookImage" name="bookimage" placeholder="Upload Book Image" accept="image/*" required>
                          </div>
                          <button type="submit" class="btn btn-primary" name="addbook">Add Book</button>
                        </form>
                    </div>
            </div>
        </div>			
    <!-- Main wrapper end ->

    <!- Scripts -->
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