<?php

include 'connect.php';

$query = "SELECT * FROM crud";

$res = mysqli_query($con,$query);

$output = '<button style="float: right;" id="button">Add</button>';

$output .= '<table style="margin:auto;">
<tr>
<td>Name</td>
<td>Phone</td>
<td>Email</td>
<td>Action</td>
</tr>';

foreach ($res as $row)
{
	$output .= '<tr>
	<td>'.$row['name'].'</td>
	<td>'.$row['phone'].'</td>
	<td>'.$row['email'].'</td>
	<td><button id="delete" data-id="'.$row['id'].'">Delete</button><button id="update" data-id="'.$row['id'].'">Update</button></td>
	</tr>';
	$output .='<br>';
}

$output .= '</table>';
echo $output;

?>