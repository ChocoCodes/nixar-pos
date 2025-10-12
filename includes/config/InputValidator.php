<?php 
    class InputValidator {
        /**
         * Trim and escape special HTML characters in a string.
         * @param mixed $Data
         * @return string
         */
        public static function sanitizeData($Data) {
            return htmlspecialchars(trim($Data));
        }

        public static function sanitizeArray($DataArray) {
            $Sanitized = [];

            foreach($DataArray as $Key => $Value) {
                $Sanitized[$Key] = is_array($Value) ? 
                    self::sanitizeArray($Value) : InputValidator::sanitizeData($Value);
            }

            return $Sanitized;
        }
    }

?>