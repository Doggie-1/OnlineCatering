<?php include 'header.php';?>

<body style="height: 100vh">
	<?php include 'navbar.php';?>
	<?php include 'menu-tab.php';?>
	
      <div class="container"><br><br>
		    <div class ="content">
					<div class="widget wgreen">
                
              <div class="widget-head">
                  <div class="pull-left">Create Reservation</div>
                  <div class="clearfix"></div>
              </div>

                <div class="widget-content">
                  <div class="padd"><br>

                    <!-- Form starts.  -->

            <form class="form-horizontal" role="form" action="reservation_save.php" method="post">
                              
                          <div class="form-group">
                              <label class="col-lg-4 control-label">First Name</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="First Name" name="first" required>
                                  </div>
                          </div>
                                
                          <div class="form-group">
                              <label class="col-lg-4 control-label">Last Name</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last" required>
                                  </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-4 control-label">Address</label>
                                  <div class="col-lg-5">
                                    <textarea class="form-control" rows="8" placeholder="Complete Address" name="address" required></textarea>
                                  </div>
                          </div>    

                          <div class="form-group">
                              <label class="col-lg-4 control-label">Contact #</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="Contact #" name="contact" required>
                                  </div>
                          </div>
                                
                          <div class="form-group">
                              <label class="col-lg-4 control-label">Email Address</label>
                                  <div class="col-lg-5">
                                    <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                                  </div>
                          </div>
								  <div class="form-group">
                      <label class="col-lg-4 control-label"></label>
                          <div class="col-lg-5">
                              <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox1" value="option1" required> I agree to the <a href="#facilities" data-toggle="modal">terms and condtion</a> of the Kirby's Catering
                              </label>
									        </div>
								  </div>


                  <div class="form-group">
                        <div class="col-lg-offset-4 col-lg-5">
                            <button type="reset" class="btn btn-sm btn-default">Clear</button>
                            <button type="submit" class="btn btn-sm btn-primary">Next</button>
                                    
                        </div>
                  </div>
            </form>
                  
                </div>
                  </div>

          </div><br>
        </div>		
		  </div>
      <br>

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



