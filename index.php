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

  $user_result = $dbWrapper->get_current_user($conn);
  echo ("CURRENT_USER: $user_result<br>");

  try {
    $dbWrapper->create_db($conn, "myDB");
  } catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "<br>";
  }

  $dbWrapper->close_db_connection($conn);

  //run python
  $output = exec("python op1.py");
  echo "121 divided by 4 is <br>";
  echo "<h1>$output</h1>"; ?>
</body>

</html>