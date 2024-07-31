<?php  
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $message = $_POST['message'];
    $date_ordre = date("Y-m-d H:i:s"); 

    // Check if the user exists
    $check_query = $conn->prepare("SELECT id FROM clients WHERE name = ? AND email = ?");
    $check_query->bind_param("ss", $name, $email);
    $check_query->execute();
    $check_query->store_result();
    $check_query->bind_result($user_id);
    $check_query->fetch();

    if ($check_query->num_rows > 0) {
        // Fetch the course price from the courses table
        $price_query = $conn->prepare("SELECT price FROM courses WHERE course = ?");
        $price_query->bind_param("s", $course);
        $price_query->execute();
        $price_query->bind_result($course_price);
        $price_query->fetch();
        $price_query->close();

        // Insert the order along with the course price
        $sql = "INSERT INTO `order` (id_user, name, email, course, message, date_ordre, course_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
        $stmt->bind_param('isssssd', $user_id, $name, $email, $course, $message, $date_ordre, $course_price);
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

        $stmt->close();
    } else {
        echo "Username or email does not exist. Please choose a different one or register.";
    }

    $check_query->close();
}

$conn->close();
?>
