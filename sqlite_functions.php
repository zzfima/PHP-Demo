<?php
namespace db_helper {

    /**
     * Wrapper for sqlite db
     */
    class sqliteWrapper extends \SQLite3
    {
        function __construct($db_file)
        {
            $this->open($db_file);
        }

        /**
         * Closing connection
         */
        function close_db_connection()
        {
            $this->close();
        }

        function display_remote_machines()
        {
            $sql = <<<EOF
            SELECT * from RemoteMachine;
      EOF;

            $ret = $this->query($sql);
            while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                echo "Id = " . $row['Id'] . "<br>";
                echo "IPAddress = " . $row['IPAddress'] . "<br>";
                echo "HostName = " . $row['HostName'] . "<br>";
            }
        }
    }
}