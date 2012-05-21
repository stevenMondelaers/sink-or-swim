<?php
session_start();

include_once ('classes/user.class.php');
include_once ('classes/time.class.php');
include_once('classes/database.class.php');

$splitId = $_GET['id'];

try
{
	$splitTime = new Time();
	$splitData = $splitTime->getSplitData($splitId);
} catch(exception $e){
	$feedback = $e -> getMessage();
}
	
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
                <?php
          include_once('includes/includeHead.php');
        ?>
        <title>Meetings | <?php echo siteName; ?></title>

	</head>
	<body>
	    <?php
	       include_once('includes/includeHeader.php');
	    ?>
	    <div class="wrapper">
	        <?php
	           include_once('includes/includeNavigation.php');
	        ?>
            <section>
            	<h2>Result Details</h2>
            	<table id= "splittijd">
            		<?php
						while($split = $splitData->fetch_array()){
							$listSplit = "<tr>";
							$listSplit.= "<td><h4>".$split['Naam']. "," . $split['Voornaam'] . "</h4></td>";
							$listSplit.= "<td></td>";
							$listSplit.= "<td></td>";
							$listSplit.= "</tr>";
							$listSplit.= "<tr>";
							$listSplit.= "<td>" . $split['Geboortedatum'] . "</td>";
							$listSplit.= "<td></td>";
							$listSplit.= "<td>" . $split['Licentienummer'] . "</td>";
							$listSplit.= "</tr>";
							$listSplit.= "<tr>";
							$listSplit.= "<td><h4>" . $split['Wedstrijd'] . "</h4></td>";
							$listSplit.= "<td></td>";
							$listSplit.= "<td></td>";
							$listSplit.= "</tr>";
							$listSplit.= "<tr>";
							$listSplit.= "<td>" . $split['Plaats'] . "</td>";
							$listSplit.= "<td>" . $split['Datum'] . "</td>";
							$listSplit.= "<td>" . $split['Badlengte'] . "</td>";
							$listSplit.= "</tr>";
							$listSplit.= "<tr>";
							$listSplit.= "<td><h4>" . $split['Afstand'] . "</h4></td>";
							$listSplit.= "<td></td>";
							$listSplit.= "<td></td>";
							$listSplit.= "</tr>";
							$listSplit.= "<tr>";
							$listSplit.= "<td>" . $split['Tijd'] . "</td>";
							$listSplit.= "<td></td>";
							$listSplit.= "<td></td>";
							$listSplit.= "</tr>";
							
							$listSplit.= "<tr>";
							$listSplit.= "<td><h4>50m</h4></td>";
							$listSplit.= "<td>--.--</td>";
							$listSplit.= "<td>" . $split['M50'] . "</td>";
							$listSplit.= "</tr>";
							
							$listSplit.= "<tr>";
							$listSplit.= "<td><h4>100m</h4></td>";
							$split100 = $split['M100'] - $split['M50'];
							$listSplit.= "<td>" . $split100 . "</td>";
							$listSplit.= "<td>" . $split['M100'] . "</td>";
							$listSplit.= "</tr>";
							
							$listSplit.= "<tr>";
							$listSplit.= "<td><h4>200m</h4></td>";
							$split200 = $split['M200'] - $split['M100'];
							$listSplit.= "<td>" . $split200 . "</td>";
							$listSplit.= "<td>" . $split['M200'] . "</td>";
							$listSplit.= "</tr>";
							
							$listSplit.= "<tr>";
							$listSplit.= "<td><h4>400m</h4></td>";
							$split400 = $split['M400'] - $split['M200'];
							$listSplit.= "<td>" . $split400 . "</td>";
							$listSplit.= "<td>" . $split['M400'] . "</td>";
							$listSplit.= "</tr>";
							
							$listSplit.= "<tr>";
							$listSplit.= "<td><h4>800m</h4></td>";
							$split800 = $split['M800'] - $split['M400'];
							$listSplit.= "<td>" . $split800 . "</td>";
							$listSplit.= "<td>" . $split['M800'] . "</td>";
							$listSplit.= "</tr>";
							
							$listSplit.= "<tr>";
							$listSplit.= "<td><h4>1500m</h4></td>";
							$split1500 = $split['M1500'] - $split['M800'];
							$listSplit.= "<td>" . $split1500 . "</td>";
							$listSplit.= "<td>" . $split['M1500'] . "</td>";
							$listSplit.= "</tr>";
							echo $listSplit;
						}
					?>
            	</table>
			</section>
            
	    </div>
	    <footer>
	        
	    </footer>
	</body>
</html>