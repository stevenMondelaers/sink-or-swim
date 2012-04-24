<?php

$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$linkUrl = $parts[count($parts) - 1];
?>

<header>
	<div class="wrapper">
		<a href="./"> <img src="img/logo.png" class="logo" alt="Logo" /> </a>
		<div id="user">
			<?php
session_start();
if(empty($_SESSION['user'])){
    
			?>
			<a href="login" id="lnkLogin">Log in!<img src="img/arrowDown.png" alt="Arrow down" /></a>
			<?php
			
    if($linkUrl != "register.php" && $linkUrl != "login.php"){
        ?>
			<form action="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']; ?>" method="POST" id="userNav">
			<label for="username">Username: </label>
			<input type="text" name="username" id="username" />
			<label for="password">Password: </label>
			<input type="password" name="password" id="password" />
			<input type="submit" value="Log in!" id="btnLogin" />
			<a href="register">Register</a>
			</form>
			<?php
    }
            }else {
                
            }
			?>
			<!--<a href="#">Birger Huysmans (3)<img src="img/arrowDown.png" alt="Arrow down" /></a>-->
		</div>
	</div>
</header>