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
  <style>
    .label{
      width:150px;
    }
    h4,h3{
      margin:0px;
    }
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      margin-top: 10px;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 4px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 8px;
      padding-bottom: 8px;
      text-align: left;
      background-color: #7d1e1b;
      color: white;
    }
  </style>  
</head>

<body>
<h3 style="text-align:center">Chimney's Catering Services</h3>
<h4 style="text-align:center">Mabini Street, Fisheries Avenue, Talisay City</h4>
<h4 style="text-align:center">Tel. No. : 435-1114</h4>
<h4 style="text-align:center">Email : chimneycatering@yahoo.com</h4>
<h4 style="text-align:center">Facebook : facebook.com/chimneycatering</h4>
<hr>

<table style="width:100%">
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
                        <td class="label">RCode: </td>
                        <td><?php echo $rcode;?></td>
                        <td class="label">Reservation Date: </td>
                        <td><?php echo date("M d, Y",strtotime($date));?></td>
                      </tr>
                      <tr>  
                        <td class="label">Name: </td>
                        <td><?php echo $last." ,".$first;?></td>
                        <td class="label">Reservation Type: </td>
                        <td><?php echo $type;?></td>
                      </tr>
                      <tr>
                        <td class="label">Contact #: </td>
                        <td><?php echo $contact;?></td>
                        <td class="label">Venue for the Event: </td>
                        <td><?php echo $venue;?></td>
                      </tr> 
                      <tr>
                        <td class="label">Address: </td>
                        <td><?php echo $address;?></td>
                        <td class="label">Total Payable: </td>
                        <td><?php echo $payable;?></td>
                      </tr>   
                      <tr>  
                        <td class="label">Reservation Status: </td>
                        <td><?php echo $status;?></td>
                        <td class="label">Balance: </td>
                        <td><?php echo $balance;?></td>
                      </tr>  
                      <tr>  
                        <td class="label">Motif: </td>
                        <td><?php echo $motif;?></td>
                      </tr>  
</table>
<br>
    <?php
        if ($cid) {
            $query1 = mysqli_query($con,"select * from combo natural join menu where combo_id='$cid'")or die(mysqli_error($con));
        } else {
            $query1 = mysqli_query($con, "SELECT * FROM custom_details natural join menu WHERE reservation_id='$id'");
        }
        $row1 = mysqli_fetch_array($query1);

        $cname = !empty($row1) ? $row1['combo_name'] : "Custom Package";
    ?>
        <div style="width:30%; float:left">
            <h4><?php echo $cname;?></h4>
            <span>No. of persons: <?php echo $pax;?> * <?php echo $price;?> = P <?php echo $payable;?></span>
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
    <?php
    //}
    ?>
</body>
</html>