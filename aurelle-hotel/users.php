<?php
// 1. Sambung ke database
$connection = new mysqli("localhost", "root", "", "aurelle-hotel");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// 2. Ambil semua pengguna
$sql = "SELECT id, name, email, created_at FROM users";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Senarai Pengguna Berdaftar</title>
    <style>
        body { font-family: Arial; background-color: #f8f8f8; }
        h2 { color: #333; }
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #6a1b9a; color: white; }
    </style>
</head>
<body>

<h2 align="center">Senarai Pengguna Berdaftar</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Tarikh Daftar</th>
    </tr>

    <?php
    // 3. Paparkan data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['created_at']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tiada pengguna lagi.</td></tr>";
    }

    $connection->close();
    ?>
</table>

</body>
</html>
