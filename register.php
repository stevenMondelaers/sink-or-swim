<?php
session_start();

if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) && !empty($_POST['licenseNumber']) && !empty($_POST['birthDate'])) {
    require_once 'classes/user.class.php';

    try {
        $user = new User();

        $user -> Email = $_POST['email'];
        $user -> Name = $_POST['name'];
        $user -> FirstName = $_POST['firstName'];
        $user -> Password = $_POST['password'];
        $user -> PasswordConfirm = $_POST['passwordConfirm'];
        $user -> LicenseNumber = $_POST['licenseNumber'];
        $user -> Birthdate = $_POST['birthDate'];

        $user -> register();
        $feedback = "Success";

    } catch (exception $e) {
        $feedback = $e->getMessage();
    }

}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<?php
        include_once ('includes/includeHead.php');
		?>
		<title>Register | <?php echo siteName; ?></title>

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
							Register
						</legend>
						<label for="email">E-mail: </label>
						<input type="email" id="email" name="email" />
						<label for="name">Name: </label>
						<input type="text" name="name" id="name" />
						<label for="firstName">First name: </label>
						<input type="text" name="firstName" id="firstName" />
						<label for="password">Password: </label>
						<input type="password" name="password" id="password" />
						<label for="passwordConfirm">Confirm password: </label>
						<input type="password" name="passwordConfirm" id="passwordConfirm" />
						<label for="licenseNumber">License number: </label>
						<input type="text" name="licenseNumber" id="licenseNumber" />
						<label for="birthDate">Birth Date: </label>
						<input type="text" id="birthDate" name="birthDate" />
						<input type="submit" value="Register" class="btn-info" />
					</fieldset>
				</form>
			</section>

		</div>
		<footer>

		</footer>
	</body>
</html>
