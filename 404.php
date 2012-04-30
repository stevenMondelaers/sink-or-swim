<?php
session_start();
$errorPageUrl = $_SERVER["PHP_SELF"];
$pos = strrpos($errorPageUrl, ".php");
$errorPageUrl = substr($errorPageUrl, 0, $pos);

if ($_SERVER['REQUEST_URI'] != $errorPageUrl)
    header("Location: " . $errorPageUrl);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
        <?php
          include_once('includes/includeHead.php');
        ?>
		<title>Page not found | <?php echo siteNamek; ?></title>

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
				<div class="pageNotFoundError">
					<!--Onze excuses, er is iets fout gegaan :(-->
					<img src="img/404.png" alt="404" />
					<p>
						The page you requested doesn't exist
					</p>
				</div>

			</section>

		</div>
		<footer>

		</footer>
	</body>
</html>
