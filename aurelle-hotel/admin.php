<?php
$connection = new mysqli("localhost", "root", "", "aurelle-hotel");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM bookings";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Bookings</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Customer Bookings</h1>

    <table>
        <tr>
            <th>Name</th><th>Email</th><th>Check-in</th><th>Check-out</th><th>Room Type</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['checkin']}</td>
                        <td>{$row['checkout']}</td>
                        <td>{$row['room']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No bookings found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
