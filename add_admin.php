<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate inputs
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
    $picture = '';

    // Check if any of the required fields are empty
    if ($name === null || $email === null || $password === null) {
        echo "All fields are required.";
        exit();
    }

    // Handling file upload
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['picture']['name']);
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
            $picture = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    // Check if the email already exists
    $checkEmailSql = "SELECT id FROM admin WHERE email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error_message = 'This email is already in use. Please choose another one.';
        } else {
            // Prepare and execute the query
            $sql = "INSERT INTO admin (name, email, password, picture) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param('ssss', $name, $email, $password, $picture);
                if ($stmt->execute()) {
                    echo "Admin added successfully!";
                    header('Location: admin.php');
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error preparing the query.";
            }
        }
        $stmt->close();
    } else {
        echo "Error preparing the email check query.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Add Admin</title>
    <link rel="stylesheet" href="styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-red {
            color: red;
        }
    </style>
</head>
<body>
    <!-- Form to add an admin -->
    <div class="container">
        <h2>Add Admin</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Photo</label>
                <input type="file" class="form-control" id="picture" name="picture">
            </div>
            <button type="submit" class="btn btn-primary">Add Admin</button>
            <?php
            if (!empty($error_message)) {
                echo '<p class="text-red">' . $error_message . '</p>';
            }
            ?>
        </form>
    </div>
</body>
</html>
