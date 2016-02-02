<?php
    include_once 'session.php';
    
	if(isset($_GET['blast']) && $_GET['blast'] == "true") {
		echo "<textarea>" . print_r($_SESSION['mxmichigan'], true) . "</textarea>";
	}
	else {
		if(isset($_SESSION['mxmichigan']) && isset($_SESSION['mxmichigan']['AUTH']) && ($_SESSION['mxmichigan']['AUTH'] == "true")) {
			$_SESSION['ted']['SECURITY'] = "PASSED"; 
		}
		else {
			header("Location: /admin");
		}
	}
?>