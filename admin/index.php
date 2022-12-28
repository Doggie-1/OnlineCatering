<?php include 'header.php';?>


<body class = "admin_body" style = "background-color:#343434 !important; background:none;">

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    
    <a style = "color:white;" href="../index.php">Kirby's Magic Kan-anan</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Administrator</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../img/key.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action = "login.php"method = "POST">
      <div class="input-group">
        <input type="username" name = "username" class="form-control" placeholder="Username" autofocus>
        <input type="password" name = "password" class="form-control" placeholder="Password" >

        <div class="input-group-btn">
          <button name = "login"class="btn"><i class="fa fa-arrow-right "></i></button>
        </div>
      </div>
    </form>
	
	
	
    <!-- /.lockscreen credentials -->

  </div>
	
		

<!-- JS -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
