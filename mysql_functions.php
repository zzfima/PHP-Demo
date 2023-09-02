<?php
namespace db_helper {
    require_once("db_interfaces.php");
    /**
     * Wrapper for mysql db
     */
    class mysqlWrapper implements dbWrapper
    {
        /**
         * Connect to db
         * @return \mysqli
         */
        function connect_to_db(): \mysqli
        {
            //mysql connection
            $serverName = "localhost";
            $userName = "root";
            $password = "ExTuHaPQ2Kh";
            $conn = new \mysqli($serverName, $userName, $password);

            return $conn;
        }

        /**
         * Receive current user from db
         * @param \mysqli $conn
         * @return string
         */
        function get_current_user($conn): string
        {
            $sql = "SELECT CURRENT_USER()";
            $result = mysqli_query($conn, $sql);
            $user_result = $result->fetch_array()[0] ?? '';
            return $user_result;
        }

        /**
         * Create db
         * @param \mysqli $conn
         * @param string $dbName
         */
        function is_db_exists($conn, $dbName): bool
        {
            $sql = "SELECT count(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'";
            $result = $conn->query($sql);
            $res = $result->fetch_array()[0] == 1 ? true : false;
            return $res;
        }

        /**
         * Create db
         * @param \mysqli $conn
         * @param string $dbName
         */
        function create_db($conn, $dbName)
        {
            $sql = "CREATE DATABASE $dbName";
            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully<br>";
            } else {
                echo "Error creating database: " . $conn->error . "<br>";
            }
        }

        /**
         * Closing connection
         * @param \mysqli $conn
         */
        function close_db_connection($conn)
        {
            $conn->close();
        }
    }
}