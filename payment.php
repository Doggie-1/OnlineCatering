<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<?php include 'header.php';?>

<body>
	<?php include 'navbar.php';?>
	<?php include 'menu-tab.php';?>
	
		<div class = "container"><br><br><br><br><br><br><br><br>
      <div class = "content" style="height: 65vh;">
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class = "col-md-12 col-lg-12">
					<div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Payment Details</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br>
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" action="payment_save.php" method="post">
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Package Details</label>
                                  <div class="col-lg-5">
    <?php
        include('includes/dbcon.php');
            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM reservation WHERE rid='$id'");
            $row=mysqli_fetch_array($query);
            $cid=$row['combo_id'];

            if ($cid) {
                $query1 = mysqli_query($con, "SELECT * FROM combo_details natural join menu WHERE combo_id='$cid'");
            } else {
                $query1 = mysqli_query($con, "SELECT * FROM custom_details natural join menu WHERE reservation_id='$id'");
            }

            if ($cid) {
                echo $cid;
            } else {
                echo "Custom Package";
            }
                echo "<br>";

            while($row1=mysqli_fetch_array($query1))
            {
    ?>
        <?php
            if ($cid !== 0) {
                echo $row1['menu_name'];
            } else {
                echo "Custom Package";
            }
            echo "<br>";
        ?>
         <?php }?>                           
                                  </div>
                                </div>    

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Payment Details</label>
                                  <div class="col-lg-5">
                                  <h4>
                                    <?php
                                      echo $row['pax'];
                                      echo " x ";
                                      echo number_format($row['price'],2);
                                      echo " = ";
                                      echo number_format($row['payable'],2);
                                    ?>
                                   </h4> 
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Mode of Payment</label>
                                  <div class="col-lg-5">
                                    <select class="form-control select2 " id="exampleSelect1" name="mode" placeholder="Select occasion" required onchange="show();">
                                      <option value="Bank to Bank">Bank to Bank</option>
                                      <option value="Gcash">Gcash</option>
                                      <option value="Cash">Cash</option>
                                    </select>
                                  </div>
                                  <div style="display: flex; justify-content: center; flex-direction: column; height: 27px;">
                                      <img id="gcash" src="https://mb.com.ph/wp-content/uploads/2022/05/83408.png" width="30" height="30"/>
                                      <img id="visa" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" width="30" height="10"/>
                                      <img id="cash" src="https://icons.veryicon.com/png/o/business/coin-series/cash-payment.png" width="30" height="30" />
                                  </div>
                                </div>
                  
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="reset" class="btn btn-sm btn-default">Clear</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Next</button>
                                    
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
          </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>		
				</div>
				
				
			</div>	
		</div>
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
<script>
  $(function () {
  //Initialize Select2 Elements
    $(".select2").select2();
    document.getElementById('gcash').style.display = 'none';
    document.getElementById('visa').style.display = 'block';
    document.getElementById('cash').style.display = 'none';
  })
  function show() {
      var e = document.getElementById("exampleSelect1");
      var value = e.value;
          if (value === "Bank to Bank") {
              document.getElementById('gcash').style.display = 'none';
              document.getElementById('visa').style.display = 'block';
              document.getElementById('cash').style.display = 'none';
          } else if (value === "Gcash") {
              document.getElementById('gcash').style.display = 'block';
              document.getElementById('visa').style.display = 'none';
              document.getElementById('cash').style.display = 'none';
          } else {
              document.getElementById('gcash').style.display = 'none';
              document.getElementById('visa').style.display = 'none';
              document.getElementById('cash').style.display = 'block';
          }
    }
$( "#datepicker" ).datepicker({ minDate: 0});


</script>
</body>
</html>



