<?php
require('connection.inc.php');
require('functions.inc.php');
$name = get_safe_value($con, $_POST['name']);
$email = get_safe_value($con, $_POST['email']);
$phone = get_safe_value($con, $_POST['phone']);
$message = get_safe_value($con, $_POST['message']);
$added_on = date('Y-m-d H:I:S');
mysqli_query($con,"insert into contact_us(name,email,phone,comment,added_on) values('$name','$email','$phone','$message','$added_on')");
echo("Thank you for your query");
// header('location: contact_us.php');
?>
