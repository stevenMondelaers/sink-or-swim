<?php 
				
				include("classes/pData.class.php");
				include("classes/pDraw.class.php");
				include("classes/pImage.class.php");
				$myData = new pData(); 
				$db = mysql_connect("localhost", "root", "");
				if ( $db == "" ) { echo " DB Connection error...\r\n"; exit(); }
				
				mysql_select_db("p99_project",$db);
				
				
				$query = "SELECT resultaat.Tijd as tijd, wedstrijd.Datum as datum
						  FROM resultaat INNER JOIN wedstrijd
						  ON resultaat.WedstrijdID = wedstrijd.WedstrijdID
						  WHERE AfstandID = 1 AND ZwemmerID = 14";
				$result  = mysql_query($query,$db);
				$tijd = "";
				$datum = "";
				while ($row = mysql_fetch_array($result))
				{
					$tijd[] = $row["tijd"];
					$datum[] = $row["datum"]; 
				}
				
				$myData->addPoints($tijd, "tijd");
				$myData->addPoints($datum, "datum");
				
				$myData->setAbscissa("datum");
				
				
				
				
				
				/* Create a pChart object and associate your dataset */ 
				$myPicture = new pImage(700,200,$myData);
				$myPicture->setFontProperties(array("FontName"=>"fonts/arial.ttf","FontSize"=>7));
				$myPicture->setGraphArea(60,60,450,190);
				$myPicture->drawScale(array("DrawSubTicks"=>FALSE));
				$myPicture->drawLineChart();
				$myPicture->autoOutput("test2.png");
				?>