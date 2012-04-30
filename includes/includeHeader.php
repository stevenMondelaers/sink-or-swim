<?php

$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$linkUrl = $parts[count($parts) - 1];
?>

<header>

	<div class="wrapper">
		<div id="user">
			<?php
if(empty($_SESSION['user'])){

			?>
			<a href="login" id="lnkLogin">Log in!&#9660;</a>
			<?php
            }else {
            echo "<a href='#'>Birger Huysmans (3) &#9660;</a>";
            }
			?>
			<!--<a href="#">Birger Huysmans (3)<img src="img/arrowDown.png" alt="Arrow down" /></a>-->
		</div>

		<a href="./" class="logo clearfix"><img src="img/logo.jpg" alt="logo" /></a>

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