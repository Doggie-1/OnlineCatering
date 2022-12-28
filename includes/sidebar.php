<div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <!-- Main menu with font awesome icon -->
		<li class="open"><a href="dashboard.php"><i class="fa fa-home"></i> <b>Dashboard</b></a>
          </li>
          <li class="has_sub">
		  <a href="#"><i class="fa fa-calendar"></i> <b>Reservation Status</b> <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><a href="pending.php"><b>Pending</b></a></li>
	      <li><a href="reservation.php"><b>Confirmed</b></a></li>
              <li><a href="finished.php"><b>Finished</b></a></li>
              <li><a href="cancelled.php"><b>Cancelled</b></a></li>
            </ul>
          </li>  
		<li><a href="combo.php"><i class="fa fa-bar-chart-o"></i> <b>Combo</b></a></li> 
          
          <li class="has_sub">
		  <a href="#"><i class="fa fa-file-o"></i> <b>Maintenance</b>  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>			
		    <li><a href="menu.php"><b>Menu</b></a></li>
              <li><a href="category.php"><b>Category</b></a></li>
              <li><a href="subcategory.php"><b>Subcategory</b></a></li>
              <li><a href="user.php"><b>User</b></a></li>
            </ul>
          </li>
		<li><a href="messages.php"><i class="fa fa-envelope"></i> <b>Messages</b></a></li>     
		  
          <!---<li><a href="backup.php"><i class="fa fa-bar-chart-o"></i> Backup/Restore</a></li>--->
        </ul>
    </div>
    
