<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Orders List</h1>
<a href='statistical.php'> statistical</A>

<?php
$sql = "SELECT * FROM ordre";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Ordre</th><th>Name</th><th>Email</th><th>Message</th><th>Course</th><th>Date</th><th>ID User</th><th>Status</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_ord"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["message"]."</td><td>".$row["course"]."</td><td>".$row["date_ordre"]."</td><td>".$row["id_user"]."</td><td>".$row["status"]."</td>";
        echo "<td><a href='accept_order.php?id_ordre=".$row["id_ord"]."'>Accept</a> | <a href='reject_order.php?id_ordre=".$row["id_ord"]."'>Reject</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>

