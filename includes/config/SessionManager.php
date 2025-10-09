<?php 

    class SessionManager {
        private static ?SessionManager $Instance = null;

        private function __construct() {
            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

        public static function getInstance(): SessionManager {
            if(self::$Instance === null) {
                self::$Instance = new SessionManager();
            }

            return self::$Instance;
        }

        public static function set($Key, $Value) {
            $_SESSION[$Key] = $Value;
        }

        public static function get($Key) {
            return $_SESSION[$Key] ?? null;
        }

        public static function has($Key) {
            return isset($_SESSION[$Key]);
        }
    }
?>