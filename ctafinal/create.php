<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
      $id = $_POST['id'];
      $name= $_POST['name'];
      $radio= $_POST['radio'];
      $dateofbirth= $_POST['dateofbirth'];
      $education= $_POST['education'];
        $designation=$_POST['designation'];
        $department=$_POST['Department'];
        $experiance=$_POST['experiance'];
        $date=$_POST['date'];
        $no=$_POST['no'];
        $address=$_POST['address'];
        $aadhar=$_POST['aadhar'];

		//write sql query

		$sql = "INSERT INTO `form` (`LecturerID`,`EnterName`,`Gender`,`DateofBirth`,`EducationalQualification`,`Designation`,`Department`,`Experience`,`Dateofjoining`,`PhoneNumber`, `Address`,`AadharNumber`) VALUES ('$id','$name','$radio','$dateofbirth','$education','$designation','$department','$experiance','$date','$no','$address','$aadhar')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>