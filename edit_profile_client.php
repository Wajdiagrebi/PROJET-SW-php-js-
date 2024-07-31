<?php
session_start();
include 'config.php';

// Check if the user session is set

// Fetch user information from the session
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$id = $_SESSION['id'];

// Fetch user data from the database
$sql = "SELECT * FROM clients WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_email'])) {
        $new_email = $_POST['email'];
        $sql = "UPDATE clients SET email = '$new_email' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Email updated successfully.</div>";
            header("Location: profile.php");
        } else {
            echo "<div class='alert alert-danger'>Error updating email: " . $conn->error . "</div>";
        }
    } elseif (isset($_POST['update_password'])) {
        $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE clients SET password = '$new_password' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Password updated successfully.</div>";
            header("Location: profile.php");
        } else {
            echo "<div class='alert alert-danger'>Error updating password: " . $conn->error . "</div>";
        }
    }
    elseif (isset($_POST['update_name'])) {
        $new_name = $_POST['name'];
        $sql = "UPDATE clients SET name = '$new_name' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Name updated successfully.</div>";
            header("Location: profile.php");
        } else {
            echo "<div class='alert alert-danger'>Error updating name: " . $conn->error . "</div>";
        }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="profil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .profile-header {
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header text-center">
            <h2>Update Profile</h2>
            <h3>Welcome, <?php echo htmlspecialchars($name); ?></h3>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <form method="post" action="">
                    <div class="form-group">
                        <label for="name">New Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                        <div id="nameError" class="form-text text-danger"></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="update_name">Update Name</button>
                </form>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="update_email">Update Email</button>
                   
                </form>
                <br>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="update_password">Update Password</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script> <!-- Include any client-side validation if needed -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
