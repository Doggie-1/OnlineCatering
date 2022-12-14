<?php 
session_start();
include('includes/dbcon.php');
	
	$id = $_SESSION['id'];
	$mode = $_POST['mode'];

    mysqli_query($con,"UPDATE reservation SET modeofpayment='$mode',r_status='pending' where rid='$id'")or die(mysqli_error($con));

    $query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
    if (mysqli_num_rows($query) == 0) {
        $rcode= array_key_exists("r_code",$_POST) ? $query['r_code'] : "";
        $first=array_key_exists("r_first",$_POST) ? $query['r_first'] : "";
        $last=array_key_exists("r_last",$_POST) ? $query['r_last'] : "";
        $contact=array_key_exists("r_contact",$_POST) ? $query['r_contact'] : "";
        $address=array_key_exists("r_address",$_POST) ? $query['r_address'] : "";
        $email=array_key_exists("r_email",$_POST) ? $query['r_email'] : "";
        $date=array_key_exists("r_date",$_POST) ? $query['r_date'] : "";
        $venue=array_key_exists("r_venue",$_POST) ? $query['r_venue'] : "";
        $balance=array_key_exists("balance",$_POST) ? $query['balance'] : "";
        $payable=array_key_exists("payable",$_POST) ? $query['payable'] : "";
        $ocassion=array_key_exists("r_ocassion",$_POST) ? $query['r_ocassion'] : "";
        // $team=$row['team_name'];
        $status=array_key_exists("r_status",$_POST) ? $query['r_status'] : "";
        $motif=array_key_exists("r_motif",$_POST) ? $query['r_motif'] : "";
        $time=array_key_exists("r_time",$_POST) ? $query['r_time'] : "";
        $type=array_key_exists("r_type",$_POST) ? $query['r_type'] : "";
        $cid=array_key_exists("combo_id",$_POST) ? $query['combo_id'] : "";
        $combo=array_key_exists("combo_name",$_POST) ? $query['combo_name'] : "";

        ini_set( 'display_errors', 1 );

        error_reporting( E_ALL );

        $from = "jsmith231415@gmail.com";

        $to = $email;

        $subject = "Reservation Details";

        $message = "Dear $first $last. Below are your reservation details to Lee Pipez Catering<br>
            Reservation Code: $rcode
            Event Date: $date
            Event Time: $time
            Venue: $venue
            Motif: $motif
            Ocassion: $ocassion
            Total Payable: $payable
            Package: $combo

        ";

        $headers = "From:" . $from;

        mail($to,$subject,$message, $headers);

        echo "<script>
            alert('Check Your Email Inbox for the details');
        </script>";
    } else {
        echo "<script>
            alert('No Details Found.');
        </script>";
    }
    echo "<script>document.location='summary.php'</script>";
	
?>