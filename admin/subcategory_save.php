<?php 

include('../includes/dbcon.php');
	
	$category = $_POST['subcategory'];
	
	$result = mysqli_query($con,"SELECT subcat_name FROM subcategory where subcat_name='$category'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
        	mysqli_query($con,"INSERT INTO subcategory(subcat_name) 
			VALUES('$category')")or die(mysqli_error());
			echo "<script>document.location='subcategory.php'</script>";   
		}
		else
		{
			echo "<script>document.location='subcategory.php'</script>";   
		}
?>