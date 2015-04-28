<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/fin.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css.map">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css.map">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<meta name="viewport" content="width=device-width">
		<meta name="viewport" content="width=320">
		<meta charset="UTF-8">
		<title>Todo-List2</title>
	</head>

	<header>
		<h1>CONGRATULATIONS!</h1>
	</header>

	<body>

		<?php
			require_once(__DIR__ . "/../model/config.php");

			//store email, username, and password into the database
			$email = filter_input(INPUT_POST, "email" , FILTER_SANITIZE_EMAIL);
			$username = filter_input(INPUT_POST, "username" , FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, "password" , FILTER_SANITIZE_STRING);

			//creates the salt, which adds a bunch of random integers and letters to my password, making it harder to guess
			$salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";
			//combines the password and the salt to make an encrypted password
			$hashedPassword = crypt($password, $salt);
			//a query that inserts into the users' table
			$query = $_SESSION["connection"]->query("INSERT INTO listusers SET "
				//sets email
				. "email = '$email', "
				//sets username
				. "username = '$username', "
				//sets password
				. "password = '$hashedPassword', "
				//sets salt
				. "salt = '$salt'");

			//checks to see if the query is working
			if ($query) {
				echo "<div id='message'>";
				echo "You have successfully created the user: $username";
				echo "</div>";
			}
			//if the query isnt working, says why not
			else{
				echo "<p>" . $_SESSION["connection"]->error . "</p>";
			}

		?>

		<div class="links">
			<ul>
				<button type="button" class="btn btn-default btn-lg link button">
					<a href="<?php echo $path . "home.php"?>"><span class="glyphicon glyphicon-home "></span></p> Home </a>
				</button>
			</ul>
		</div>
	</body>
</html>