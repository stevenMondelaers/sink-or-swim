<?php
session_start();

include_once ('classes/database.class.php');

$db = new Database();
$rankings = $db -> selectPersonalRankings($_SESSION['userId']);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<?php
        include_once ('includes/includeHead.php');
		?>

		<title>Personal ranking | <?php echo siteName; ?></title>

	</head>
	<body>
		<?php
        include_once ('includes/includeHeader.php');
		?>

		<?php
        include_once ('includes/includeFooter.php');
		?>

		<?php
        include_once ('includes/includeHeader.php');
		?>
		<div class="wrapper">
			<?php
            include_once ('includes/includeNavigation.php');
			?>
			<section class="wrapper">
				<ul>
					<li>
						<?php
                        echo $_SESSION['userFirstName'] . " " . $_SESSION['userName'];
						?>
					</li>
					<li>
						<?php
                        echo $_SESSION['userBirthDate'];
						?>
					</li>
					<li>
						<h3>Personal rankings for 50m freestyle</h3>
					</li>
				</ul>

				<div id="times">
					<div class="left">
						<section class="timesHeading">
							<span>Long course (50m)</span>
							<a href="#"><img src="img/graph.png" alt="Graph" /></a>
						</section>
						<table class="times">
							<?php
while($ranking = $rankings->fetch_array()){
							?>
							<tr>
								<td><a href="#"><?php echo $ranking['Tijd']; ?></a></td>
								<td><?php echo $ranking['Datum']; ?></td>
								<td><?php echo $ranking['Plaats']; ?></td>
								<td></td>
							</tr>
							<?php
                            }
							?>
						</table>
					</div>
				</div>

			</section>

		</div>
		<?php
        include_once ('includes/includeFooter.php');
		?>
	</body>
</html>
