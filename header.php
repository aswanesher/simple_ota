<?php 
include "config/db_config.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Travel Booking Form ( Hotel, Flight, Car, Cruises)</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Travel Booking Form ( Hotel, Flight, Car, Cruises)"/>
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' });
  });
</script>
</head>