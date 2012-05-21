<?php

require_once ('../classes/database.class.php');

$course = $_POST['course'];
$gender = $_POST['gender'];
$db = new Database();
$feedback['html'] = "";

try {
	$result = $db -> selectRecords($course, $gender);
	while ($n = $result -> fetch_assoc()) {
		$feedback['html'] .= "<tr>
						<td id='omschrijving'>" . $n['Omschrijving'] . "</td>
						<td id='zwemmerNaam'><a href='profile?profileId=" . $n['ZwemmerID'] . "'>" . $n['Naam'] . ", " . $n['Voornaam'] . "</a></td>
						<td id='zwemmerTijd'>" . $n['Tijd'] . "</td>
						<td id='zwemmerDatum'>" . $n['Datum'] . "</td>
						<td id='zwemmerPlaats'>" . $n['Plaats'] . "</td>
						<td id='zwemmerCompetitie'>" . $n['competition'] . "</td>
						</tr>";
	}
	
	$feedback['status'] = "success";
	$feedback['message'] = "";
	
} catch(exception $e) {
	$feedback['status'] = "failure";
	$feedback['message'] = $e->getMessage();
}

header('Content-type: application/json');
echo json_encode($feedback);

?>