<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">
        <!-- Logo section -->
        <div class="col-md-9">
          <!-- Logo. -->
          <div class="logo">
           <a href="index.php"> <h2 class = "logo-text"><span class="bold">Kirby's Magic Kan-anan Catering Services</span></h2></a>	
           
          </div>
          <!-- Logo ends -->
        </div>
        <!-- Button section -->
        <div class="col-md-3">
          <!-- Buttons -->  
          <ul class="nav nav-tabs">
            <!-- Comment button with number of latest comments count -->          

            <!-- Message button with number of latest messages count-->
			<li class="dropdown dropdown-big">
              <a  href="index.php" style="color:#1a2668">
                <i class="fa fa-home" style="color:#b11229"></i> Home
              </a>                
            </li>
			
			
            <li class="dropdown dropdown-big">
              <a href="menu.php" style="color:#1a2668">
                <i class="fa fa-cutlery" style="color:#b11229"></i> Menu
              </a>                
            </li>

            <!-- Members button with number of latest members count -->
            <li class="dropdown dropdown-big">
                         <a href="reservation.php" style="color:#1a2668">
                <i class="fa fa-pencil" style="color:#b11229"></i> Appoint a Reservation 
              </a>                
            </li> 
			<!-- Members button with number of latest members count -->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="contact.php" style="color:#1a2668">
                <i class="fa fa-phone" style="color:#b11229"></i> Contact Us 
              </a>                
            </li> 
          </ul>
        </div>
        <!-- Data section -->
		</div>
		</div>
		<?php include 'login_modal.php'; ?>
		<?php include 'details_modal.php'; ?>		
	  <?php include 'reservation_modal.php'; ?>
	  <?php include 'facilities_modal.php'; ?>
	  <?php include 'culinary_modal.php'; ?>
    
  </header>
  