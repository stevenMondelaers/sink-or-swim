<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Contact | Baseline</title>
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
                
                <form action="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];?>" method="POST">
                    <fieldset>
                        <legend>Contact us!</legend>
                    <label for="subject">Subject: </label>
                    <input type="text" name="subject" id="subject" />
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="email" />
                    <label for="message">Message: </label>
                    <textarea name="message" id="message">
                        
                    </textarea>
                    <input type="submit" id="submit" value="Submit!" class="btn-info" />
                    </fieldset>
                </form>
                
            </section>
            
	    </div>
	    <footer>
	        
	    </footer>
	</body>
</html>
