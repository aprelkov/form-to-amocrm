<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
$root=__DIR__.DIRECTORY_SEPARATOR;

require $root.'prepare.php'; # There will be carried out preparatory acts, declarations of functions, etc.
require $root.'auth.php'; # There will be user authentication
require $root.'account_current.php'; # Here we will receive information about account
require $root.'fields_info.php'; # Obtain information about the fields
require $root.'contacts_list.php'; # Obtain contact information
require $root.'lead_add.php'; # There will be adding a Lead
require $root.'contact_add.php'; # There will be adding a Contact linked with the Lead
?>
