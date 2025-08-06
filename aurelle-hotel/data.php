<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "aurelle-hotel");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name     = $_POST["name"];
    $email    = $_POST["email"];
    $checkin  = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $room     = $_POST["room"];

    $sql = "INSERT INTO admin_booking (name, email, checkin, checkout, room)
            VALUES ('$name', '$email', '$checkin', '$checkout', '$room')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "room" => $room]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }

    $conn->close();
} else {
    echo json_encode(["status" => "invalid"]);
}
?>
