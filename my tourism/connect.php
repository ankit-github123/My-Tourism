<?php
 $fname = filter_input(INPUT_POST, 'fname');
 $mname = filter_input(INPUT_POST, 'mname');
 $lname = filter_input(INPUT_POST, 'lname');
 $email = filter_input(INPUT_POST, 'email');
 $contact = filter_input(INPUT_POST, 'contact');
 if (!empty($fname) || (!empty($mname) || (!empty($lname) || (!empty($email) || (!empty($contact)){
	$host = "localhost";
	$dbfname = "";
	$dbmname = "";
	$dblname = "";
	$dbemail = "";
	$dbcontact = "";
	$dbname = "travel";
	$conn = new mysqli ($host, $dbfname, $dbmname, $dblname, $dbemail, $dbcontact);
	if (mysqli_connect_error()){
		die('Connect error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
  	}
	else{
	$sql = "INSERT INTO booking (fname, mname, lname, email, contact) values ('$fname', '$mname', '$lname','$email', '$contact')";
	if ($conn->query($sql)){
	  echo "new record is inserted";
         	}
	else{
	 echo "error:". $sql ."<br>".$conn->error;
	     }
	$conn->close();
            }
	}
 else{
	echo "All feilds should not be empty";
	 die();
 }
?>
