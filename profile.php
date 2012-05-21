<?php
session_start();

if (empty($_SESSION['userId'])) {
	header("Location: ./");
}

include_once ('classes/database.class.php');
include_once ('classes/user.class.php');

$db = new Database();

$iAfstand = 1;
if (!empty($_GET['afstand']))
	$iAfstand = $_GET['afstand'];

$profileId = $_SESSION['userId'];
if (!empty($_GET['profileId']))
	$profileId = $_GET['profileId'];
$rankings1 = null;
$rankings2 = null;

try {
	$rankings1 = $db -> selectPersonalrankings($profileId, $iAfstand, 1);
} catch (exception $e) {

}

try {
	$rankings2 = $db -> selectPersonalrankings($profileId, $iAfstand, 2);
} catch (exception $e) {

}

try {
	$user = new User();
	$userData = $user -> getUserData($profileId);
} catch(exception $e) {
	$feedback = $e -> getMessage();
}

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
					<?php
if(isset($userData)){
while ($userA = $userData -> fetch_array()){
					?>
					<li>
						<h2><?php
						echo $userA['Voornaam'] . " " . $userA['Naam'];
						?></h2>
					</li>
					<li>
						<h4><?php
						echo $userA['Geboortedatum'];
						?></h4>
					</li>
					<li>
						<?php
						}
						}
						?>
						
						<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<input type="hidden" id="profileId" name="profileId" value="<?php echo $profileId; ?>" />
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
						<h4> Short course 25m </h4>
						<table class="times">
							<?php
if($rankings1){
							?>
							<thead>
							<tr>
								<th>Time</th>
								<th>Date</th>
								<th>Place</th>
								<th></th>
							</tr>
							</thead>
							<tbody id="shortCourse">
							<?php
while($ranking = $rankings1->fetch_array()){
							?>
							
							<tr>
								<td><a href="splittimes?id=" <?php $ranking['ResultaatID'] ?>> <?php
								if ((substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.'))) < 10 && (((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60) < 10) {
									$timeFormat = "0";
									$timeFormat .= (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')));
									$timeFormat .= ":";
									$timeFormat .= "0";
									$timeFormat .= ((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60;
									$timeFormat .= ".";
									$timeFormat .= substr($ranking['Tijd'], -2);
								} else if ((substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.'))) < 10) {
									$timeFormat = "0";
									$timeFormat .= (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')));
									$timeFormat .= ":";
									$timeFormat .= ((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60;
									$timeFormat .= ".";
									$timeFormat .= substr($ranking['Tijd'], -2);
								} else if ((((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60) < 10) {
									$timeFormat = (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')));
									$timeFormat .= "0";
									$timeFormat .= ":";
									$timeFormat .= ((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60;
									$timeFormat .= ".";
									$timeFormat .= substr($ranking['Tijd'], -2);
								} else {
									$timeFormat = (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')));
									$timeFormat .= ":";
									$timeFormat .= ((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60;
									$timeFormat .= ".";
									$timeFormat .= substr($ranking['Tijd'], -2);
								}
								echo $timeFormat;
								?></a></td>
								<td><?php echo $ranking['Datum']; ?></td>
								<td><?php echo $ranking['Plaats']; ?></td>
								<td class="medal"></td>
							</tr>
							
							<?php
							}
							}else {
							echo "Geen resultaten gevonden";
							}
							?>
							</tbody>
						</table>
					</div>

					<div class="right">

						<h4> Long Course 50m </h4>

						<table class="times">
							<?php
if($rankings2){
							?>
							<thead>
							<tr>
								<th>Time</th>
								<th>Date</th>
								<th>Place</th>
								<th></th>
							</tr>
							</thead>
							<tbody id="longCourse">
							<?php
while($ranking = $rankings2->fetch_array()){
							?>
							<tr>
								<td><a href="#"> <?php
								if ((substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.'))) < 10 && (((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60) < 10) {
									$timeFormat = "0";
									$timeFormat .= (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')));
									$timeFormat .= ":";
									$timeFormat .= "0";
									$timeFormat .= ((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60;
									$timeFormat .= ".";
									$timeFormat .= substr($ranking['Tijd'], -2);
								} else if ((substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.'))) < 10) {
									$timeFormat = "0";
									$timeFormat .= (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')));
									$timeFormat .= ":";
									$timeFormat .= ((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60;
									$timeFormat .= ".";
									$timeFormat .= substr($ranking['Tijd'], -2);
								} else if ((((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60) < 10) {
									$timeFormat = (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')));
									$timeFormat .= "0";
									$timeFormat .= ":";
									$timeFormat .= ((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60;
									$timeFormat .= ".";
									$timeFormat .= substr($ranking['Tijd'], -2);
								} else {
									$timeFormat = (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')));
									$timeFormat .= ":";
									$timeFormat .= ((($ranking['Tijd'] - substr($ranking['Tijd'], -2)) / 100 / 60) - (substr($ranking['Tijd'] / 100 / 60, 0, strrpos($ranking['Tijd'] / 100 / 60, '.')))) * 60;
									$timeFormat .= ".";
									$timeFormat .= substr($ranking['Tijd'], -2);
								}
								echo $timeFormat;
								?></a></td>
								<td><?php echo $ranking['Datum']; ?></td>
								<td><?php echo $ranking['Plaats']; ?></td>
								<td class="medal"></td>
							</tr>
							<?php
							}
							}else {
							echo "Geen resultaten gevonden";
							}
							?>
							</tbody>
						</table>
					</div>
					<div class="clearfix"></div>

				</div>

			</section>

		</div>
		<?php
		include_once ('includes/includeFooter.php');
		?>
	</body>
</html>
