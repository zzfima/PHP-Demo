<?php
namespace db_helper {
    class sqliteWrapper
    {
        /**
         * Connect to db
         * @return \mysqli
         */
        function connect_to_db()
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
         */
        function get_current_user($conn)
        {
            $sql = "SELECT CURRENT_USER()";
            $result = mysqli_query($conn, $sql);
            $user_result = $result->fetch_array()[0] ?? '';
            return $user_result;
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
} ?>