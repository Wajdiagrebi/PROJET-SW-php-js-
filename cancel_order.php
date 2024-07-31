<?php
session_start();
include 'config.php';
$user_id = $_SESSION['id'];

// Get the order ID from the query string
$id_ordre = $_GET['id_ordre'];

// Update the order status to 'cancelled'
$sql = "UPDATE `order` SET status = 'cancelled' WHERE id_ord = ? AND id_user = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ii", $id_ordre, $user_id);

if ($stmt->execute()) {
    echo "Order cancelled successfully.";
} else {
    echo "Error cancelling order: " . $stmt->error;
}

$stmt->close();
$conn->close();

echo "<br><a href='list.php'>Back to Orders List</a>";
?>
