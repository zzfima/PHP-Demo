<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Simple hello world</title>
</head>

<body>
  <?php
  //SQLLite connection
  $serverName = "localhost";
  $userName = "root";
  $password = "ExTuHaPQ2Kh";

  // Create connection
  $conn = new mysqli($serverName, $userName, $password);

  //GET CURRENT_USER
  $sql = "SELECT CURRENT_USER()";
  $result = mysqli_query($conn, $sql);
  $user_result = $result->fetch_array()[0] ?? '';
  echo ("CURRENT_USER: $user_result<br>");

  try {
    // Create database
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
    } else {
      echo "Error creating database: " . $conn->error;
    }
  } catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
  }

  //close connection with mysql db
  $conn->close();

  //run python
  $output = exec("python op1.py");
  echo ("121 divided by 4 is ");
  echo ("<h1>$output</h1>"); ?>
</body>

</html>