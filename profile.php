<?php 
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}



$email = $_SESSION['email'];
$name = $_SESSION['name'];
$client_id = $_SESSION['id'];

// Fetch client data
$sql = "SELECT profile_picture FROM clients WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $profilePicture = $row["profile_picture"];
} else {
    $profilePicture = "assets/images/default.jpg"; // Path to default profile picture
}


// Close the statement
$stmt->close();
?>
<title>client Profile</title>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>{SW} Tech_Site</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

     <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                    <h4 style="color: white;">{SW} Tech_Site</h4>

                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="index.php">Services</a></li>
                      <li class="scroll-to-section"><a href="index.php">Courses</a></li>
                      <li class="scroll-to-section"><a href="index.php">Team</a></li>
                      <li class="scroll-to-section"><a href="profile.php">Login</a></li>
                      <li class="scroll-to-section"><a href="register.php">Register Now!</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner2" id="top">
        <style>
            .main-banner2 {
                background-image: url(assets/images/banner-bg.jpg);
                background-position: right bottom;
                background-repeat: no-repeat;
                background-size: cover;
                padding: 30px 0px 120px 0px;
            }


          

           

          
            .main-banner .owl-nav {
                position: absolute;
                max-width: 1320px;
                bottom: 23px;
                left: 0;
                text-align: right;
            }

            .main-banner .owl-nav .owl-prev i,
            .main-banner .owl-nav .owl-next i {
                width: 50px;
                height: 50px;
                line-height: 50px;
                font-size: 24px;
                display: inline-block;
                color: #fff;
                background-color: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                opacity: 1;
                transition: all .3s;
            }

            .main-banner .owl-nav .owl-prev i {
                position: absolute;
                bottom: 65px;
            }

            .main-banner .owl-nav .owl-prev i:hover,
            .main-banner .owl-nav .owl-next i:hover {
                opacity: 1;
                background-color: rgba(255, 255, 255, 0.5);
            }
        </style>
    </div>
    
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center">
                        <img src="<?php echo $profilePicture; ?>" width="10" class="profile-picture">
                       <style> .profile-picture {
    width: 150px; /* Set the desired width */
    height: 150px; /* Set the desired height */
    object-fit: cover; /* Ensures the image covers the area without stretching */
    border-radius: 50%; /* Makes the image circular */
}</style>
                    </div>
                    <div class="text-center mt-3">
                        <h5><?php echo $name ?></h5>
                        <h5 class="mt-2 mb-0"></h5>
            
                        <div class="buttons">
                            <a href="add_photo.php"><button class="btn btn-outline-primary px-4">Add photo</button></a> <br><br>
                            <a href="edit_profile_client.php"><button class="btn btn-outline-primary px-4">Edit Profile</button></a> <br><br>
                            <a href="list.php"><button class="btn btn-outline-primary px-4">List order</button></a><br><br>
                            <a href="logout.php"><button class="btn btn-outline-primary px-4">Logout</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
    <footer class="footer-area">
        <div>
        <p> {SW} Tech
            Rue Srf, Lac2, Tunis, Tunisie</p>
            <p>(+216) 71 000 000</p>
            <p>office@swtech.com</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>

