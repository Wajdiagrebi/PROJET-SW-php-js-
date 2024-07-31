<?php
include 'config.php'; 

$id_ordre = $_GET['id_ordre'];
$sql = "UPDATE ordre SET status = 'accepted' WHERE id_ord = $id_ordre";

if ($conn->query($sql) === TRUE) {
    echo "Order accepted successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<a href="admin_liste_ordre.php">Back to Orders List</a>
