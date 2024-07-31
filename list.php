<?php
session_start();
include 'config.php';

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    echo "Please log in to view your orders.";
    exit();
}

$user_id = $_SESSION['id'];

// Prepare and execute the query to fetch the user's orders
$sql = "SELECT id_ord, name, email, course, message, date_ordre, status FROM `order` WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container">
    <a href='profile.php'>Back to profile</a> 
        <h1 class="text-center">Your Orders</h1>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Message</th>
                        <th>Date Ordered</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['course']); ?></td>
                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                            <td><?php echo htmlspecialchars($row['date_ordre']); ?></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                            <td>
                                <?php if ($row['status'] == 'pending'): ?>
                                    <a href="cancel_order.php?id_ordre=<?php echo $row['id_ord']; ?>" class="btn btn-danger btn-sm">Cancel</a>
                                <?php elseif($row['status'] == 'pending'): ?>
                                    <a href="confirme_order.php?id_ordre=<?php echo $row['id_ord']; ?>" class="btn btn-accepter">Confirmer</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                You have no orders.
            </div>
        <?php endif; ?>
    </div>

    <?php
    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
    ?>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
