<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>
<?php include 'header.php';?>
    <script language="JavaScript"><!--
javascript:window.history.forward(1);
//--></script>

<body>
	<?php include 'navbar.php';?>
	<?php include 'menu-tab.php';?>
	<div class="container"><br>
		<div class = "content">
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
				<div class = "col-md-12 col-lg-12">
					<div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Reservation Details</div>
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
                     <form class="form-horizontal" role="form" action="details_save.php" method="post">
                        
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Venue</label>
                                <div class="col-lg-4">
                                    <textarea class="form-control" id="venue" name="venue" rows="2" placeholder="Complete Address of venue" required
                                    onfocusout="checkLocation()"></textarea>
                                </div>

                                <label class="col-lg-1 control-label">Date of Event</label>
                                <div class="col-lg-4">
                                    <input type="text" id="datepicker" class="form-control" name="date" required>
                                    <span class = "label label-warning">Check if date is available</span>
                                </div>   
                            </div>    

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Time of Event</label>
                                <div class="col-lg-4">
                                    <div id="datetimepicker" class="input-append input-group dtpicker" required>
									  <input data-format="hh:mm A" class="form-control" type="time" name="time" id="datepicker" required="true">
                                      <span class="input-group-addon">
                                        <i data-time-icon="fa fa-clock-o" data-date-icon="fa fa-calendar" class="fa fa-clock-o"></i>
                                      </span>
                                    </div>
                                </div>
                                
                                <label class="col-lg-1 control-label">Motif</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Write theme/motif" name="motif" required>
                                </div>
                            </div>


                            <div class="form-group">
                                    <label class="col-lg-2 control-label">No. of Pax</label>
                                    <div class="col-lg-4">
                                        <input type="number" class="form-control" placeholder="No. of Pax" min="1" name="pax" required>
                                    </div>

                                <label class="col-lg-1 control-label">Occasion</label>
                                  <div class="col-lg-4">
                                    <select class="form-control select2 " id="exampleSelect1" name="ocassion" placeholder="Select occasion" required
                                        onchange="show();">
                                      <option value="Baptism">Baptism</option>
                                      <option value="Birthday">Birthday</option>
                                      <option value="Christmas Party">Christmas Party</option>
                                      <option value="Funeral">Funeral</option>
                                      <option value="Wedding">Wedding</option>
                                      <option value="Others">Others</option>
                                    </select>
                                  </div>
                            </div>

                                <div class="form-group" id="others">
                                  <label class="col-lg-7 control-label"></label>
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Please specify" min="1" name="others">
                                  </div>
                                </div>
                                <br><br>
       
                <div class="form-group">
                    <label class="col-lg-1 control-label"></label>
                    <div class="col-lg-9">
                      <b style="color:green">Reminder: For the custom, simply click the food item listed within the package to display it with its price in the Custom Package.</b>
                    </div>
                </div>
                    

