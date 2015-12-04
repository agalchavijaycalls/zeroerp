<?php 
include('conn.php');
include('controller.php');
class Login extends controller
{
	public function __construct()
	{
		
	}
	
	public function authenticate()
	{

		$username	=	trim( $_POST['username'] );

		$password	=	trim( $_POST['password'] );

		if( $username != ''  && $password != '' )

		{

			$sql		=	sprintf( "SELECT userID,name FROM rp_app_users WHERE username = '%s' AND password = '%s'", $username, md5($password) );
			//echo $sql;die;
			$res		=	mysql_query( $sql );

			$count		=	mysql_num_rows( $res );

		}

		if( isset($count) && $count > 0 )

		{

			$row	=	mysql_fetch_assoc( $res );

			$result	=	array(

								'status'	=>	'success',

								'code'		=>	'200',

								'data'		=>	array(

								'userid'	=>	$row['userID'],

								'name'		=>	$row['name']

											)

					        );

		}

		else

		{

			$result	=	array(

							'status'	=>	'error',

							'code'		=>	'400',

							'data'		=>	array(

							'message'	=>	'Invalid username/password'

										)

						);

		}

		return json_encode( $result );

	}

}



if( isset( $_POST['username'] )  && ($_POST['password']))

{

	$username = $_POST['username'] ;

 	$password =$_POST['password'];

	$loginObj	=	new Login();

	$result		=	$loginObj->authenticate();

	echo $result;

}