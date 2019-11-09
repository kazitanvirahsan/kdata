<?php
require_once('Sanitizer.php');
use unidataSanitizer\Sanitizer;
echo Sanitizer::sanitizeFileName('=name');