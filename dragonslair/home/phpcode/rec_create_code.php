<?php
session_start();

include('../../connection/db.php');

//INSERTION
/*now post button press submit */
if (isset($_POST['submit'])) {
	// Get the values typed by the user
	$rec_fname = $_POST['rec_fname'];
	$rec_lname = $_POST['rec_lname'];
	$rec_img = $_POST['rec_img'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$companyname = $_POST['company'];
	$industry = $_POST['industry'];
	$website = $_POST['website'];
	$description = $_POST['description'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$zip = $_POST['zip'];
	$foundation = $_POST['foundation'];

	// Format the foundation date to MySQL format
	$foundation_date_mysql_format = date('Y-m-d', strtotime($foundation));

	
	// Check if the username already exists
	$username_query = "SELECT * FROM Recruiters WHERE username = '$username'";
	$result_username = mysqli_query($conn, $username_query);

	// Check if the email already exists
	$email_query = "SELECT * FROM Recruiters WHERE email = '$email'";
	$result_email = mysqli_query($conn, $email_query);

	if (mysqli_num_rows($result_username) > 0) {
		// Username already exists
		$_SESSION['status'] = "Username already exists.";
		header('location: ../create_recruiter.php');
		exit();
	} elseif (mysqli_num_rows($result_email) > 0) {
		// Email already exists
		$_SESSION['status'] = "Email already exists.";
		header('location: ../create_recruiter.php');
		exit();
	} else {
		
		// Insert query (with the new first name and last name fields)
		$insert_query = "INSERT INTO Recruiters (rec_fname, rec_lname, rec_img, email, username, password, companyname, industry, website, description, phone, address, city, country, zip_code, Foundation)
                         VALUES ('$rec_fname', '$rec_lname','rec_img', '$email', '$username', '$password', '$companyname', '$industry', '$website', '$description', '$phone', '$address', '$city', '$country', '$zip', '$foundation_date_mysql_format')";

		// Run the insert query
		$insert_query_run = mysqli_query($conn, $insert_query);

		if ($insert_query_run) {
			// Success: Set a session message and redirect to the sign-in page
			$_SESSION['status'] = "Recruiter Account Created successfully";
			header('location: ../sign_in.php');
			exit();
		} else {
			// Failure: Set a session message and inform the user
			$_SESSION['status'] = "Unsuccessful creation. Please try again.";
			header('location: ../create_recruiter.php');
			exit();
		}
	}
}
?>