<?php 

include('../includes/dbcon.php');
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$menu = array_key_exists("menu",$_POST) ? $_POST['menu'] : [];
	
	mysqli_query($con,"INSERT INTO combo(combo_name,combo_price) 
			VALUES('$name','$price')")or die(mysqli_error());  
	$id=mysqli_insert_id($con);
	if (!empty($menu)) {
        foreach ($menu as $value)
        {
            if ($value<>0)
            {
            mysqli_query($con,"INSERT INTO combo_details(combo_id,menu_id)
                VALUES('$id','$value')")or die(mysqli_error());
            }
        }
	}
			echo "<script>document.location='combo.php'</script>";   
?>