<?php 
    if(isset($_POST["email"]) && isset($_POST["password1"]) && isset($_POST["password2"]))
    { 
        require_once('../../users/Database.php'); 
        
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $invalid = false;

        if($password1 !== $password2)
        {
            $invalid = true;
            echo "Your passwords do not match."; 
        } 
        if($invalid == false)
        {
            $db = new Database("pdb10.runhosting.com", "998905_myblog", "1234", "998905_myblog"); 
            $q = "INSERT INTO users 
                        (username, password) 
                    VALUES 
                        ('$email', '$password1')";

            if($r = $db->query($q))
            {
                echo "You have successfully registered. Click <a href='index.html'>here</a> to login.";
            }
        }
    }
    else
    {
        echo "You have reached this page in error. Please leave.";
    }
?>