<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//yes upload berror_reporting(E_ALL);


include('helpers.php');
include('p3.php');
//include('file_upload.php');
check_post_only();
$params = process_parameters();
//include('file_upload.php');
validate_data($params);
store_data_in_db($params);

include('confirmation.php');
?>    
