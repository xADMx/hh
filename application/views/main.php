<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?PHP echo $title;?></title>
</head>
<body>

<?PHP
$this->load->view($page);
?>

</body>
</html>