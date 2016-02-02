<?php	
    include_once("../session/security.php");
    require_once('../Database.php'); 
    
    $db = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx");
	
	$vars = $_GET;
	$id = $vars['id'];
	$table = $vars['table']; 
	
    $q="DELETE FROM $table WHERE id='$id'"; 
    
	echo json_encode($q);
	
	$r = $db->query($q);
	
	$hdb = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx");
	$hdb->query("INSERT INTO history (text) VALUES ('" . addslashes($q) . "')");
?>