<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
   <!-- PAGE TITLE-->
	<title>elibrary</title>

    
	<!-- FAVICON ICON -->
	<link rel="icon" type="image/png" href="/img/e logo1.png">
	

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

    <!-- Preloader -->


    <main class="d-flex align-items-center" id="form" style="display: none;">
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">

            <!-- Sign In Form -->
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
		alert("REGISTRATION SUCCESS. PLEASE LOGIN TO CONTINUE");
		window.location.href = "index.php";
	</script><?php
					}else{
						?>
	<script type="text/javascript">
		alert("REGISTRATION FAILED. PLEASE TRY AGAIN LATER");
		window.location.href = "index.php";
	</script><?php	
					}
 
}

?>
            <form action="loginprocess.php" autocomplete="off" class="sign-in-form" method="POST">
              <div class="logo">
                <img src="public/img/elibrary logo2.png" alt="elibrary" />
              </div>

              <div class="heading">
                <h2>Welcome Back</h2>
                <h6>Not registered yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>
				
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
					name="username"
                    class="form-control"
                    autocomplete="off"
					placeholder="Username"
                    required
                  />
              
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                	placeholder="Password"
                    class="form-control"
                    autocomplete="off"
					name="password"
                    required
                  />
               
                </div>

                <!-- Dropdown for User Role -->
             	   <div class="input-wrap-dropdown">
                  <select class="input-field" name="access"required>
                    <option value="" selected disabled>Select User Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                  </select>
                </div>

                <input type="submit" value="Sign In" class="sign-btn"/>

                <p class="text">
                  Forgotten your password or your login details?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <!-- Sign Up Form -->
            <form action="index.php" autocomplete="off" class="sign-up-form" method="POST">
              <div class="logo">
                <img src="public/img/elibrary logo2.png" alt="elibrary" />
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
					name="name"
                    required
                  />
                  <label>Name</label>
                </div>

                     <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
					name="username"
                    required
                  />
                  <label>Username</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
					name="email"
                    required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength=""
                    class="input-field"
                    autocomplete="off"
					name="password"
                    required
                  />
				    <input
                    type="hidden"
                    minlength=""
                    class="input-field"
                    autocomplete="off"
					name="access"
                    value="User"
                  />
                  <label>Password</label>
                </div>
			

                <input id="signup-btn" name="register"type="submit" value="Sign Up" class="sign-btn"/>

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <!-- Carousel -->
          <div id="lottieCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <!-- Slide 1 -->
              <div class="carousel-item active">
                <dotlottie-player
                  src="https://lottie.host/f10eccf1-c24d-4484-a92b-2548f4b2b763/1Uag3BzwEI.lottie"
                  background="transparent"
                  speed="1"
                  loop
                  autoplay
                ></dotlottie-player>
              </div>

              <!-- Slide 2 -->
              <!-- <div class="carousel-item" data-bs-interval="5000">
                <dotlottie-player
                  src="https://lottie.host/f10eccf1-c24d-4484-a92b-2548f4b2b763/1Uag3BzwEI.lottie"
                  background="transparent"
                  speed="1"
                  loop
                  autoplay
                ></dotlottie-player>
              </div> -->
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#lottieCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#lottieCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </main>



    <script>
     document.getElementById("signup-btn").addEventListener("click", function() {
    window.location.href = "/dashboard"; // Redirect to dashboard
});
    </script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- DotLottie Player Script -->
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

    <!-- Custom JS -->
    <script src="public/js/animations.js"></script>
  </body>
</html>