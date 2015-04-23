<?php
	//allows navigation.php to acces config.php's contents
	require_once(__DIR__ . "/../model/config.php"); 
	require_once(__DIR__ . "/../controller/login-verify.php");
	//runs if the user hasn't logged in
	if (!authenticateUser()) {
		//sends the user back to the home page
		header("Location: " . $path . "home.php");
		//eliminate the page from loading
		die();
	}
?>
<nav>
	<ul>
		<!-- links the config file to the home page -->
		<button type="button" class="btn btn-default btn-lg navbutton">
			<a href="<?php echo $path . "post.php"?>"> Blog Post form </a>
		</button>
	</ul>

</nav>
				
