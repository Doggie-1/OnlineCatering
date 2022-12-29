<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>View Reservations - <?php include('../includes/title.php');?></title>
  <?php include 'header.php';?>
  <style>
    .label{
      width:150px;
    }
    h4,h3{
      margin:0px;
    }
    .description td {
      font-size: 15px;
    }
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 4px;
    }

    #customers tr {background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 8px;
      padding-bottom: 8px;
      text-align: center;
      background-color: #7d1e1b;
      color: white;
    }
    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        padding: 20px;
    }
    .grid-item {
        padding: 30px;
    }
  </style>  
</head>

<body style="padding-top: 0px">
    <div class="widget wgreen" style="margin: 0px; border: 0">
        <div class="widget-head">
            <div class="pull-left title">Reservation Summary</div>
            <div class="widget-icons pull-right">
                <button class="btn btn-primary hideme" onClick="window.print()"><i class="fa fa-print"></i></button>
                <a href="finish.php" class="btn btn-danger hideme"><i class="fa fa-sign-out"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="alert alert-success">
        <b>Reminder: Please print your reservation summary and take note of your reservation code for reservation inquiry.</b>
    </div>
        <h3 style="text-align:center">Kirby's Magic Kan-anan Catering Services</h3>
        <h4 style="text-align:center">Pabayo Chaves St., Cagayan de Oro, Philippines</h4>
        <h4 style="text-align:center">Phone No.: 0956 127 5037</h4>
        <h4 style="text-align:center">Email : kirbybrik23@gmail.com</h4>
        <h4 style="text-align:center">Facebook : https://www.facebook.com/Magic.Kan.anan</h4>

    <hr>

    <div class="grid-container">
        <div class="grid-item">
            <table class="description" style="width:100%">
                <?php
                    include('../includes/dbcon.php');
                    $id=$_REQUEST['id'];
                    $query=mysqli_query($con,"select * from reservation where rid='$id'")or die(mysqli_error($con));
                    $row=mysqli_fetch_array($query);
                    $id=$row['rid'];
                    $rcode=$row['r_code'];
                    $first=$row['r_first'];
                    $last=$row['r_last'];
                    $contact=$row['r_contact'];
                    $address=$row['r_address'];
                    $date=$row['r_date'];
                    $venue=$row['r_venue'];
                    $balance=$row['balance'];
                    $payable=$row['payable'];
                    $pax=$row['pax'];
                    $price=$row['price'];
                    $type=$row['r_type'];
                    $status=$row['r_status'];
                    $motif=$row['r_motif'];
                    $cid=$row['combo_id'];
                ?>
                <tr>
                    <td><b>RCode: </b></td>
                    <td><h4><?php echo $rcode;?></h4></td>
                </tr>
                <tr>
                    <td><b>Name: </b></td>
                    <td><h4><?php echo $last." ,".$first;?></h4></td>
                </tr>
                <tr>
                    <td><b>Contact #: </b></td>
                    <td><h4><?php echo $contact;?></h4></td>
                </tr>
                <tr>
                    <td><b>Address: </b></td>
                    <td><h4><?php echo $address;?></h4></td>
                </tr>
                <tr>
                    <td><b>Reservation Status: </b></td>
                    <td><h4><?php echo $status;?></h4></td>
                </tr>
                <tr>
                    <td><b>Motif: </b></td>
                    <td><h4><?php echo $motif;?></h4></td>
                </tr>
                <tr>
                    <td><b>Reservation Date: </b></td>
                    <td><h4><?php echo date("M d, Y",strtotime($date));?></h4></td>
                </tr>
                <tr>
                    <td><b>Reservation Type: </b></td>
                    <td><h4><?php echo $type;?></h4></td>
                </tr>
                <tr>
                    <td><b>Venue for the Event: </b></td>
                    <td><h4><?php echo $venue;?></h4></td>
                </tr>
                <tr>
                    <td><b>Total Payable: </b></td>
                    <td><h4><?php echo $payable;?></h4></td>
                </tr>
                <tr>
                    <td><b>Balance: </b></td>
                    <td><h4><?php echo $balance;?></h4></td>
                </tr>
            </table>
        </div>
        <div class="grid-item">
            <?php
                if ($cid) {
                    $query1 = mysqli_query($con,"select * from combo natural join menu where combo_id='$cid'")or die(mysqli_error($con));
                } else {
                    $query1 = mysqli_query($con, "SELECT * FROM custom_details natural join menu WHERE reservation_id='$id'");
                }
                $row1 = mysqli_fetch_array($query1);

                $cname = $cid && (mysqli_num_rows($query1) > 0)? $row1['combo_name'] : "Custom Package";
                if (!(mysqli_num_rows($query1) > 0)) {
            ?>
                <h4 style="color: #7d1e1b;">Package does not Exist</h4>
            <?php
               } else {
            ?>
                <div>
	                <h4 style="color: #7d1e1b;"><?php echo $cname;?></h4>
	                <span><h4>No. of persons:</h4> <h4><?php echo $row['pax'];?> * <?php echo $row['price'];?> = <?php echo $row['payable'];?></h4></span>
	                <div style="margin-left: -25px;">
	                    <ul>
	                        <?php while($row1 = mysqli_fetch_array($query1)) {?>
	                            <h4><li><?php echo  $row1['menu_name'];?></li></h4>
	                        <?php } ?>
	                    </ul>
	                </div>
                </div>
            <?php  } ?>
        </div>
    </div>
</body>
</html>
