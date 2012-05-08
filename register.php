<?php
session_start();

if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) && !empty($_POST['licenseNumber']) && !empty($_POST['birthDate'])) {
    require_once 'classes/user.class.php';

    try {
        $user = new User();

        $user -> Email = $_POST['email'];
        $user -> Name = $_POST['name'];
        $user -> FirstName = $_POST['firstName'];
	$user -> Sex = $_POST['sex'];
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
				<form method="POST" id="regForm" action="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']; ?>">
					<fieldset>
						<legend>Register</legend>
						<ul>
							<li>
								<label for="name">Last name: </label>
								<input type="text" name="name" id="name" />
							</li>
							<li>
								<label for="firstName">First name: </label>
								<input type="text" name="firstName" id="firstName" />
							</li>
							<li>
								<label for="sex">Geslacht:</label>
								<select name="sex">
									<option value="M">Male</option>
									<option value="F">Female</option>
								</select>
								<!--<label for="sex">Sex: </label>
								<input type="text" name="sex" id="sex" />-->
							</li>
							<li>
								<label for="email">E-mail: </label>
								<input type="email" id="email" name="email" />
							</li>
							<li>
								<label for="password">Password: </label>
								<input type="password" name="password" id="password" />
							</li>
							<li>
								<label for="passwordConfirm">Confirm password: </label>
								<input type="password" name="passwordConfirm" id="passwordConfirm" />
							</li>
							<li>
								<label for="licenseNumber">License number: </label>
								<input type="text" name="licenseNumber" id="licenseNumber" />
							</li>
							<li>
								<label for="birthDate">Birth Date: </label>
								<input type="text" id="birthDate" name="birthDate" />
							</li>
							<li>
								<input type="submit" value="Register" class="btn-info" />
							</li>
						</ul>
					</fieldset>
				</form>
			</section>
			<div id="information">
				<h1>What to expect?</h1>
				<ol>
					<li>Keep <span>track</span> of all your personal times,</li>
					<li>Earn <span>achievements</span> by completing certain goals,</li>
					<li><span>Define</span> your own goals,</li>
					<li><span>Compare</span> yourself to other registered users,</li>
					<li>And <span>much</span> more!</li>
				</ol>
			</div>

		</div>
		<footer>

		</footer>
	</body>
</html>
