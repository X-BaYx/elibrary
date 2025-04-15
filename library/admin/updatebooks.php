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
	  <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <style>
        /* animation for table */
        @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

#booksTable {
    animation: fadeIn 1s ease-in-out;
}

.card{
    margin-top: 40px;
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
                              Update/Delete Books
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
   
        <!-- Sidebar end -->
		
		<!-- Content body start -->

        <div class="content-body">        
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                      
                            <div class="card-body">
                                <div class="table-responsive">
																<?php
require 'db.php'; // File to handle DB connection

if (isset($_POST['addbook'])) {
	$id = $_POST['id'];
    $title = trim($_POST['title']);
	 $author = trim($_POST['author']);
	     $isbn = trim($_POST['isbn']);
				      $genre = trim($_POST['genre']);
					       $quantity = trim($_POST['quantity']);
						       $status = trim($_POST['status']);
						   
	

						   

        // Insert the data into the database
        $sql = "UPDATE books SET title = '$title', author = '$author',isbn = '$isbn', genre = '$genre', quantity = '$quantity', status =  '$status' WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<span style='background:green;color:white;padding:5px'>Book updated successfully!</span>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 			 

 


?>
                                    <table id="example1" class="table table-hover">
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
											  <td><a href="editbooks.php?id=<?php echo md5($row['id']);?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="deletebook.php?id=<?php echo md5($row['id']);?>"><i class="fa fa-trash"></i></a></td>
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
                                <!-- Pagination -->
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center" id="pagination">
                                        <!-- Pagination links will be dynamically added here -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
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
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
		<script>
		let table = new DataTable('#example1');
		</script>

	<script>
		// Initialize metismenu for display dropdown of side menu tabs
		document.addEventListener('DOMContentLoaded', function () {
		  $('#menu').metisMenu();
		});



	  </script>

</body>
</html>