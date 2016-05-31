<html>
<head>
	<?php
		extract($_POST);
		
		if ( !$USERNAME || !$PASSWORD ){
			fieldsBlank();
			die();
		}
		if ( isset( $NEWUSER))
		{
			if(!($file = fopen("data/password.txt","a")))
			{

				print("<title>Error</title></head><body>Could not open password file</body></html>");
				die();
			}
			fputs( $file, "$USERNAME,$PASSWORD\n");
			userAdded( $USERNAME );
		}
		else
		{

			if( !($file = fopen("data/password.txt","r"))){
				print("<title>Error</title></head><body>Could not open password file</body></html>");
				die();
			}
		}
$userVerified = 0;
while (!feof($file) && !$userVerified) {

	$line = fgets($file,255);
	$line = chop($line);
	$field= split(",",$line,2);

	if($USERNAME == $field[0]){

		$userVerified = 1;
		if(checkPassword ($PASSWORD, $field)==true){
			if(isadmin($USERNAME)==true)
			{
				print("<title>Thank you</title></head><body style=\"font-family:arial;font-size:1em;color:blue\"><strong>Welcome admin<br/>LIST OF USERS<br/></strong>");
				if( ($file1 = fopen("data/password.txt","r"))){
					while (!feof($file1)) {

						$line = fgets($file1,255);
						$line = chop($line);
						$field= split(",",$line,2);
						print("$field[0]<br/>");
					}
					fclose($file1);
				}
			}
			else
				accessGranted($USERNAME);
		}
		else
			wrongPassword();
	}
}
		fclose($file);

		if( !$userVerified)
			accessDenied();

	function checkPassword( $userpassword, $filedata)
	{
		if($userpassword == $filedata[1])
			return true;
		else
			return false;
	}
	function userAdded($name)
	{
		print("<title>Thank you</title></head><body style=\"font-family:arial;font-size:1em;color:blue\"><strong>You have been added to the user list,$name.<br/>Enjoy the site.</strong>");
	}
	function accessGranted($name)
	{
		print("<title>Thank you</title></head><body style = \"font-family:arial;font-size:1em;color:blue\"><strong>Permission has been granted,$name.<br/>Enjoy the site.</strong>");
	}
	function wrongPassword()
	{
		print("<title>Access Denied</title></head><body style = \"font-family:arial;font-size:1em;color:red\"><strong>you entered an invalid password.<br/>Access has been denied.</strong>");
	}
	function accessDenied()
	{
		print("<title>access Denied</title></head><body style=\"font-family:arial;font-size:1 em;color:red\"><strong>You were denied access to this server.<br/></strong>");
	}
	function fieldsBlank()
	{
		print("<title>Access Denied</title></head><body style =\"font-family:arial;font-size:1 em;color:red\"><strong>Please fill in all form fields.</br/></strong>");
	}
	function isadmin($user)
	{
			if($user == 'admin')
				return true;
			else
				return false;
	}

	 ?>
	</head>
</html>


