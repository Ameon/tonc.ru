<?
session_start();
require_once('config.php');


if (isset($_POST['userid']) && isset($_POST['password'])) {
	// if the user has just tried to log in 
	$username = $_POST['userid']; 
	$password = $_POST['password'];
	
	$query = 'select * from users ' 
			 ."where login ='$username' "
			 ." and password = md5('$password')";
				 
	$result = mysql_query($query,$connection) or die(mysql_error());
	$num_results = mysql_num_rows($result);
		
	if (mysql_num_rows($result)) {
		// if they are in the database register the user id 
		$_SESSION['valid_user'] = $username;
		
		for ($i=0; $i <$num_results; $i++) { 
		
		$row = mysql_fetch_assoc($result); 	
			$fd = $row['id'];
			
		}
		$_SESSION['user_id'] = $fd;
	
	
	}
	 
	 
	 
	 
} 

if (isset($_SESSION['valid_user'])) {
	 if ($_POST['remember']) { // Set cookie if user checked remember me
	 	setcookie("cookname", $username, time()+60*60*24*100, "/");
    	setcookie("cookpass", md5($password), time()+60*60*24*100, "/");
    }
	echo "<script>document.location.href='/index';</script>\n";
} 
else {
	//echo "<script>document.location.href='/login';</script>\n";
}

?>