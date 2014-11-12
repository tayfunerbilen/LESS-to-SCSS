<?php

require 'less_to_scss.php';

$file = file_get_contents(dirname(__DIR__) . '/assets/less/custom.less');
$output = Convert::less_to_scss($file);

echo $output;

?>
