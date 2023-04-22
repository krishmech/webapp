<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login_credential';

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check for connection errors
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Get the user input from a form or API request
$email =$_POST['username'];
$password =$_POST['password'];

// Prepare and execute the SQL query to retrieve the user from the database
$query = "SELECT * FROM login WHERE username = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

// Check if the query was successful and if a matching user was found
if ($result && mysqli_num_rows($result) == 1) {
    // Authentication successful, redirect to the user's dashboard or other page
    header("Location: Home.php");
    exit();
} else {
    // Authentication failed, show an error message or redirect to the login page
    header("Location: Index.html");
    sleep(2);
    echo ('<script>
    document.getElementsByClassName("err").setAttribute("style","display:block;");
</script>');
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
This code assumes that you have a "users" table in your database with columns for "email" and "password". When a user submits a login form with their email and password, the code retrieves those values and constructs a SQL query to find a matching user in the database. If a user is found, the code redirects them to their dashboard; otherwise, it redirects them back to the login page with an error message.






