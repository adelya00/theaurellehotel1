<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash untuk keselamatan

  $file = fopen("users.csv", "a");
  fputcsv($file, [$name, $email, $password]);
  fclose($file);

  echo "<h2>Account created successfully!</h2>";
  echo "<a href='index.html'>Back to Home</a>";
}
?>
