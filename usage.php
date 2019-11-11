<?php
require_once('Sanitizer.php');
use unidataSanitizer\Sanitizer;

// output = name
echo Sanitizer::sanitizeFileName('=name');

// output = Brayn
echo Sanitizer::sanitizeValue('<p>Tom</p>');


// output = ([0] => Tom [1] => Cruise)
print_r(Sanitizer::sanitizeValues(array('<p>Tom</p>','<p>Cruise</p>')));