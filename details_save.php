<?php 
session_start();
include('includes/dbcon.php');
	
	$id = $_SESSION['id'];
	$venue = $_POST['venue'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$motif = $_POST['motif'];
	$pax = $_POST['pax'];
	$customMenu = array_key_exists("customMenu",$_POST) ? $_POST['customMenu'] : [];
	$total = array_key_exists("totalPrice",$_POST) ? $_POST['totalPrice'] : 0;
	$type = array_key_exists("type",$_POST) ? $_POST['type'] : 'buffet';
	$ocassion = $_POST['ocassion'] === "Others" ? $_POST['others'] : $_POST['ocassion'];
	$cid = array_key_exists("combo_id",$_POST) ? $_POST['combo_id'] : 0;
	$date=date("Y-m-d",strtotime($date));

	$query = mysqli_query($con, "SELECT * FROM `reservation` WHERE r_time='".$time."' AND r_date='".$date."' AND r_status = 'Approved'");

    if(mysqli_num_rows($query) > 0)
    {
        echo "<script>document.location='details.php'</script>";
    } else {
        $query = mysqli_query($con, "SELECT * FROM combo WHERE combo_id='$cid'");
        $row = mysqli_fetch_array($query);
        $price = $cid === 0 ? $total : $row['combo_price'];
        $payable = $pax * $price;

        if ($customMenu && !$cid) {
            $menuList = explode(",",$customMenu);
            mysqli_query($con,"DELETE FROM custom_details WHERE reservation_id='$id'")or die(mysqli_error($con));
            foreach ($menuList as $key => $value) {
                mysqli_query($con,"INSERT INTO custom_details (id, reservation_id, menu_id) VALUES (NULL, '$id', '$value')")or die(mysqli_error($con));
            }
        }

        mysqli_query($con,"UPDATE reservation SET payable='$payable',balance='$payable',r_venue='$venue',r_date='$date',r_time='$time',r_motif='$motif'
        ,r_ocassion='$ocassion',r_type='$type',pax='$pax',combo_id='$cid',price='$price' where rid='$id'")or die(mysqli_error($con));

        $_SESSION['id']=$id;

        echo "<script>document.location='payment.php'</script>";
    }
	
?>