<?php 
include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
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

		// write the update query
		$sql = "UPDATE `form` SET `EnterName`='$name',`Gender`='$radio',`DateofBirth`='$dateofbirth',`EducationalQualification`='$education',`Designation`='$designation',`Department`='$department',`Experience`='$experiance',`Dateofjoining`='$date',`PhoneNumber`='$no', `Address`='$address',`AadharNumber`='$aadhar' WHERE `LecturerID`='$id'" ;

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


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
          <style>
            html{
                background-color: skyblue;
            }
            h1{
                color: rgb(5, 80, 28);
                text-align: center; 
                margin-top: 60px; 
            }
                 /* Style inputs with type="text", select elements and textareas */
                input[type=text], select, textarea,.date {
                width: 50%;              /* Full width */
                padding: 12px;            /* Some padding */ 
                border: 1px solid #ccc;  /* Gray border */
                border-radius: 4px;        /* Rounded borders */
                box-sizing: border-box;    /* Make sure that padding and width stays in place */
                margin-top: 6px;           /* Add a top margin */
                margin-bottom: 16px;       /* Bottom margin */
                resize: vertical           /* Allow the user to vertically resize the textarea (not horizontally) */
                }

                /* Style the submit button with a specific background color etc */
                input[type=submit] {
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                position: absolute;
                right: 50%;
                }

                /* When moving the mouse over the submit button, add a darker green color */
                input[type=submit]:hover {
                background-color:#9a9e9a;
                }

                /* Add a background color and some padding around the form */
                .container {
                border-radius: 5px;
                padding: 25px;
                width: 50%; 
                margin-left: 30%;
                margin-top: 2%;
                flex-direction: column;
                }
                .pos{
                    text-align:center;
                }
                label{
                    
                     cursor: pointer;
                     display: inline-block;
                      text-align: right;
                       width: 100px;
                     
                }
        </style>
		<h2>User Update Form</h2>
        <form action="" method="post">
             
             <label for ="Lecturer ID">Lecturer ID </label>
             <input type="text" id="Enter Your ID" name="id"  placeholder="Enter Your Id " value="<?php echo $id; ?>">
             <br/>

             <label for="Enter Your Name">Enter  Name</label>
             <input type="text" id="Enter Full Name" name="name"  placeholder="Enter Your Full Name " value="<?php echo $name; ?>">
             <br/>

             <label for="gender">Gender:</label>
               <input type="radio" name="radio" value="Male">Male
               <input type="radio" name="radio" value="Female">Female
             <br/>
             
             <label for="Date of Birth">Date of Birth</label>
             <input class="date" type="date" name =" dateofbirth" value="<?php echo $dateofbirth; ?>">
             <br/>

             <label for = "Educational Qualifications">Educational Qualifications </label>
             <input type="text" id="Educational Qualifications" name="education" placeholder="Educational Qualifications " value="<?php echo $education; ?>">
             <br/>
             
             <label for="Designation">Designation</label>
             <input type="text" id="Designation" name="designation" placeholder="Designation " value="<?php echo $designation; ?>">
             <br/>

             <label for="Department">Department</label>
             <input type="text" id="Department"name="Department"  placeholder="Department " value="<?php echo $department; ?>">
             <br/>
             <label for="Experience">Experience </label>
             <input type="text" id="Experience" name="experiance" placeholder="Experience " value="<?php echo $experiance; ?>">
             <br/>

             <label for="Date of joining">Date of joining</label>
             <input  class="date"  type="date" name="date"  value="<?php echo $date; ?>">
             <br/>
             
             <label for="Phone Number">Phone Number</label>
             <input type="text" id="Phone Number" name ="no"  placeholder="Phone Number" value="<?php echo $no; ?>">
             <br/>

             <label for="Address">Address</label>
             <input type="text" id="Address" name="address" placeholder="Address " value="<?php echo $address; ?>">
             <br/>

             <label for="Aadhar Number">Aadhar Number</label>
             <input type="text" id="Aadhar Number" name="aadhar" placeholder="Aadhar Number " value="<?php echo $aadhar; ?>">
             <br/>

             

             
             
             <div class="pos">
               <input type="submit" value="Update" name="update">
             </div>
         
           </form>



	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>