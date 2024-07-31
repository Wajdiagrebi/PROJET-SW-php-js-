<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare and bind the query to check if username or email already exists
    $check_query = $conn->prepare("SELECT id FROM admins WHERE name = ? OR email = ?");
    $check_query->bind_param("ss", $name, $email);
    $check_query->execute();
    $check_query->store_result();

    // Check if any rows were returned
    if ($check_query->num_rows > 0) {
        echo "Username or email already exists. Please choose a different one.";
    } else {
        // Set the default profile picture
        $picture = 'default.jpg';

        // Prepare the SQL statement for inserting a new user
        $sql = "INSERT INTO admins (name, email, password, profile_picture) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bind_param('ssss', $name, $email, $password, $picture);

        if ($stmt->execute()) {
            // Redirect to login page after successful registration
            header("Location: login.php");
        } else {
            // Display error message and log the error for debugging
            echo "Error: " . $stmt->error . "<br>";
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the check query statement
    $check_query->close();
}

// Close the database connection
$conn->close();
?>
