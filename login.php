<?php
session_start();

if (!empty($_SESSION['userId']))
    header("Location: ./");

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    require_once ('classes/database.class.php');
    require_once ('classes/user.class.php');

    $user = new User();
    $user -> logIn($_POST['email'], $_POST['password']);

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<?php
        include_once ('includes/includeHead.php');
		?>

		<title>Home | <?php echo siteName; ?></title>

	</head>
	<body>
		<?php
        include_once ('includes/includeHeader.php');
		?>
		<div class="wrapper">
			<?php
            include_once ('includes/includeNavigation.php');
			?>

			<section class="wrapper">
                
			</section>

		</div>
		<?php
        include_once ('includes/includeFooter.php');
		?>

	    <?php
	       include_once('includes/includeHeader.php');
	    ?>
	    <div class="wrapper">
	        <?php
	           include_once('includes/includeNavigation.php');
	        ?>
            <section class="wrapper">
                
                <?php
                    
                ?>

            </section>
            
	    </div>
	    <?php
	       include_once('includes/includeFooter.php');
	    ?>

	</body>
</html>
