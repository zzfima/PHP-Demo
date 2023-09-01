<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Simple hello world</title>
</head>

<body>
  <?php
  require_once("db_functions.php");
  $dbWrapper = new db_helper\sqliteWrapper();

  $conn = $dbWrapper->connect_to_db();

  //get current user
  $user_result = $dbWrapper->get_current_user($conn);
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

  $dbWrapper->close_db_connection($conn);

  //run python
  $output = exec("python op1.py");
  echo ("121 divided by 4 is ");
  echo ("<h1>$output</h1>"); ?>
</body>

</html>