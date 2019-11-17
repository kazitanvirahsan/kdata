<?php
require_once('Kdata.php');
use Kdata\Kdata;
$kdata = new Kdata();
$kdata->add_validation_rules(array('username' => 'required'));
if($kdata->execute(array('username' => ''))) {
	print_r($kdata->get_data());
} else {
	print_r($kdata->get_errors());
}


