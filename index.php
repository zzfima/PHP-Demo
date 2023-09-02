<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>PHP functionality</title>
</head>

<body>
  <?php

  //mysql
  require_once("mysql_functions.php");

  $dbWrapper = new db_helper\mysqlWrapper();
  $conn = $dbWrapper->connect_to_db();
  $user_result = $dbWrapper->get_current_user($conn);
  echo ("CURRENT_USER: $user_result<br>");
  echo 'is db exists: ', $dbWrapper->is_db_exists($conn, "myDB"), "<br>";
  if ($dbWrapper->is_db_exists($conn, "myDB") == false) {
    try {
      $dbWrapper->create_db($conn, "myDB");
    } catch (Exception $e) {
      echo 'Caught exception: ', $e->getMessage(), "<br>";
    }
  }
  $dbWrapper->close_db_connection($conn);

  //sqlite
  require_once("sqlite_functions.php");

  $dbWrapper = new db_helper\sqliteWrapper('ToolsInformationSystemRepo.db');
  $dbWrapper->display_remote_machines();
  $dbWrapper->close_db_connection();

  //run python
  $output = exec("python op1.py");
  echo "121 divided by 4 is <br>";
  echo "<h1>$output</h1>"; ?>
</body>

</html>