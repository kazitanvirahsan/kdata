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
}