<!DOCTYPE html>
<html>
<head>
	<title>CRUD with ajax</title>
	<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>  
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>
	<h1 style="text-align: center;">CRUD with ajax</h1>
	<div id="data" title="Add new record">
		<form>
			<input type="text" id="name"><br><br>
			<input type="text" id="phone"><br><br>
			<input type="text" id="email"><br><br>
			<button id="insert">Insert</button>
		</form>
	</div>
	<div id="editeddata" title="Edit record">
		<form>
			<input type="text" id="editname"><br><br>
			<input type="text" id="editphone"><br><br>
			<input type="text" id="editemail"><br><br>
			<button id="edit">Edit</button>
		</form>
	</div>
	<div style="margin: auto; width: 50%; border: 3px solid green; padding: 10px;" id="database"></div>
</body>
</html>

<script type="text/javascript">
	var eid;
	$(document).ready(function()
	{
		setInterval(function(){
			fetch_data();
		}, 1000);
		$("#data").dialog({
			autoOpen: false,
		});
		$("#editeddata").dialog({
			autoOpen: false,
		});
		$(document).on('click', '#button', function(){
			$("#data").dialog('open');
		});
		function fetch_data(){
			$.ajax({
				url:"read.php",
				method:"POST",
				success:function(data){
					$("#database").html(data);
				}
			});
		}
		$("#insert").click(function(){
			var name = $("#name").val();
			var phone = $("#phone").val();
			var email = $("#email").val();
			$.ajax({
				url:"insert.php",
				method:"POST",
				data:{name:name,phone:phone,email:email},
			});
		});
		$(document).on('click', '#delete', function(){
			var id = $(this).data('id');
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{id:id},
			});
			alert("Deleted");
       });
		$(document).on('click', '#update', function(){
			$("#editeddata").dialog('open');
			eid = $(this).data('id');
       });
		$(document).on('click', '#edit', function(){

			var name = $("#editname").val();
			var phone = $("#editphone").val();
			var email = $("#editemail").val();
		    $.ajax({
				url:"update.php",
				method:"POST",
				data:{eid:eid,name:name,phone:phone,email:email},
			});
			alert("Edited successfully");
       });
	});
</script>