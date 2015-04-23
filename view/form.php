<?php
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

<h1>Create A Blog Post</h1>
<!-- sends post data to create-post.php and echoes the data -->
<form method = "post" action = "<?php echo $path . "controller/create-post.php"; ?>"> 
	<div id="title">
		<!-- labels title box -->
		<label for="title"> Title: </label> 	
		<!--	where title is inserted   -->
		<input type="text" name="title"/>	
	</div>

	<div id="post">
		<!-- labels post box -->
		<label for="post"> Post: </label>  
		<!-- where post text is inserted -->
		<textarea name="post"></textarea> 
	</div>
	<div>
		<!-- Inserts a submit button in the form page -->
		<button type="submit" class="btn btn-primary btn-lg" class="headingbutton" data-toggle="modal" data-target="#myModal">
			Submit
		</button>
	</div>
</form>