<?php 
include "config.php";
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_POST['submit'])) {
    $id = $_POST['LecturerID'];
    $date = $_POST['dateofbirth'];

	// write SQL to get user data
	$sql = "SELECT * FROM `form` WHERE `LecturerID`='$id' and `DateofBirth`='$date'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
            $id = $row['LecturerID'];
            $name= $row['EnterName'];
            $radio= $row['Gender'];
            $dateofbirth= $row['DateofBirth'];
            $education= $row['EducationalQualification'];
              $designation=$row['Designation'];
              $department=$row['Department'];
              $experiance=$row['Experience'];
              $date=$row['Dateofjoining'];
              $no=$row['PhoneNumber'];
              $address=$row['Address'];
              $aadhar=$row['AadharNumber'];
		}

	?>

<div class="container">
		<h2>users</h2>
<table class="table">
	<thead>
		<tr>
		<th>LecturerID</th>
		<th>EnterName</th>
		<th>Gender</th>
		<th>DateofBirth</th>
		<th>EducationalQualification</th>
		<th>Designation</th>
        <th>Department</th>
        <th>Experience</th>
        <th>Dateofjoining</th>
        <th>PhoneNumber</th>
        <th>Address</th>
        <th>AadharNumber</th>

	</tr>
	</thead>
	<tbody>	
					<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $radio; ?></td>
					<td><?php echo $dateofbirth; ?></td>
					<td><?php echo $education; ?></td>
                    <td><?php echo $designation; ?></td>
                    <td><?php echo $department; ?></td>
                    <td><?php echo $experiance; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $aadhar; ?></td>
					</tr>	
	        	
	</tbody>
</table>
	</div>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>