<?php
$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$linkUrl = $parts[count($parts) - 1];
?>
<nav>
	<ul>
		<li <?php if($linkUrl == "index.php") { echo "class='current'";} ?>>
			<a href="./">Home <span class="description">Get back to start</span> </a>
		</li>
		<li <?php if($linkUrl == "records.php") { echo "class='current'";} ?>>
			<a href="records">Records <span class="description"> See the best recorded times </span> </a>
		</li>
		<li <?php if($linkUrl == "meetings.php") { echo "class='current'";} ?>>
			<a href="meetings">Meetings <span class="description"> The latest attended meetings </span> </a>
		</li>
		<li <?php if($linkUrl == "athletes.php") { echo "class='current'";} ?>>
			<a href="athletes">Athletes <span class="description"> Search your favorite athlete </span> </a>
		</li>
		<li <?php if($linkUrl == "faq.php") { echo "class='current'";} ?>>
			<a href="faq"><span class="caps">faq</span> <span class="description"> Got questions? Look here first </span> </a>
		</li>
		<li <?php if($linkUrl == "contact.php") { echo "class='current'";} ?>>
			<a href="contact">Contact <span class="description"> Get in touch! </span> </a>
		</li>
	</ul>
</nav>
