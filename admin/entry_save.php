<?php

include('../includes/dbcon.php');

	$id = $_POST['id'];
	$state = $_POST['state'];

    mysqli_query($con,"DELETE FROM reservation WHERE rid='$id'")or die(mysqli_error($con));

    echo "<script type='text/javascript'>alert('Successfully deleted reservation.');</script>";
	if ($state === "cancelled") {
        echo "<script>document.location='cancelled.php'</script>";
	} else {
        echo "<script>document.location='finished.php'</script>";
	}
?>