<?php

namespace db_helper {
    /**
     * Wrapper for sqlite db
     */
    class sqliteWrapper
    {
        /**
         * Connect to db
         * @return \mysqli
         */
        function connect_to_db(): \mysqli
        {
            //sqlite connection
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