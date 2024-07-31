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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $date_course = $_POST['date_course'];
    $duration = $_POST['duration'];
    $image = $_FILES['image']['name'];
    $target_dir = "assets/images/";
    $target_file = $target_dir . basename($image);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert data into the database
            $sql = "INSERT INTO courses (course, author, category, price, date_course, duration, image_info) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssdsis", $course_name, $author, $category, $price, $date_course, $duration, $image);

            if ($stmt->execute()) {
                echo "The course has been added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}

$conn->close();
?>

