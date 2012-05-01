<?php

session_start();

if (!empty($_SESSION['userId']))
    header("Location: ./");

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    require_once ('classes/database.class.php');
    require_once ('classes/user.class.php');

    $user = new User();
    $user -> logIn($_POST['email'], $_POST['password']);

    $db = new Database();
    //echo $db->selectUserLogin($_POST['email'], $_POST['password']);

}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<?php
        include_once ('includes/includeHead.php');
		?>
		<title>Login | <?php echo siteName; ?></title>

	</head>
	<body>
		<?php
        include_once ('includes/includeHeader.php');
		?>
		<div class="wrapper">
			<?php
            include_once ('includes/includeNavigation.php');
			?>
			<section>
				<form method="POST" action="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']; ?>">
					<fieldset>
						<legend>
							Log in!
						</legend>
						<label for="email">E-mail: </label>
						<input type="email" id="email" name="email" />
						<label for="password">Password: </label>
						<input type="password" name="password" id="password" />
						<span>
							<input type="submit" value="Log in!" class="btn-info" />
							<a href="register">Register</a></span>
					</fieldset>
				</form>
			</section>

		</div>
		<footer>

		</footer>
	</body>
</html>
