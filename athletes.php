<?php
session_start();
include_once("classes/database.class.php");
$o_Swimmer = new Database();
$allSwimmers = $o_Swimmer->getAllSwimmer();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<?php
        include_once ('includes/includeHead.php');
		?>

		<title>Home | <?php echo siteName; ?></title>

	</head>
	<body>
		
		<?php
        include_once ('includes/includeHeader.php');
		?>
		<div class="wrapper">
			<?php
            include_once ('includes/includeNavigation.php');
			?>

			<section class="wrapper">
                
			</section>

		</div>
		<?php
        include_once ('includes/includeFooter.php');
		?>

	    <?php
	       include_once('includes/includeHeader.php');
	    ?>
	    <div class="wrapper">
	        <?php
	           include_once('includes/includeNavigation.php');
	        ?>
            <section class="wrapper">
                <table id="zwemmers">
                	<tr>
                		<th>Name</th>
                		<th>Date of Birth</th>
                		<th>License Number</th>
                		<th>
                			<img src="img/achievements/gold.png" />
                			<img src="img/achievements/silver.png" />
                			<img src="img/achievements/bronze.png" />
                		</th>
                	</tr>
	                <?php
						while($n = $allSwimmers->fetch_assoc())
						{
							$listUser = "<tr>";
							$listUser.=		"<td><a href='profile?profileId=".$n['ZwemmerID']."'>".$n['Naam'].", ".$n['Voornaam']."</a></td>";
							$listUser.=		"<td>".$n['Geboortedatum']."</td>";
							$listUser.=		"<td>".$n['Licentienummer']."</td>";
							$listUser.=		"<td id='medal'></td>";
							$listUser.= "</tr>";
							echo $listUser;
						}
					?>
				</table>

            </section>
            
	    </div>
	    <?php
	       include_once('includes/includeFooter.php');
	    ?>

	</body>
</html>
