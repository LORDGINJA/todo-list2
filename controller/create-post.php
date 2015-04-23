<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/create.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css.map">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css.map">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<meta name="viewport" content="width=device-width">
		<meta name="viewport" content="width=320">
		<meta charset="UTF-8">
		<title>Blogs</title>
	</head>
	
	<body id="viewbody">

		<?php
			//gives access to variables listed in $connection
			require_once(__DIR__ . "/../model/config.php"); 
			require_once(__DIR__ . "/../controller/login-verify.php");
			//runs if the user hasn't logged in
			if (!authenticateUser()) {
				//sends the user back to the home page
				header("Location: " . $path . "home.php");
				//eliminate the page from loading
				die();
			}
			

			//stores title and makes it harder to hack;
			$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);  
			//stores post and makes it harder to hack
			$post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);	
			//stores the current date
			$date = new DateTime( 'today');
			//stores the current time of the Los Angeles, America timezone
			$time = new DateTime( 'America/Los_Angeles');
			//stores title and post into database
			$query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post' "); 
			
			//runs if the query was stored
			if ($query) {	

				echo "<div>";
				//echoes out that the title was successfully inserted and the name of the title
				echo "<h1>$title</h1>";	
				//echoes out the date and time of when the post was submitted
				echo "Posted on: " . $date->format('m/D' . ' ' . 'd/Y') . " at " . $time->format('g:i');
				echo "<br>";
				echo "<p>$post</p>";
				echo "</div>";

			}
			
			//runs if the query wasn't stored
			else{  
				echo "<p>" . $_SESSION["connection"]->error . "</p>";
			}

		?>

		<div class="links">
			<button type="button" class="btn btn-default btn-lg">
				<a href="<?php echo $path . "home.php"?>"><span class="glyphicon glyphicon-home "></span></p> Home </a>
			</button>
		</div>
	</body>
</html>
