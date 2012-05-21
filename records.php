<?php
session_start();
include_once("classes/database.class.php");
$o_Record = new Database();

$Records = null;

$gender = "M";
$course = 1;
if(!empty($_POST['geslacht']) && !empty($_POST['course'])){
	$gender = $_POST['geslacht'];
	$course = $_POST['course'];
}

try {
	$Records = $o_Record->selectRecords($course, $gender);
}catch(exception $e){
	$feedback = $e->getMessage();
}


?><!DOCTYPE html>
<html lang="en">
	<head>
		<?php
        include_once ('includes/includeHead.php');
		?>
		<title>Records | <?php echo siteName; ?></title>

		<script type="text/javascript">
			$(document).ready(function() {

				$("#btnFilter").hide();
				
				$("select").change(function() {

					//$(this).parent().parent().parent().submit();
					
					var gender = $("#drpGeslacht").val();
					var course = $("#drpCourse").val();

					$.ajax({
						type : "POST",
						url : "ajax/filter_records.php",
						data : {
							gender : gender,
							course : course
						}
					}).done(function(fb){
						
						if(fb.message = "success"){
							$("tbody").html(fb.html);
						}else {
							$("#ajaxFeedback").html(fb.message);
						}
					});

				});
				
			});
		</script>

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
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<ul>
							<li>
								<select id="drpGeslacht" name="geslacht" class="drp">
									<option value="M" <?php if(!empty($_POST['geslacht']) && $_POST['geslacht'] == "M"){ echo "selected=selected";} ?>>Male</option>
									<option value="F" <?php if(!empty($_POST['geslacht']) && $_POST['geslacht'] == "F"){ echo "selected=selected";} ?>>Female</option>
								</select>
							</li>
							<li>
								<select id="drpCourse" name="course">
									<option value="1" <?php if(!empty($_POST['course']) && $_POST['course'] == 1){ echo "selected=selected";} ?>>Short Course</option>
									<option value="2" <?php if(!empty($_POST['course']) && $_POST['course'] == 2){ echo "selected=selected";} ?>>Long Course</option>
								</select>
							</li>
							<li>
								<input type="submit" value="Filter!" id="btnFilter" class="btn-info" />
							</li>
						</ul>
					</form>
					<div id="ajaxFeedback">
						
					</div>
				</div>
				<table id="records">
					<thead>
                	<tr>
                		<th>Distance</th>
                		<th>Swimmer</th>
                		<th>Time</th>
                		<th>Date</th>
                		<th>Place</th>
                		<th>Competition</th>
                	</tr>
                	</thead>
                	<tbody>
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
					</tbody>
				</table>
			</section>

		</div>
		<footer>

		</footer>
	</body>
</html>
