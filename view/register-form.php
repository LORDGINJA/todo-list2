<?php
	require_once(__DIR__ ."/../model/config.php");
?>

<h1>REGISTER</h1>
<!-- goes to create-user page and displays whatevers there -->   <!-- used to create users -->
<form class="register" method="post" action="<?php echo $path . "controller/create-user.php";?> ">
	<div class="fillin">
		<!-- input box for user's email -->
		<label class="inputlabel" for="email">Email: </label>
		<input type="text" name="email"/>
	</div>
	<div class="fillin">
		<!-- input box for user's username  -->
		<label class="inputlabel" for="username">Username: </label>
		<input type="text" name="username" />
	</div>
	<div class="fillin">
		<!-- input box for user's password -->
		<label class="inputlabel" for="password">Password: </label>
		<input type="password" name="password"/>
	</div>
	<div>
		<!-- button to submit previous three input values -->
		<button type="submit" class="btn btn-primary btn-lg button" data-toggle="modal" data-target="#myModal">
			Submit
		</button>
	</div>
</form>

<footer>	
	Created by Maxwell Karp
</footer>