<div class="form-group">
    <label class="col-lg-1 control-label"></label>
        <div class="col-lg-6">
            <?php
            include('includes/dbcon.php');
                $query=mysqli_query($con,"select * from combo order by combo_name")or die(mysqli_error($con));
                $count=mysqli_num_rows($query);
                $ids = "";
                while ($row=mysqli_fetch_array($query)){
                    $id=$row['combo_id'];
                    $name=$row['combo_name'];
                    $price=$row['combo_price'];
                    if ($ids) {
                        $ids = $ids . "," . $row['combo_id'];
                    } else {
                        $ids = $row['combo_id'];
                    }
            ?>
                <div class="col-md-6">
                    <div class="widget">
                        <!-- Widget title -->
                        <div class="widget-head">
                            <div class="pull-left"><?php echo $name;?> - P<?php echo $price;?></div>
                            <div class="widget-icons pull-right"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content referrer">
                            <!-- Widget content -->
                            <div>
                            <table class="table table-bordered table-hover">
                                <tbody style="height: 140px; display: block; overflow-y: scroll;" class="widget-content referrer">
                                    <?php

                                        $query1=mysqli_query($con,"select * from combo_details natural join menu where combo_id='$id'")or die(mysqli_error($con));
                                            while ($row1=mysqli_fetch_array($query1)){
                                                $cid=$row1['combo_details_id'];
                                                $menu_id=$row1['menu_id'];
                                                $menu_name=$row1['menu_name'];
                                                $menu_price=$row1['menu_price'];

                                    ?>
                                        <tr style="background-color: white; display: flex">
                                            <td style="width: 100%; display: flex; justify-content: space-between;" onClick="addMenu(this);" data-code="<?php echo $menu_id;?>" data-id="<?php echo $menu_name;?>" value="<?php echo $menu_price;?>">
                                                <span><?php echo $menu_name;?></span>
                                                <!--<span><?php echo "P " . $menu_price;?></span>   -->
                                            </td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            </div>

                            <div class="widget-foot text-center" id="radioButton">
	                                <input type="checkbox" id="inlineCheckbox<?php echo $id;?>" value="<?php echo $id;?>" name="combo_id">
                            </div>
                        </div>
                    </div>
                </div>
            <!--end widget-->
            <?php }?>
        </div>
            <div class="col-md-4">
                <div class="widget">
                    <!-- Widget title -->
                    <div class="widget-head">
                        <div class="pull-left">Custom Package</div>
                        <div class="widget-icons pull-right"><span id="total" name="total"></span></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content referrer">
                        <!-- Widget content -->
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <tr id="myList" style="background-color: white;">
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <input type="hidden" id="packagesId" value="<?php echo $ids?>" name="ids">
                    <input type="hidden" id="totalPrice" value="0" name="totalPrice">
                    <input type="hidden" id="customMenu" value="0" name="customMenu">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-5">
                <button type="reset" class="btn btn-sm btn-default">Clear</button>
                <button type="submit" class="btn btn-sm btn-primary">Next</button>
            </div>
        </div>
                              </form>
        </div>
    </div>
      
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>		
				</div>

      </div>  
			</div>	
		</div><br><br><br><br> 
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        document.getElementById('others').style.display = 'none';
    })
    let myList = [];
    let prices = [];
    let menuId = "";
    let total = 0;
    function checkLocation() {
        let x = document.getElementById("venue");
        let temp = x.value.toLowerCase();
        if (!(temp.includes("cagayan de oro city") || temp.includes("cdo") || temp.includes("cdoc"))){
            alert("Location is not within Cagayan de Oro.");
        };
    }
    function show() {
        var e = document.getElementById("exampleSelect1");
        var value = e.value;
            if (value === "Others") {
                document.getElementById('others').style.display = 'block';
            } else {
                document.getElementById('others').style.display = 'none';
            }
    }
    let addMenu = element => {
        if (!myList.includes(element.getAttribute('data-id'))) {
            total = 0;
            myList.push(element.getAttribute('data-id'));
            prices.push(element.getAttribute('value'));
            let list = document.getElementById("myList");
            let priceList = document.getElementById("priceList");
            let li = document.createElement("li");
            li.setAttribute('id', element.getAttribute('data-id'));
            li.appendChild(document.createTextNode(element.getAttribute('data-id') + " - " + element.getAttribute('value')));
            list.appendChild(li);
            if (!menuId) {
                menuId += element.getAttribute('data-code');
            } else {
                menuId += "," + element.getAttribute('data-code');
            }
        } else {
            total = 0;
            temp = [];
            tempPrice = [];
            tempMenu = "";
            let priceKey;
            let list = document.getElementById("myList");
            myList.map((viand, key) => {element.getAttribute('data-id') !== viand ? temp.push(viand) : priceKey = key});
            prices.map((viand, key) => priceKey !== key ? tempPrice.push(viand) : null);
            myList = temp;
            prices = tempPrice;
            let item = document.getElementById(element.getAttribute('data-id'));
            list.removeChild(item);
            let menus = menuId.split(",");
            menus.map((viand, key) => {element.getAttribute('data-code') !== viand ?
                !tempMenu ? tempMenu += viand : tempMenu += "," + viand
            : null})
            menuId = tempMenu;
        }
        prices.map((viand, key) => {total = total + parseInt(viand)});
        document.getElementById("packagesId").value.split(",").map((id) => {
            document.getElementById(`inlineCheckbox${id}`).disabled = total === 0 ? false : true
        })
        let totalPrice = document.getElementById("total");
        let totalPrices = document.getElementById("totalPrice");
        let customMenu = document.getElementById("customMenu");
        totalPrice.innerText = "P " + total;
        totalPrices.value = total;
        customMenu.value = menuId;
    }

$( "#datepicker" ).datepicker({ minDate: 0});


</script>
</body>
</html>



