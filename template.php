<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="Steven" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		
		<link href="css/reset.css" type="text/css" rel="stylesheet" />
		<link href="css/screen.css" type="text/css" rel="stylesheet" />
		
	</head>
	<body>
	    <header>
	        <div class="wrapper">
	            <a href="#">
	            <img src="img/logo.png" class="logo" alt="Logo" />
	            </a>
	            <div id="user">
	                <a href="#">Birger Huysmans (3)<img src="img/arrowDown.png" alt="Arrow down" /></a>
	            </div>
	        </div>
	    </header>
	    <div class="wrapper">
	        <nav>
                <ul>
                    <li><a href="#">Home
                        <span class="description">Get back to start</span>
                        </a>
                        </li>
                    <li class="current"><a href="#">Records
                        <span class="description">
                        See the best recorded times
                        </span>
                        </a>
                        </li>
                    <li><a href="#">Meetings
                        <span class="description">
                        The latest attended meetings
                        </span>
                        </a>
                        </li>
                    <li><a href="#">Athletes
                        <span class="description">
                        Search your favorite athlete
                        </span>
                        </a>
                        </li>
                    <li><a href="#"><span class="caps">faq</span>
                        <span class="description">
                        Got questions? Look here first
                        </span>
                        </a>
                        </li>
                    <li><a href="#">Contact
                        <span class="description">
                        Get in touch!
                        </span>
                        </a>
                        </li>
                </ul>
            </nav>
            <section>
                
                <header>
                    <span>Men, Open</span>
                    <span>Top times</span>
                    <span>Long course (50)</span>
                </header>
                
                <div id="sort">
                    <ul>
                        <li>Top times</li>
                        <li>Men</li>
                        <li>Long Course</li>
                        <li>2012</li>
                        <li>Open</li>
                    </ul>
                </div>
                
                <?php
                    include_once('include_table.php');
                ?>
            </section>
            
	    </div>
	    <footer>
	        
	    </footer>
	</body>
</html>
