<?php
$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$linkUrl = $parts[count($parts) - 1];

?>

<?php
if(!empty($feedback)){
?>
<div id="feedbackContainer">
	<div id="feedback">
		<?php
        echo $feedback;
		?>
	</div>
</div>
<?php
}
?>

<header>

	<div class="wrapper">
		<div id="user">
			<?php
				if(empty($_SESSION['userId'])){
			?>
			<div id="topnav" class="topnav"><a href="login" class="signin"><span>Sign in</span></a></div>
			
			<fieldset id="signin_menu">
    			<form method="post" id="signin" action="login">
      			<label for="email">Email</label>
      			<input id="email"name="email" value="" title="username" tabindex="4" type="text">
      			<p>
        			<label for="password">Password</label>
        			<input id="password" name="password" value="" title="password" tabindex="5" type="password">
        			<a id="register" href="index">No account? Register!</a>
      			</p>
      			<p>    
      				  				
        			<input id="signin_submit" value="Sign in" tabindex="6" type="submit">
      			</p>
      		</form>
  			</fieldset>

			<?php
            	}else {
			?>
			<div class="topnav">
				<a href="#" id="lnkUser" class="username"><span><?php echo $_SESSION['userFirstName']." ".$_SESSION['userName'] ?></span></a>
			</div>
			<div id="userMenu">
			    <a href="profile">Profile</a>
			    <a href="add_times">Add times</a>
			    <a href="add_meeting">Add meeting</a>
			    <a href="achievements">Achievements</a>
			    <a href="logout">Logout</a>
			</div>
			<?php
            }
			?>
		</div>

		<a href="./" class="logo"><img src="img/logo.jpg" alt="logo" /></a>

		<nav>
			<ul>
				<li <?php
                if ($linkUrl == "index.php") { echo "class='current'";
                }
				?>>
					<a href="./">Home</a>
				</li>
				<li <?php
                if ($linkUrl == "records.php") { echo "class='current'";
                }
				?>>
					<a href="records">Records</a>
				</li>
				<li <?php
                if ($linkUrl == "meetings.php") { echo "class='current'";
                }
				?>>
					<a href="meetings">Meetings</a>
				</li>
				<li <?php
                if ($linkUrl == "athletes.php") { echo "class='current'";
                }
				?>>
					<a href="athletes">Athletes</a>
				</li>
				<li <?php
                if ($linkUrl == "faq.php") { echo "class='current'";
                }
				?>>
					<a href="faq">faq</a>
				</li>
				<li <?php
                if ($linkUrl == "contact.php") { echo "class='current'";
                }
				?>>
					<a href="contact">Contact</a>
				</li>
			</ul>
		</nav>

		<div class="clearfix"></div>

	</div>
</header>