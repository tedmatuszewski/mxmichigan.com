<?php
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        include_once('../Database.php'); 
		//$host, $user, $pass, $name
        $db = new Database("pdb10.runhosting.com", "998905_mx", "mxmichigan1234", "998905_mx"); 
        $q = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $r = $db->query($q);
        
        $results = $db->fetch_all_array($q);
        
        if(count($results) == 1)
        { 
            if(isset($_SESSION['mxmichigan']))
            {
                session_unset();
                session_destroy();
            }
            
			include_once 'session.php';
            
            $_SESSION['mxmichigan']['username'] = $results[0]['username'];
			$_SESSION['mxmichigan']['type'] = $results[0]['type'];
            $_SESSION['mxmichigan']['AUTH'] = "true";
            
			if( $_SESSION['mxmichigan']['type'] == 1) {
				header("Location: ../../admin/dashboard.php");	
			}
			else if( $_SESSION['mxmichigan']['type'] == 1) {
				header("Location: ../../my/account");	
			}
			print_r($results);
			print_r( $_SESSION['mxmichigan']);
            //header("Location: dashboard.php");
        }
        else
        {
            echo ("Invalid username or password. Please click <a href='../admin/index.php'>here</a> to try again.");
        }
    }
    else
    {
        echo "You have reached this page in error. Please leave.";
    }
?>
