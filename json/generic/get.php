<?php
    include_once("../session/security.php");
    require_once('../Database.php'); 
    
	$table = $_GET['table'];
	
    $db = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx");  
    $q = "SELECT * FROM $table"; 
	
	if(isset($_GET['column']) && isset($_GET['value'])) {
		$value = $_GET['value'];
		$column = $_GET['column'];
		
		$q .= " WHERE $column != '$value'";		
	}
	
	if(isset($_GET['orderbycol']) && isset($_GET['orderbydirection'])) {
		$orderbycol = $_GET['orderbycol'];
		$orderbydirection = $_GET['orderbydirection'];
		
		$q .= " ORDER BY $orderbycol $orderbydirection";	
	}
    
	$r = $db->query($q);
	
	$db->query("INSERT INTO history (text) VALUES ('" . addslashes($q) . "')");
	
    $json = $db->fetch_all_json($r); 
	if(isset($_GET['callback'])) {
		echo $_GET['callback'] . '('.$json.')'; 
	}
	else {
		echo $json;	
	}
?>