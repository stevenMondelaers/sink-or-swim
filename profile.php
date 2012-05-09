<?php
session_start();

include_once ('classes/database.class.php');

$db = new Database();

$iAfstand = 1;
if (!empty($_GET['afstand']))
    $iAfstand = $_GET['afstand'];

$rankings = $db -> selectPersonalRankings($_SESSION['userId'], $iAfstand);
$afstanden = $db -> selectDistances();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<?php
        include_once ('includes/includeHead.php');
		?>

		<title>Personal ranking | <?php echo siteName; ?></title>

		<script type="text/javascript">
			$(document).ready(function() {

				$("#btnFilter").hide();

				$("#drpAfstand").change(function() {

					var selectedDistance = $(this).val();

					$(this).parent().submit();

				});
			});
		</script>

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
						<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<select id="drpAfstand" name="afstand">
								<?php
while ($afstand = $afstanden -> fetch_array()) {
								?>
								<option value="<?php echo $afstand['AfstandID']; ?>" <?php
                                    if ($iAfstand == $afstand['AfstandID']) { echo "selected='selected'";
                                    }
 ?>><?php echo $afstand['Omschrijving']; ?></option>
								<?php
                                }
								?>
							</select>
							<br />
							<input type="submit" value="Filter!" id="btnFilter" class="btn-info" />
						</form>
					</li>
				</ul>

				<div id="times">
					<div class="left">
						
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
