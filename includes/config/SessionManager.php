<?php 

    class SessionManager {
        private static ?SessionManager $Instance = null;

        private function __construct() {
            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

        public static function createUser(array $User) {
            self::getInstance();

            foreach($User as $Key => $Value) {
                $_SESSION[$Key] = $Value;
            }
            $_SESSION['logged_in'] = true;
        }

        public static function destroy() {
            self::getInstance();

            session_unset();
            session_destroy();
        }

        public static function getInstance(): SessionManager {
            if(self::$Instance === null) {
                self::$Instance = new SessionManager();
            }

            return self::$Instance;
        }

        public static function set($Key, $Value) {
            self::getInstance();
            $_SESSION[$Key] = $Value;
        }

        public static function get($Key) {
            self::getInstance();
            return $_SESSION[$Key] ?? null;
        }

        public static function has($Key) {
            self::getInstance();
            return isset($_SESSION[$Key]);
        }
    }
?>