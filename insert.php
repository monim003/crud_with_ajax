<?php

include 'connect.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$query = "INSERT INTO crud(name,phone,email) VALUES('$name','$phone','$email')";

$res = mysqli_query($con,$query);

?>