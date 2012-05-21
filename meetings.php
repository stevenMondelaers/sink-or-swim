<?php
session_start();

include_once("classes/database.class.php");
$o_Meeting = new Database();
$allMeetings = $o_Meeting->getAllMeetings();

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
                <table id="meetings">
                	<tr>
                		<th>Wedstrijd</th>
                		<th>Plaats</th>
                		<th>Datum</th>
                		<th>Badlengte</th>
                	</tr>
	                <?php
						while($n = $allMeetings->fetch_assoc())
						{
							$listUser = "<tr>";
							$listUser.=		"<td>".$n['Naam']."</td>";
							$listUser.=		"<td>".$n['Plaats']."</td>";
							$listUser.=		"<td>".$n['Datum']."</td>";
							$listUser.=		"<td>".$n['Omschrijving']."</td>";
							$listUser.= "</tr>";
							echo $listUser;
						}
					?>
				</table>
                
            </section>
            
	    </div>
	    <footer>
	        
	    </footer>
	</body>
</html>
