<?php
 include 'config.php'; 

$id_ordre = $_GET['id_ord'];
$sql = "UPDATE ordre SET status = 'rejected' WHERE id_ord = $id_ord";

if ($conn->query($sql) === TRUE) {
    echo "Order rejected successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<a href="admin_liste_ordre.php">Back to Orders List</a>
