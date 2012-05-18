<?php
session_start();

if (!empty($_POST['competition'])) {
    require_once 'classes/time.class.php';

    try {
        $time = new Time();

        $time -> Competition = $_POST['competition'];
        $time -> Distance = $_POST['distance'];
		$time -> TimeFull = (($_POST['tijdHun']) + (100*$_POST['tijdSec']) + ((60*$_POST['tijdMin'])*100));
		$time -> ReactionFull = (($_POST['reactionHun']) + (100*$_POST['reactionSec']));
		$time -> Time50 = (($_POST['tijd50Hun']) + (100*$_POST['tijd50Sec']) + ((60*$_POST['tijd50Min'])*100));
		$time -> Time100 = (($_POST['tijd100Hun']) + (100*$_POST['tijd100Sec']) + ((60*$_POST['tijd100Min'])*100));
		$time -> Time200 = (($_POST['tijd200Hun']) + (100*$_POST['tijd200Sec']) + ((60*$_POST['tijd200Min'])*100));
		$time -> Time400 = (($_POST['tijd400Hun']) + (100*$_POST['tijd400Sec']) + ((60*$_POST['tijd400Min'])*100));
		$time -> Time800 = (($_POST['tijd800Hun']) + (100*$_POST['tijd800Sec']) + ((60*$_POST['tijd800Min'])*100));
		$time -> Time1500 = (($_POST['tijd1500Hun']) + (100*$_POST['tijd1500Sec']) + ((60*$_POST['tijd1500Min'])*100));

        $time -> timeReg();
        $feedback = "Success";

    } catch (exception $e) {
        $feedback = $e->getMessage();
    }
}

include_once ('classes/database.class.php');
$db = new Database();

$iAfstand = 1;
if (!empty($_GET['afstand']))
	$iAfstand = $_GET['afstand'];

$iWedstrijd = 1;
if(!empty($_GET['wedstrijd']))
	$iWedstrijd = $_GET['wedstrijd'];

$afstanden = $db -> selectDistances();
$wedstrijden = $db -> selectCompetitions();

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<?php
        include_once ('includes/includeHead.php');
		?>
		<title>Add Times | <?php echo siteName; ?></title>

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
				<form method="post" action="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']; ?>">
					<div id="basicTime">
						<fieldset>
							<legend>Time registration</legend>
							<ul>
								<li>
									<label for="wedstrijd">Competition:</label>
									<select id="competition" name="competition">
										<?php
										while($teller < 10 && $wedstrijd = $wedstrijden -> fetch_array()){
										?>
										<option	value="<?php echo $wedstrijd['WedstrijdID']; ?>"
										<?php
										if($iWedstrijd == $wedstrijd['WedstrijdID']){
											echo "selected='selected'";}
											?>>
											<?php
											echo $wedstrijd['Naam'];?></option>
											<?php $teller++;
										}
										?>
									</select>
								</li>
								<li>
									<label for="afstand">Distance:</label>
									<select id="distance" name="distance">
										<?php
										while ($afstand = $afstanden -> fetch_array()) {
										?>
										<option value="<?php echo $afstand['AfstandID']; ?>" 
										<?php
										if ($iAfstand == $afstand['AfstandID']) {
											echo "selected='selected'";}
											?>>
											<?php 
											echo $afstand['Omschrijving']; ?></option>
											<?php
										}
										?>
									</select>
								</li>
								<li>
									<label>Time:</label>
									<input name="tijdMin" class="tijd" type="text" placeholder="mm"/>
									<input name="tijdSec" class="tijd" type="text" placeholder="ss"/>
									<input name="tijdHun" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label>Reaction Time:</label>
									<input name="reactionSec" class="tijd" type="text" placeholder="ss"/>
									<input name="reactionHun" class="tijd" type="text" placeholder="ff"/>
								</li>
							</ul>
						</fieldset>
					</div>
					<div id="splitTime">
						<fieldset>
							<legend>Split times</legend>
							<ul>
								<li>
									<label>50 meter:</label>
									<input name="tijd50Min" class="tijd" type="text" placeholder="mm"/>
									<input name="tijd50Sec" class="tijd" type="text" placeholder="ss"/>
									<input name="tijd50Hun" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label>100 meter:</label>
									<input name="tijd100Min" class="tijd" type="text" placeholder="mm"/>
									<input name="tijd100Sec" class="tijd" type="text" placeholder="ss"/>
									<input name="tijd100Hun" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label>200 meter:</label>
									<input name="tijd200Min" class="tijd" type="text" placeholder="mm"/>
									<input name="tijd200Sec" class="tijd" type="text" placeholder="ss"/>
									<input name="tijd200Hun" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label>400 meter:</label>
									<input name="tijd400Min" class="tijd" type="text" placeholder="mm"/>
									<input name="tijd400Sec" class="tijd" type="text" placeholder="ss"/>
									<input name="tijd400Hun" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label>800 meter:</label>
									<input name="tijd800Min" class="tijd" type="text" placeholder="mm"/>
									<input name="tijd800Sec" class="tijd" type="text" placeholder="ss"/>
									<input name="tijd800Hun" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label>1500 meter:</label>
									<input name="tijd1500Min" class="tijd" type="text" placeholder="mm"/>
									<input name="tijd1500Sec" class="tijd" type="text" placeholder="ss"/>
									<input name="tijd1500Hun" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<input type="submit" value="Submit" class="btn-time" />
								</li>
							</ul>
						</fieldset>
					</div>
				</form>
			</section>
			

		</div>
		<footer>

		</footer>
	</body>
</html>