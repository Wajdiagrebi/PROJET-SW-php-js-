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
        $sql = "SELECT * FROM clients WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $client = $result->fetch_assoc();
                if (password_verify($password, $client['password'])) {
                    // Set session variables or cookies as needed
                    $_SESSION['id'] = $client['id'];
                    $_SESSION['client_email'] = $client['email'];
                    
                    header('Location: index.php');
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
<html>
<head>
    <meta charset="utf-8"/>
    <title>{SW} Tech_Site</title>
    <link rel="stylesheet" href="styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- ##### Navbar Area Start ##### -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
      <div class="container-fluid">
        <a href="index.html"><img src="img/logo.SWTECH.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about-us.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clients.html">Clients</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="register.php">Sign in</a>
            </li>
            <?php if (!isset($_SESSION['id'])): ?>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Nav End -->

    <!-- ##### Login Area Start ##### -->
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
                                    </br>
                                    <p>Pas encore inscrit? <a href="register.php">S'inscrire</a></p>
                                   
                                    <p>Pas encore inscrit? <a href=" ajout.php">S'inscrire</a></p>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div>
            <h3>{SW} Tech</h3>
            <p>Rue Srf, Lac2, Tunis, Tunisie</p>
            <p>(+216) 71 000 000</p>
            <p>office@swtech.com</p>                   
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
</body>
</html>
