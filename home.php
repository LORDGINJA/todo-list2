<?php
	require_once(__DIR__ . "/controller/login-verify.php");
	//allows home.php to acces header.php's contents
	require_once(__DIR__ . "/index.php");  
	//only displays the nav if the authenticateUser function runs treu
	if (authenticateUser()) {
		//allows home.php to acces navigation.php's contents
		require_once(__DIR__ . "/view/navigation.php");
	}
	//allows home.php to acces create-db.php's contents
	//require_once(__DIR__ . "/controller/create-db.php");  
	//displays already posted posts on index page
	require_once(__DIR__ . "/controller/read-posts.php");
	//allows home.php to acces footer.php's contents
	require_once(__DIR__ . "/view/footer.php");
?>




