<?php
session_start();
    if(!empty($_POST['subject']) && !empty($_POST['email']) && !empty($_POST['message']) && $_POST['antiSpam'] == "zeven"){
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $headers = 'From: '.$email.'' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        
        mail("spam@spam.spam", $subject, $message, $headers);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
                <?php
          include_once('includes/includeHead.php');
        ?>
        <title>Contact | <?php echo siteName; ?></title>

		
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
                    <label for="antiSpam">Hoeveel is vier plus drie? (anti-spam)</label>
                    <input type="text" id="antiSpam" name="antiSpam" />
                    <input type="submit" id="submit" value="Submit!" class="btn-info" />
                    </fieldset>
                </form>
            </section>
            
	    </div>
	    <footer>
	        
	    </footer>
	</body>
</html>
