<?php	
    include_once("../session/security.php");
    require_once('../Database.php');  
	
	$vars = $_GET;
	$table = $vars['table'];
	unset($vars['table']);
	if(isset($vars['id'])) {
		unset($vars['id']);
	}
	
    $db = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx"); 
	
	$q = "INSERT INTO $table (";
	
	foreach($vars as $k => $v) {
		$q .= "$k, ";
	}
	$q = substr_replace($q, "", -2); 
	$q .= ") VALUES (";
	
	foreach($vars as $k => $v) {
		$q .= "'$v', ";
	}
	
	$q = substr_replace($q, "", -2); 
	$q .= ")";
	
	//$q = "INSERT INTO $table (task_name, task_description, task_status, task_person, task_company) VALUES ('$task_name', '$task_description', '$task_status', '$task_person', '$task_company')";
	
	$db->query($q); 
	
	$hdb = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx");
	$hdb->query("INSERT INTO history (text) VALUES ('" . addslashes($q) . "')");
	
	echo json_encode($q);
?>