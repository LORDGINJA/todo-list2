<<!DOCTYPE html>
<html>
<head>
	<title>Todo-Lists</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>	
	<div class="wrap">
		<div class="task-list">
			<ul>
				<?php 
					// inserts connect.php file into this div
					require("includes/connect.php"); 
				?>
			</ul>
		</div>
	</div>
	<!-- inserts a box for inserting text -->
	<form class="add-new-task words" autocomplete = "off">
		<input class="words" type="text" name="new-task" placeholder="Add new item..."/> 
	</form>
</body>
</html>