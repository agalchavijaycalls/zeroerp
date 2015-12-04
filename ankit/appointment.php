<?php 
include('conn.php');
include('controller.php');

class appointment extends controller
{
	public $userID;
	
	public function __construct( $userID )
	{
		$this->userID	=	trim((int)$userID);
	}
	
	public function appointmentList( )
	{
		if( $this->userID != '' )
		{
			$sql		=	sprintf( "SELECT * FROM rp_appointments WHERE userID = %d", $this->userID );
			$res		=	mysql_query( $sql );
			$count		=	mysql_num_rows( $res );
			
		}
		if( isset($count) && $count > 0 )
		{
			$data	=	array();
			while( $result	=	mysql_fetch_assoc( $res ) ){
				$data[]		=	$result;
			}
			$result	=	array(
								'status'	=>	'success',
								'code'		=>	'200',
								'data'		=>	array(
														'userID'			=>	$this->userID,
														'appointments'		=>	$count,
														'appointment_list'	=>	$data
													   )	
							);
		}
		else
		{
			$result	=	array(
							'status'	=>	'error',
							'code'		=>	'400',
							'data'		=>	array(
													'message'	=>	'Invalid userid'
												)
							);
		}
		return json_encode( $result );
	}
}

if( isset( $_POST['userid'] ) )
{
	$appointmentObj		=	new appointment( (int)$_POST['userid'] );
	$result				=	$appointmentObj->appointmentList( );
	echo $result;
}
