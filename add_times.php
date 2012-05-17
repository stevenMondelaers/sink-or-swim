<?php
session_start();
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
				<form>
					<div id="basicTime">
						<fieldset>
							<legend>Time registration</legend>
							<ul>
								<li>
									<label for="wedstrijd">Competition:</label>
									<select>
										<?php
										while($teller < 5 && $wedstrijd = $wedstrijden -> fetch_array()){
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
									<select>
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
									<label for="tijd">Time:</label>
									<input name="tijd" class="tijd" type="text" placeholder="mm"/>
									<input name="tijd" class="tijd" type="text" placeholder="ss"/>
									<input name="tijd" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label for="reactie">Reaction Time:</label>
									<input name="reactie" class="tijd" type="text" placeholder="ss"/>
									<input name="reactie" class="tijd" type="text" placeholder="ff"/>
								</li>
							</ul>
						</fieldset>
					</div>
					<div id="splitTime">
						<fieldset>
							<legend>Split times</legend>
							<ul>
								<li>
									<label for="m50">50 meter:</label>
									<input name="m50" class="tijd" type="text" placeholder="mm"/>
									<input name="m50" class="tijd" type="text" placeholder="ss"/>
									<input name="m50" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label for="m100">100 meter:</label>
									<input name="m100" class="tijd" type="text" placeholder="mm"/>
									<input name="m100" class="tijd" type="text" placeholder="ss"/>
									<input name="m100" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label for="m200">200 meter:</label>
									<input name="m200" class="tijd" type="text" placeholder="mm"/>
									<input name="m200" class="tijd" type="text" placeholder="ss"/>
									<input name="m200" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label for="m400">400 meter:</label>
									<input name="m400" class="tijd" type="text" placeholder="mm"/>
									<input name="m400" class="tijd" type="text" placeholder="ss"/>
									<input name="m400" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label for="m800">800 meter:</label>
									<input name="m800" class="tijd" type="text" placeholder="mm"/>
									<input name="m800" class="tijd" type="text" placeholder="ss"/>
									<input name="m800" class="tijd" type="text" placeholder="ff"/>
								</li>
								<li>
									<label for="m1500">1500 meter:</label>
									<input name="m1500" class="tijd" type="text" placeholder="mm"/>
									<input name="m1500" class="tijd" type="text" placeholder="ss"/>
									<input name="m1500" class="tijd" type="text" placeholder="ff"/>
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
