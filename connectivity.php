<?php 
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'wcs'); 
	define('DB_USER','root'); 
	define('DB_PASSWORD',''); 
	
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD)
	or die("ERROR: " . mysql_error()); 
	
	$db=mysql_select_db(DB_NAME,$con)
		or die("ERROR: " . mysql_error()); 
		
	function SignIn() 
	{ 
		session_start();
		 
		if(!empty($_POST['email']))
		 
		{ 
			$query = mysql_query("SELECT * FROM student where email = '$_POST[email]' AND pass = '$_POST[pass]'") 
			or die (mysql_error()); 
			$row = mysql_fetch_array($query) 
			or die('<p><h1>Sorry.... ☹️  </p><p>You Entered Wrong Email And Password...</p><p> <a href="login.html">CLICK HERE</a> to Go Back</h1></p>'.mysql_error());
			if(!empty($row['email']) AND !empty($row['pass'])) 
			{ 
				$_SESSION['email'] = $row['pass']; 
				 echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
				header("Location: After Login.html");
			} 
			/*else 
			{
				echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
			} */
		} 
	} 
	if(isset($_POST['submit'])) 
	{ 
		SignIn();
	} 
 ?>

