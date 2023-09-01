<?php
namespace mysqlite {
    class mysqliteWrapper
    {
        function get_credentials()
        {
            //mysqlite connection
            $serverName = "localhost";
            $userName = "root";
            $password = "ExTuHaPQ2Kh";

            return [$serverName, $userName, $password];
        }

        function get_current_user($conn)
        {
            $sql = "SELECT CURRENT_USER()";
            $result = mysqli_query($conn, $sql);
            $user_result = $result->fetch_array()[0] ?? '';
            return $user_result;
        }
    }
} ?>