
<?php
	error_reporting(E_ALL ^ E_NOTICE);
	
	$to= "";
	$subject = "";
	$message = "";
	$headers = "";
	$name = "";	
	$from = "";	
	$mailed = false;
	
	$from = 'From: You <ted@tedmatuszewski.com>';
	$to = 'tmaski45@gmail.com';
	$subject = 'MX Michigan Contact Form';
	$body =  "From Name: " . $_POST['name'] . "\n\n" . "From Email: " . $_POST['email'] . "\n\n" . "Message: " . $_POST['message'];
	
	if(mail($to,$subject,$body,$from)) 
	{
		$mailed = true;
	}  
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mx Michigan</title>
<link href="css/mxmichigan.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="js/jquery1.8.3.js"></script>
 
  <meta name="description" content="Motocross Tracks and Off-Road Trails in Michigan. 
  Mx Michigan is your #1 source for information on motocross tracks and off-road 
  trails." />
  
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

</head>

<body>
	<div class="center-wrapper">
        <?php include "header.html" ?>
        <div class="center-content"> 
            <div class="left-content">  
				<?php
                    if(mailed)
                    {
                        echo('<p>Thank you for contacting MXMichigan. <a href="http://mxmichigan.com">Continue to homepage</p>');	
                    }
                    else
                    {
                        echo('<p>Thank you for attempting to contact MXMichigan. For some reason your mail could not be sent. ' .
                                'But, I would still like to hear from you! So, <a href="mailto:tmaski45@gmail.com">Click Here</a>' .
                                ' to send me an email directly.</p>');
                                  
                    }
                ?>
       		</div>  <!-- end .left-content -->   
        </div>  <!-- end .center-content -->
        <?php include "footer.html" ?>
	</div>
</body>
</html>
