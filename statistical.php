<?php
session_start();
include 'config.php';


$sql = "SELECT SUM(course_price) as total_amount FROM ordre WHERE  status = 'accepted'";
$result = $conn->query($sql);
$courses = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
} 
}

$sql2 = "SELECT YEAR(date_ordre) as year, MONTH(date_ordre) as month, SUM(course_price) as total_amount_month FROM ordre WHERE MONTH(date_ordre) = MONTH(NOW()) AND status = 'accepted'";

$result = $conn->query($sql2);
$total_amount_month = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $total_amount_month[] = $row;
} 
}
$sql3 = "SELECT COUNT(DISTINCT id_ord) as total_order FROM ordre";
$result = $conn->query($sql3);
$order = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $order[] = $row;

} 
}
$sql4 = "SELECT COUNT(DISTINCT id_ord) as total_order_month FROM ordre WHERE MONTH(date_ordre) = MONTH(NOW()) ";



$result = $conn->query($sql4);
$total_order_month = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $total_order_month[] = $row;
} 
}
$sql5 = "SELECT COUNT(DISTINCT id) as total_courses FROM courses";
$result = $conn->query($sql5);
$num_courses = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $num_courses[] = $row;

} 
}
$sql6 = "SELECT COUNT(DISTINCT id) as total_candidats FROM users";
$result = $conn->query($sql6);
$num_candidats = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $num_candidats[] = $row;

} 
}
$sql7 = "SELECT COUNT(DISTINCT author) as total_teachers FROM courses";
$result = $conn->query($sql7);
$num_Teachers = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $num_Teachers[] = $row;

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
<?php foreach ($courses as $course): ?>
<div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="<?php echo htmlspecialchars($course['total_amount']); ?>" data-speed="1000"></h2>
                  <p class="count-text ">Total Amount</p>
                </div>
              </div>
              <?php endforeach; ?>
              <?php foreach ($total_amount_month as $total_amount_month): ?>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="<?php echo htmlspecialchars($total_amount_month['total_amount_month']); ?>" data-speed="1000"></h2>
                  <p class="count-text ">Total Amount of month</p>
                </div>
              </div>
              <?php endforeach; ?>
              <?php foreach ($order as $order): ?>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="<?php echo htmlspecialchars($order['total_order']); ?>" data-speed="1000"></h2>
                  <p class="count-text ">Total Order</p>
                </div>
              </div>
              <?php endforeach; ?>
              <?php foreach ($total_order_month as $total_order_month): ?>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="<?php echo htmlspecialchars($total_order_month['total_order_month']); ?>" data-speed="1000"></h2>
                  <p class="count-text ">Total Order of month</p>
                </div>
              </div>
              <?php endforeach; ?>
              <?php foreach ($num_courses as $num_courses): ?>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="<?php echo htmlspecialchars($num_courses['total_courses']); ?>" data-speed="1000"></h2>
                  <p class="count-text ">Total Courses</p>
                </div>
              </div>
              <?php endforeach; ?>
              <?php foreach ($num_candidats as $num_candidats): ?>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="<?php echo htmlspecialchars($num_candidats['total_candidats']); ?>" data-speed="1000"></h2>
                  <p class="count-text ">Total Candidats</p>
                </div>
              </div>
              <?php endforeach; ?>
              <?php foreach ($num_Teachers as $num_Teachers): ?>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="<?php echo htmlspecialchars($num_Teachers['total_teachers']); ?>" data-speed="1000"></h2>
                  <p class="count-text ">Total Teachers</p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>