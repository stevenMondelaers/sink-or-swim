<?php

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        require_once 'classes/database.class.php';
        
        $database = new Database();
        $database->selectSingleUser;
        
        
    }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Login | Baseline</title>
		
		<?php
		  include_once('includes/includeHead.php');
		?>
		
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
                <form method="POST" action="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']; ?>">
                    <fieldset>
                        <legend>Log in!</legend>
                        <label for="email">E-mail: </label>
                        <input type="email" id="email" name="email" />
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" />
                        <input type="submit" value="Log in!" class="btn-info" />
                    </fieldset>
                </form>
            </section>
            
	    </div>
	    <footer>
	        
	    </footer>
	</body>
</html>
