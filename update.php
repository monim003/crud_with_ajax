<?php
include 'connect.php';

$id = $_POST['eid'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$query = "UPDATE crud SET name='$name',phone='$phone',email='$email' WHERE id='$id'";

mysqli_query($con,$query);

?>