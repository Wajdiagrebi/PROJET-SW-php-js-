<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to check if the account exists
    $sql = "SELECT * FROM clients WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Account exists, fetch user data
        $user = $result->fetch_assoc();
        $_SESSION['user_name'] = $user['name'];  // Assuming 'name' is a column in the 'clients' table
        $_SESSION['user_email'] = $user['email'];
        header("Location: home.php");
    } else {
        // Account does not exist
        $error_message = "Invalid email or password";
        header("Location: login.html?error=" . urlencode($error_message));
    }

    $stmt->close();
}
$conn->close();
?>



