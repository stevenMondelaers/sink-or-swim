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
			<a href="login" id="lnkLogin">Log in!&#9660;</a>

			<?php
            }else {
			?>
			<a href="logout"><?php echo $_SESSION['userFirstName']." ".$_SESSION['userName']."&#9660;"
			?></a>
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