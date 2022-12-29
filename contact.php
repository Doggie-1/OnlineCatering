<?php include 'header.php';?>

<body>
	<?php include 'navbar.php';?>
	<?php include 'menu-tab.php';?>

	
	<div class="container"><br><br><br><br><br><br>
		<div class="content">
				<div class="col-md-4">
					<div class="widget">
						<div class = "widget-head">
							Message/Feedback
						</div>
						<div class = "widget-content">
							<div class = "padd">
								<form class="form-horizontal" action = "add_message.php" method="post"> <br>                            
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Fullname</label>
                                  <div class="col-lg-8">
                                    <input name = "fullname" type="text" class="form-control" placeholder="Please type your name" required >
                                  </div>
                                </div>                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Email</label>
                                  <div class="col-lg-8">
                                    <input type="email"  name = "email" class="form-control" placeholder="Please type your email" required>
                                  </div>
                                </div>
								<div class="form-group">
                                  <label class="col-lg-3 control-label">Subject</label>
                                  <div class="col-lg-8">
                                    <input type="text" name = "subject" class="form-control" placeholder="Subject" required>
                                  </div>
                                </div>
                                
                                <div class="form-group"><br>
                                  <label class="col-lg-3 control-label">Comments</label>
                                  <div class="col-lg-8">
                                    <textarea name = "message" class="form-control" rows="9" placeholder="Comments here....."required></textarea>
                                  </div>
                                </div>
								<div class="form-group">
                                  <div class="col-lg-offset-3 col-lg-8">
                                    <button  class="btn btn-sm btn-success btn-block">Send</button>                                  
                                  </div>
                                </div>
                              </form>
							  

							</div>
						</div>
					</div><br><br><br><br><br><br>		
				</div>
				<div class = "col-md-8">
					<div class = "widget">
						<div class = "widget-head">
							Map Of Store Location
						</div>
						<div class = "widget-content">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.236299547165!2d124.64281131435902!3d8.476388893905376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32fff2d6e505d179%3A0x47b7e2517567c2ca!2sMagic%20Kan-anan!5e0!3m2!1sen!2sph!4v1666910162223!5m2!1sen!2sph" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>				
				</div>				
			</div><br>	
		</div>
	</div>	
		
<?php include 'footer.php';?> 	
<?php include 'script.php';?>
</body>
</html>



