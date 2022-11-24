<?php

    ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "jsmith231415@gmail.com";
    
    $to = "cblake.6231415@gmail.com";
    
    $subject = "Checking PHP mail";
    
    $message = "Sample Email";
    
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
    
    echo "<script>
		alert('Check Your Email Inbox for the details');		
	</script>";
	
?>
