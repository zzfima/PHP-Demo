<?php

namespace db_helper {
    /**
     * Abstract Wrapper for db
     */
    interface dbWrapper
    {
        /**
         * Connect to db
         * @return \mysqli
         */
        public function connect_to_db(): \mysqli;

        /**
         * Receive current user from db
         * @param \mysqli $conn
         * @return string
         */
        public function get_current_user($conn): string;

        /**
         * Create db
         * @param \mysqli $conn
         * @param string $dbName
         */
        public function is_db_exists($conn, $dbName): bool;

        /**
         * Create db
         * @param \mysqli $conn
         * @param string $dbName
         */
        public function create_db($conn, $dbName);

        /**
         * Closing connection
         * @param \mysqli $conn
         */
        public function close_db_connection($conn);
    }
}