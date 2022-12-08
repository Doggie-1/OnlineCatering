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
      text-align: left;
      background-color: #7d1e1b;
      color: white;
    }
    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        padding: 10px;
    }
    .grid-item {
        padding: 20px;
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
        <h3 style="text-align:center">Chimney's Catering Services</h3>
        <h4 style="text-align:center">Mabini Street, Fisheries Avenue, Talisay City</h4>
        <h4 style="text-align:center">Tel. No. : 435-1114</h4>
        <h4 style="text-align:center">Email : chimneycatering@yahoo.com</h4>
        <h4 style="text-align:center">Facebook : facebook.com/chimneycatering</h4>

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
                    <td>RCode: </td>
                    <td><?php echo $rcode;?></td>
                </tr>
                <tr>
                    <td>Name: </td>
                    <td><?php echo $last." ,".$first;?></td>
                </tr>
                <tr>
                    <td>Contact #: </td>
                    <td><?php echo $contact;?></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td><?php echo $address;?></td>
                </tr>
                <tr>
                    <td>Reservation Status: </td>
                    <td><?php echo $status;?></td>
                </tr>
                <tr>
                    <td>Motif: </td>
                    <td><?php echo $motif;?></td>
                </tr>
                <tr>
                    <td>Reservation Date: </td>
                    <td><?php echo date("M d, Y",strtotime($date));?></td>
                </tr>
                <tr>
                    <td>Reservation Type: </td>
                    <td><?php echo $type;?></td>
                </tr>
                <tr>
                    <td>Venue for the Event: </td>
                    <td><?php echo $venue;?></td>
                </tr>
                <tr>
                    <td>Total Payable: </td>
                    <td><?php echo $payable;?></td>
                </tr>
                <tr>
                    <td>Balance: </td>
                    <td><?php echo $balance;?></td>
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

                $cname = !empty($row1) ? $row1['combo_name'] : "Custom Package";
            ?>
                <div>
                    <table id="customers">
                        <tr>
                            <th>Menu</th>
                            <th>Price</th>
                        </tr>
                        <?php while($row1 = mysqli_fetch_array($query1)) {?>
                            <tr>
                                <td><?php echo  $row1['menu_name'];?></td>
                                <td><?php echo  $row1['menu_price'];?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>Total</td>
                            <td><?php echo  $price;?></td>
                        </tr>
                    </table>
                </div>
            <?php   ?>
        </div>
    </div>
</body>
</html>