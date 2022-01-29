<?php 
include "config.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_POST['submit'])) {
	$id = $_POST['LecturerID'];
    $date = $_POST['dateofbirth'];
	// write delete query
	$sql = "DELETE FROM `form` WHERE `LecturerID`='$id' and `DateofBirth`='$date'";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo "Record deleted successfully.";
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?>