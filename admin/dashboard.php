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
  <title>Dashboard - <?php include('../includes/title.php');?></title>
  <?php include('../includes/links.php');?>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
      <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span>Menu</span>
      </button>
      <!-- Site name for smallar screens -->
      <a href="index.html" class="navbar-brand hidden-lg">Chimney</a>
    </div>
      
      <?php include('../includes/topbar.php');?>
    

    </div>
  </div>



<!-- Main content starts -->

<div class="content" style="margin-top:10px">

    <!-- Sidebar -->
    <?php include('../includes/sidebar.php');?>

    <!-- Sidebar ends -->

        <!-- Main bar -->
    <div class="mainbar">
      
      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-home"></i> Dashboard</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="index.html"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Reservations</a>
          <span class="divider">/</span> 
          <a href="#" class="bread-current">View Details</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->



       <!-- Matter -->

      <div class="matter">
        <div class="container">
          <div class="row">
<?php
include('../includes/dbcon.php');
    $today=date('Y-m-d');
    $query=mysqli_query($con,"select COUNT(*) as count from reservation where r_status='Approved' and r_date>='$today'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $count=$row['count'];
?>             
                      <div class="col-md-4">
                        <div class="alert alert-info">
                          <i class="fa fa-thumbs-o-up pull-left" style="font-size:65px"></i><h2> <?php echo $count;?> </h2>
                          <p>Approved</p>
                        </div>
                      </div>
<?php
    $query=mysqli_query($con,"select COUNT(*) as count from reservation where r_status='Pending' and r_date>='$today'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $count=$row['count'];
?> 
                      <div class="col-md-4">
                        <div class="alert alert-warning">
                          <i class="fa fa-spinner pull-left" style="font-size:65px"></i><h2 class=""><?php echo $count;?></h2>
                          <p>Pending</p>                        
                        </div>
                      </div>
<?php
    $query=mysqli_query($con,"select COUNT(*) as count from reservation where r_status='Finished'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $count=$row['count'];
?> 
                      <div class="col-md-4">
                        <div class="alert alert-success">
                          <i class="fa fa-check-circle-o pull-left" style="font-size:65px"></i><h2><?php echo $count;?></h2>
                          <p>Finished</p>
                        </div>
                      </div>

                    
          </div>  <!--row-->
          
<?php
    $query=mysqli_query($con,"select * from reservation where r_status='Approved' and r_date>='$today' order by r_date")or die(mysqli_error($con));
      while($row=mysqli_fetch_array($query)){
        $name=$row['r_last'].", ".$row['r_first'];
        $date=$row['r_date'];
?> 

                      <li>

                        <div class="recent-content">
                          <div class="recent-meta"><?php echo date("M d, Y",strtotime($date));?></div>
                          <div><?php echo $name;?>
                          </div>

                          <div class="clearfix"></div>
                        </div>
                      </li>

<?php }?>                                    


                    </ul>
                      
                  </div><!--pad-->
                </div><!--widget content-->  
              </div><!--widget-->
            </div><!--col 6-->

          </div>
        </div>
      </div>

    <!-- Matter ends -->


    </div>

   <!-- Mainbar ends -->
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<?php include('../includes/footer.php');?>  

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

  // sending query
  mysqli_query($con,"delete from reservation WHERE rid='$id'")
  or die(mysqli_error());
  echo "<script>document.location='pending.php'</script>";
    }
    ?>
<!-- JS -->
<?php include('../includes/js.php');?>  
<script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 25
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Sales'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("data1.php", function(json) {
      options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph1',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 25
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Reservations'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("data_reserve1.php", function(json) {
      options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
</body>
</html>