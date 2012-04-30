<?php
session_start();
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
