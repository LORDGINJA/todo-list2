<!DOCTYPE html>
<html>
<head>
	<title>Todo-List2</title>
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