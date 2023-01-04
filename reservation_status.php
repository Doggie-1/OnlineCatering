<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<?php include 'header.php';?>
<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        padding: 10px;
    }
    .grid-item {
        padding: 20px;
    }
</style>
<body>
  <?php include 'navbar.php';?>
  <?php include 'menu-tab.php';?>

  <div class="container"><br><br>
    <div class = "content">
        <div class = "col-md-12 col-lg-12">
          <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left title">Reservation Summary</div>
                  <div class="widget-icons pull-right">
                    <button class="btn btn-primary hideme" onClick="window.print()"><i class="fa fa-print"></i></button>
                    <a href="finish.php" class="btn btn-danger hideme"><i class="fa fa-sign-out"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd" style="height:650px">
                    <div class="alert alert-success">
                      <b>Reminder: Please print your reservation summary and take note of your reservation code for reservation inquiry.</b>
                    </div>

                    <h3 style="text-align:center">Kirby's Magic Kan-anan Catering Services</h3>
<h4 style="text-align:center">Pabayo Chaves St., Cagayan de Oro, Philippines</h4>
<h4 style="text-align:center">Phone No. : 09561275037</h4>
<h4 style="text-align:center">Email : kirbybrik23@gmail.com</h4>
<h4 style="text-align:center">Facebook : https://www.facebook.com/Magic.Kan.anan</h4>
<hr>

    <div class="grid-container">
        <div class="grid-item">
            <table style="width:100%">
                <?php
                    include('includes/dbcon.php');
                    $rcode=$_REQUEST['rcode'];
                    $query=mysqli_query($con,"select * from reservation where r_code='$rcode'")or die(mysqli_error($con));
                    $row=mysqli_fetch_array($query);
                    $rcode=$row['r_code'];
                    $id=$row['rid'];
                    $first=$row['r_first'];
                    $last=$row['r_last'];
                    $contact=$row['r_contact'];
                    $address=$row['r_address'];
                    $date=$row['r_date'];
                    $venue=$row['r_venue'];
                    $balance=$row['balance'];
                    $payable=$row['payable'];
                    $ocassion=$row['r_ocassion'];
                    $status=$row['r_status'];
                    $motif=$row['r_motif'];
                    $time=$row['r_time'];
                    $type=$row['r_type'];
                    $cid=$row['combo_id'];
	                if ($cid) {
	                    $query1 = mysqli_query($con,"select * from combo where combo_id='$cid'")or die(mysqli_error($con));
	                } else {
	                    $query1 = mysqli_query($con, "SELECT * FROM custom_details natural join menu WHERE reservation_id='$id'");
	                }
	                $row1 = mysqli_fetch_array($query1);
                    $cname = $cid ? $row1['combo_name'] : "Custom Package";
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
                    <td>Status:</td>
                    <th><?php echo $row['r_status'];?></th>
                </tr>
                <tr>
                    <td>Event Date: </td>
                    <td><?php echo date("M d, Y",strtotime($date));?></td>
                </tr>
                <tr>
                    <td>Time: </td>
                    <td><?php echo date("h:i a",strtotime($time));?></td>
                </tr>
                <tr>
                    <td>Venue: </td>
                    <td><?php echo $venue;?></td>
                </tr>
                <tr>
                    <td>Motif: </td>
                    <td><?php echo $motif;?></td>
                </tr>
                <tr>
                    <td>Occasion: </td>
                    <td><?php echo $ocassion;?></td>
                </tr>
                <tr>
                    <td>Type: </td>
                    <td><?php echo $type;?></td>
                </tr>
                <tr>
                    <td>No. of Pax: </td>
                    <td><?php echo $row['pax'];?></td>
                </tr>
                <tr>
                    <td>Payable: </td>
                    <td>P <?php echo number_format($payable,2);?></td>
                </tr>
                <tr>
                    <td>Mode of Payment: </td>
                    <td><?php echo $row['modeofpayment'];?></td>
                </tr>
            </table>
        </div>
        <div class="grid-item">
            <div style="width:50%;float:left">
                <h4><?php echo $cname;?></h4>
                <span>No. of persons: <?php echo $row['pax'];?> * <?php echo $row['price'];?> = <?php echo $row['payable'];?></span>
                <?php
	                if ($cid) {
	                    $query1 = mysqli_query($con,"select * from combo where combo_id='$cid'")or die(mysqli_error($con));
	                } else {
	                    $query1 = mysqli_query($con, "SELECT * FROM custom_details natural join menu WHERE reservation_id='$id'");
	                }

                    while($row12=mysqli_fetch_array($query1))
                    {
                ?>
                    <li><?php echo array_key_exists("menu_name",$row12) ? $row12['menu_name'] : "None";?></li>
                <?php } ?>
            </div>
        </div>
    </div>


                  </div><!--pad-->  
                </div>
          </div><!--widget-->          
        </div><!--col 9-->
       
        
      </div>  
    </div>
<?php include 'footer.php';?>   
<?php include 'script.php';?>
<script>
         $(function () {
         //Initialize Select2 Elements
         $(".select2").select2();
         

     })
    </script>
</body>
</html>



