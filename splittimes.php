<?php
session_start();

include_once ('classes/database.class.php');
include_once ('classes/user.class.php');
include_once ('classes/time.class.php');

$db = new Database();

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
            	<ul>

            	</ul>          
            </section>
            
	    </div>
	    <footer>
	        
	    </footer>
	</body>
</html>