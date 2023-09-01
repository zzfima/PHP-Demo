<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Simple hello world</title>
</head>

<body>
  <?php
  require_once("db_functions.php");
  $mysqliteWrapper = new mysqlite\mysqliteWrapper();

  //connect to mysqldb
  [$serverName, $userName, $password] = $mysqliteWrapper->get_credentials();
  $conn = new mysqli($serverName, $userName, $password);

  //get current user
  $user_result = $mysqliteWrapper->get_current_user($conn);
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