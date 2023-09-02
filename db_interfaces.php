<?php

namespace db_helper {
    /**
     * Abstract Wrapper for db
     */
    interface dbWrapper
    {
        /**
         * Connect to db
         */
        public function connect_to_db();

        /**
         * Receive current user from db
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
         */
        public function close_db_connection($conn);
    }
}