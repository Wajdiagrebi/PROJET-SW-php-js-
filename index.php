<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
$courses = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>SWTECH</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--



-->
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
                      <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="#services">Services</a></li>
                      <li class="scroll-to-section"><a href="#courses">Courses</a></li>
                      <li class="scroll-to-section"><a href="#team">Team</a></li>
                      <li class="scroll-to-section"><a href="profile.php">Profile</a></li>
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

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Our Courses</span>
                <h2>Unlock Your Potential with Our Expert-Led Online Courses!</h2>
                <p>The content was always up-to-date, and the support from instructors was exceptional.</p>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Best Result</span>
                <h2>Achieve the Best Results with Our Top Online Courses!</h2>
                <p>Expert instruction, flexible learning, and cutting-edge content—your path to success starts here. Enroll now and see the difference!</p>
              </div>
            </div>
            <div class="item item-3">
              <div class="header-text">
                <span class="category">Online Learning</span>
                <h2>Online Learning helps you save the time</h2>
                <p>Save time with our flexible courses designed to fit your schedule. Learn from experts, gain practical skills, and achieve your goals faster. Start your course today!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="assets/images/service-01.png" alt="online degrees">
            </div>
            <div class="main-content">
              <h4>Online Degrees</h4>
              <p>Earn Your Online Degree with Us, Anytime, Anywhere.</p>
              <div class="main-button">
                <a href="#">Read More</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="assets/images/service-02.png" alt="short courses">
            </div>
            <div class="main-content">
              <h4>Short Courses</h4>
              <p>Quick Learning, Boost Your Skills with Our Short Courses.</p>
              <div class="main-button">
                <a href="#">Read More</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <div class="icon">
              <img src="assets/images/service-03.png" alt="web experts">
            </div>
            <div class="main-content">
              <h4>Long-Term Courses</h4>
              <p>Achieve Expertise, Master Your Field with Our In-Depth Long-Term Courses.</p>
              <div class="main-button">
                <a href="#">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="section courses" id="courses" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Latest Courses</h6>
            <h2>Latest Courses</h2>
          </div>
        </div>
      </div>
      <div class="row event_box">
        <?php foreach ($courses as $course): ?>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 <?php echo htmlspecialchars($course['category']); ?>">
            <div class="events_item">
                <div class="thumb">
                    <a href="order.php"><img src="assets/images/<?php echo htmlspecialchars($course['image_info']); ?>" alt=""></a>
                    <span class="category"><?php echo htmlspecialchars($course['category']); ?></span>
                    <span class="price"><h6><em>Dt</em><?php echo htmlspecialchars($course['price']); ?></h6></span>
                </div>
                <div class="down-content">
                    <span class="author"><?php echo htmlspecialchars($course['author']); ?></span>
                    <h4><?php echo htmlspecialchars($course['course']); ?></h4>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
  </section>

  <div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="150" data-speed="1000"></h2>
                   <p class="count-text ">Happy Students</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="804" data-speed="1000"></h2>
                  <p class="count-text ">Course Hours</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="50" data-speed="1000"></h2>
                  <p class="count-text ">Employed Students</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="15" data-speed="1000"></h2>
                  <p class="count-text ">Years Experience</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="team section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="assets/images/wajdi.jpeg" alt="">
              <span class="category">Full Stack Master</span>
              <h4>Wajdi Agerbi </h4>
              <ul class="social-icons">
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="col-lg-6 col-md-6">
          <div class="team-member">
            <div class="main-content">
              <img src="assets/images/sami.jpeg" alt="">
              <span class="category">Full Stack Master</span>
              <h4>Sami Boukhili</h4>
              <ul class="social-icons">
                <li><a href="https://tn.linkedin.com/in/sami-boukhili-0b98a215a"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        

  <div class="section testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="owl-carousel owl-testimonials">
            <div class="item">
              <p>“Enrolling in these online courses was a game-changer for my career. The instructors are incredibly knowledgeable, and the course material is both challenging and practical. I've gained new skills that I’m already applying in my job. Highly recommend!”</p>
              <div class="author">
                <img src="assets/images/member-01.jpg" alt="">
                <span class="category">Full Stack Master</span>
                <h4>Jihen Manai</h4>
              </div>
            </div>
            <div class="item">
              <p>“I was impressed by the variety and depth of the courses offered. Each course was well-structured and packed with relevant information. The interactive elements and real-world applications made learning both enjoyable and effective. I feel more confident and prepared in my field.”</p>
              <div class="author">
                <img src="assets/images/member-03.jpg" alt="">
                <span class="category">UI Expert</span>
                <h4>Amen allah Touatti</h4>
              </div>
            </div>
            <div class="item">
              <p>“The online courses have been incredibly beneficial for my personal and professional development. The instructors are passionate and approachable, and the course platform is user-friendly. I’ve gained practical skills and valuable insights that have made a significant difference in my career.”</p>
              <div class="author">
                <img src="assets/images/testimonial-author.jpg" alt="">
                <span class="category">Digital Animator</span>
                <h4>Bayya Tmar</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <div class="section-heading">
            <h6>TESTIMONIALS</h6>
            <h2>What they say about us?</h2>
            <p>Our online platform provides a dynamic learning environment with a diverse selection of courses designed to fit various interests and skill levels. Our expert instructors bring real-world experience and current industry insights to each course, ensuring that our content remains relevant and engaging. Whether you're looking to advance your career or explore new interests, our up-to-date programs are crafted to meet your educational needs effectively</p>
          </div>
        </div>
      </div>
    </div>
  </div>



<div class="section events" id="events"> 
<?php foreach ($courses as $course): ?>  
    <div class="container"> 
    <div class="col-lg-12 col-md-6">
        <div class="item">
            <div class="row">
                <div class="col-lg-3">
                    <div class="image">
                        <img src="assets/images/<?php echo htmlspecialchars($course['image_info']); ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul>
                        <li>
                            <span class="category"><?php echo htmlspecialchars($course['category']); ?></span>
                            <h4><?php echo htmlspecialchars($course['course']); ?></h4>
                        </li>
                        <li>
                            <span>Date:</span>
                            <h6><?php echo htmlspecialchars($course['date_course']); ?></h6>
                        </li>
                        <li>
                            <span>Duration:</span>
                            <h6><?php echo htmlspecialchars($course['duration']); ?></h6>
                        </li>
                        <li>
                            <span>Price:</span>
                            <h6><?php echo htmlspecialchars($course['price']); ?> Dt</h6>
                        </li>
                    </ul>
                    <a href="order.php"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        
      <p>{SW} Tech </br>
       Rue Srf, Lac2, Tunis, Tunisie</br>
      (+216) 71 000 000</br>
      office@swtech.com</p> 
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>