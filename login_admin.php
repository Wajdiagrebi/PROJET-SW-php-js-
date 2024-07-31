<?php
session_start();
include 'config.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error_message = 'Veuillez remplir tous les champs.';
    } else {
        $sql = "SELECT * FROM `admin`  WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $admin = $result->fetch_assoc();
                if (password_verify($password, $admin['password'])) {
                    // Set session variables
                    $_SESSION['id'] = $admin['id'];
                    $_SESSION['name'] = $admin['name'];
                    $_SESSION['access'] = $admin['access'];
                    $_SESSION['email'] = $admin['email'];
                    
                    header('Location: admin.php ');
                    exit();
                } else {
                    $error_message = 'Mot de passe incorrect';
                }
            } else {
                $error_message = 'Adresse email non trouvée';
            }

            $stmt->close();
        } else {
            $error_message = 'Erreur de préparation de la requête.';
        }
    }

    $conn->close();
}
?>



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

    <!-- Nav End -->
    <!-- Login Area -->
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-3 d-none d-md-flex bg-image"></div>
            <!-- The content half -->
            <div class="col-md-9 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <!-- Demo content-->
                    <div class="containerlogin">
                        <div class="row">
                            <div class="col-lg-10 col-xl-12 mx-auto">
                                <h3 class="display-2">We are {SW} Tech Team</h3>
                                <?php if ($error_message): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo htmlspecialchars($error_message); ?>
                                    </div>
                                <?php endif; ?>
                                <form action="" method="post">
                                    <div class="form-group mb-3">
                                        <label for="email">Email:</label>
                                        <input name="email" type="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Mot de passe:</label>
                                        <input name="password" id="inputPassword" type="password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Remember password</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Login</button>
                                    <br>
                                    <p>Pas encore inscrit? <a href="register.php">S'inscrire</a></p><br>
                                    <p><a href="login.php">Login as client</a></p>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
    </body>
<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div>
        <h3>{SW} Tech</h3>
        <p>Rue Srf, Lac2, Tunis, Tunisie</p>
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
<script src="script.js"></script> <!-- Include any client-side validation if needed -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<!-- ##### Footer Area End ##### -->
</html>
