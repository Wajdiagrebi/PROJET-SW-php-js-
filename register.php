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

            .main-banner2 .owl-nav {
                position: absolute;
                max-width: 1320px;
                bottom: 23px;
                left: 0;
                text-align: right;
            }

            .main-banner2 .owl-nav .owl-prev i,
            .main-banner2 .owl-nav .owl-next i {
                width: 50px;
                height: 50px;
                line-height: 70px;
                font-size: 24px;
                display: inline-block;
                color: #fff;
                background-color: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                opacity: 1;
                transition: all .3s;
            }

            .main-banner2 .owl-nav .owl-prev i {
                position: absolute;
                bottom: 65px;
            }

            .main-banner2 .owl-nav .owl-prev i:hover,
            .main-banner2 .owl-nav .owl-next i:hover {
                opacity: 1;
                background-color: rgba(255, 255, 255, 0.5);
            }
        </style>
    </div>

  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h6>Contact Us</h6>
            <h2>Feel free to contact us anytime</h2>
            <p>Thank you for  choosing our servise</p>
            <div class="special-offer">
              <span class="offer">off<br><em>50%</em></span>
              <h6>Valid: <em>25 September 2024</em></h6>
              <h4>Special Offer <em>50%</em> OFF!</h4>
              <a href="#"><i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-us-content">
            <form id="contact-form" action="process_register.php" method="post">
              <div class="row">
                <div class="col-lg-12">
                  <fieldset>
                  <div id="usernameHelp" class="form-text">Enter your username.</div>
                  <div id="nameError" class="form-text text-danger"></div>
                    <input type="text" name="name" id="name" placeholder="Your Name..."  required>

                  </fieldset>
                </div><div class="col-lg-12">
                  <fieldset>
                  <div id="emailHelp" class="form-text">Enter your email.</div>
                  <div id="emailError" class="form-text text-danger"></div>
                    <input type="email" name="email" id="email" placeholder="Your email..."  required>

                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                  <div id="passwordHelp" class="form-text">Enter your password.</div>
                  <div id="passwordError" class="form-text text-danger"></div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Your password ..." required aria-describedby="passwordHelp">
                
                  </fieldset>
                </div>
                <div class="col-lg-12">
                <div class="button-container" style="display: flex; gap: 20px;">
  <fieldset>
    <button type="submit" id="form-submit" class="orange-button">Sign in</button>
  </fieldset>
  <fieldset>
    <a href="login.php"><button type="button" id="form-submit" class="orange-button">Login</button></a>
  </fieldset>
</div>

</div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>{SW} Tech <br>
          Rue Srf, Lac2, Tunis, Tunisie<br>
          (+216) 71 000 000<br>
          office@swtech.com</p>
      </div>
    </div>
  </footer>
<script src="script.js"></script> <!-- Include any client-side validation if needed -->
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

