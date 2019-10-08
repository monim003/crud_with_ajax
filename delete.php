<?php

include 'connect.php';

$id = $_POST['id'];

$query = "DELETE FROM crud WHERE id = '$id'";

mysqli_query($con,$query);

?>