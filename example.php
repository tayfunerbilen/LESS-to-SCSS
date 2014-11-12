<?php

require 'less_to_scss.php';

$file = dirname(__DIR__) . '/assets/less/custom.less';
$output = less_to_scss($file);

?>
