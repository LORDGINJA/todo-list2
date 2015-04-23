<?php
	require_once(__DIR__ . "/model/config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Todo-List2</title>
		<!-- links main css file -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css.map">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	<header>
		<button type="button" class="btn btn-default btn-lg link">
			<a href="<?php echo $path . "register.php"?>"><span class="glyphicon glyphicon-home "></span></p> Register </a>
		</button>
		<button type="button" class="btn btn-default btn-lg link">
			<a href="<?php echo $path . "login.php"?>"><span class="glyphicon glyphicon-home "></span></p> Log-in </a>
		</button>
		<button type="button" class="btn btn-default btn-lg link">
				<a href="<?php echo $path . "controller/logout-user.php"?>"><span class="glyphicon glyphicon-log-out"></span></p> Logout </a>
		</button>
	</header>
	<body>
		<div class="wrap">
			<div class="task-list">
				<ul>
					<?php
						// inserts connect.php file into this div
						require("includes/connect.php"); 
						//creates variables
						$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
						//slects information from table and orders it from newest to latest
						$query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
						if ($result = $mysqli->query($query)) {
							$numrows = $result->num_rows;
							//runs if there is at least one row
							if ($numrows > 0) {
								//runs while there is a row
								while ($row = $result->fetch_assoc()) {
									//gets the row's name
									$task_id = $row['id'];
									//gets the row's data
									$task_name = $row['task'];
									//echoes out the name and data
									echo '<li class="words"><span>'. $task_name . '</span><img id="' . $task_id . '" class="delete-button" width="10px" src="images/close.svg"/></li>';
								}
							}
						}
					?>
				</ul>
			</div>
		</div>
		<!-- inserts a box for inserting text -->
		<form class="add-new-task words" autocomplete = "off">
			<input class="words" type="text" name="new-task" placeholder="Add new item..."/> 
		</form>
	</body>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
		//calls add_task function 
		add_task();
		//creates add_task function
		function add_task(){
			$('.add-new-task').submit(function(){
				var new_task = $('.add-new-task input[name=new-task]').val();

				if (new_task != '') {
					//goes to add-task.php
					$.post('includes/add-tasks.php', {task: new_task}, function(data){
						$('add-new-task input[name=new-task]').val();
						$(data).appendTo('.task-list ul').hide().fadeIn();
					});
				}
				return false;
			});
		}

		$('.delete-button').click(function(){
			var current_element = $(this);
			var task_id = $(this).attr('id');
			//calls delete-task.php
			$.post('includes/delete-task.php' , {id: task_id}, function(){
				//calls variables
				current_element.parent().fadeOut("fast", function(){
					$(this).remove();
				});
			});
		});
	</script>
</html>