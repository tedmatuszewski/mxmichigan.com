<?php
	include_once("json/Database.php");
	
	$trackid = $_GET['id'];
	$db = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx");  
    $q = "SELECT * FROM tracks WHERE id = " . $trackid; 
	$r = $db->query($q);
	$track = $db->fetch_array_assoc($r);
	
	$q = "SELECT * FROM schedule WHERE trackid = " . $trackid;
	$r = $db->query($q);
	$jsonschedule = json_decode($db->fetch_all_json($r));
	$schedule = $jsonschedule->DATA;
	
    echo print_r($track); 
	echo print_r($schedule);
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title>Track</title>
    
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet"  />
        <link href="../css/site.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/pikaday.css">
        <link rel="stylesheet" href="../css/jquery.timepicker.css" />
        
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    </head>
  
    <body>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img class="navbar-brand" src="../images/Mx-Michigan-Logo.png" alt="Mx Michigan" />
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../json/session/logout.php">Logout</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
     
        <div class="container main">  
        	<div class="row">
            	<h1><?php echo $track['name']; ?></h1>
                <h3>Schedule</h3>
                <table class="table">
                	<tr><td>Start</td><td>End</td><td>Comments</td><td>Type</td></tr>
                	<?php 
						for($i=0; $i<count($schedule); $i++) {
							echo("<tr>");
								echo("<td>" . $schedule[$i]->start . "</td>");
								echo("<td>" . $schedule[$i]->end . "</td>"); 
								echo("<td>" . $schedule[$i]->comments . "</td>");
								if($schedule[$i]->race == "1") {
									echo("<td>Race</td>");
								}
								else {
									echo("<td>Practice</td>");	
								}
							echo("</tr>");
						}
					?>
                    <tr></tr>
                </table>
            </div>
        </div>
  	</body>
	<script type="text/javascript" src="../js/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="../js/moment.js"></script>
    <script type="text/javascript" src="../js/pikaday.js"></script>
    <script type="text/javascript" src="../js/pikaday.jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="../js/mx.js"></script>
</html>
