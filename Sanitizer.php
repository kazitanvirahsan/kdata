<?php
namespace unidataSanitizer;
class Sanitizer
{
    /**
     * Returns a safe filename, for a given platform (OS), by
     * replacing all dangerous characters with an underscore.
     *
     * @param string $filename The source filename
     * @return string A safe version of the input
     * filename
     */
    public static function sanitizeFileName($filename)
    {
        return preg_replace("/[^a-z0-9\.]/", "_", strtolower($filename));
    }


    /**
     * Returns a safe string by removing all the special characters & tags from it.
     * 
     * @param string $value The input variable
     * @return string A safe version of the input variable
     * filename
     */
    public static function sanitizeValue($value)
    {
        return filter_var($value, FILTER_SANITIZE_STRING);
    }

    /**
     * Returns a safe array of strings by removing all the special characters & tags from it.
     *
     * @param array $values The input variables as array
     * @return string A safe version of the input variable
     * filename
     */
    public static function sanitizeValues($values)
    {
        $values_sanitize = [];
        foreach($values as $value) {
            array_push($values_sanitize, filter_var($value, FILTER_SANITIZE_STRING));
        }

        return $values_sanitize;
    }

}