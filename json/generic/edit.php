<?php	
    include_once("../session/security.php");
    require_once('../Database.php'); 
    
	$vars = $_GET;
	$id = $vars['id'];
	$table = $vars['table']; 
	unset($vars['table']);
	unset($vars['id']);
	
	$db = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx"); 
	
	$q .= "UPDATE $table SET ";
	
	foreach($vars as $k => $v) {
		$q .= "$k='$v', ";
	}
	
	$q = substr_replace($q, "", -2); 
	
	$q .= " WHERE id = '$id'"; 
	
	echo json_encode($q);
	 
	$db->query($q); 
	
	$hdb = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx");
	$hdb->query("INSERT INTO history (text) VALUES ('" . addslashes($q) . "')");
?>