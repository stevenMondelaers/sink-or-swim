<?php
session_start();
include_once("classes/database.class.php");
$o_Record = new Database();
$Records = $o_Record->selectRecords();

?><!DOCTYPE html>
<html lang="en">
	<head>
		<?php
        include_once ('includes/includeHead.php');
		?>
		<title>Records | <?php echo siteName; ?></title>

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
				<div id="filterRec">
					<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<ul>
							<li>
								<select id="drpGeslacht" name="geslacht">
									<option value="M">Male</option>
									<option value="F">Female</option>
								</select>
							</li>
							<li>
								<select id="drpCourse" name="course">
									<option value="1">Short Course</option>
									<option value="2">Long Course</option>
								</select>
							</li>
						</ul>
					</form>
				</div>
				<table id="records">
                	<tr>
                		<th>Distance</th>
                		<th>Swimmer</th>
                		<th>Time</th>
                		<th>Date</th>
                		<th>Place</th>
                		<th>Competition</th>
                	</tr>
	                <?php
						while($n = $Records->fetch_assoc())
						{
							$listRec = "<tr>";
							$listRec.=		"<td id='omschrijving'>".$n['Omschrijving']."</td>";
							$listRec.=		"<td id='zwemmerNaam'><a href='profile?profileId=".$n['ZwemmerID']."'>".$n['Naam'].", ".$n['Voornaam']."</a></td>";
							$listRec.=		"<td id='zwemmerTijd'>".$n['Tijd']."</td>";
							$listRec.=		"<td id='zwemmerDatum'>".$n['Datum']."</td>";
							$listRec.=		"<td id='zwemmerPlaats'>".$n['Plaats']."</td>";
							$listRec.=		"<td id='zwemmerCompetitie'>".$n['competition']."</td>";
							$listRec.= "</tr>";
							echo $listRec;
						}
					?>
				</table>
			</section>

		</div>
		<footer>

		</footer>
	</body>
</html>
