<?php

 $fname = filter_input(INPUT_POST, 'fname'); 
 $mname = filter_input(INPUT_POST, 'mname');
 $lname = filter_input(INPUT_POST, 'lname');
 $email = filter_input(INPUT_POST, 'email');
 $contact = filter_input(INPUT_POST, 'contact');
 if( !empty($fname) | | !empty($mname) | | !empty($lname) | | !empty($email) | | !empty($contact)) {
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
		$SELECT = "SELECT email From booking Where email = ? Limit 1";
		$INSERT = "INSERT Into booking (fname, mname, lname, email, contact) values(?, ?, ?, ?, ?);
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$email);	
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
			if ($rnum==0) {
				$stmt->close();
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssssi", $fname,$mname, $lname, $email, $contact);
				$stmt->execute();
				 echo "Your booking is done";
			}
			else{
				echo "Someone already booked using this email";
			}
			$stmt->close();
			$conn->close(); 
           	 }
}

 else{
	echo "Details should not be empty";
	 die();
 }
?>
