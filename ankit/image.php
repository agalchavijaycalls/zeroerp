<?php
include('conn.php');
include("controller.php");
class Image extends Controller
{
	public function saveImagesInfo($filename,$app_id,$room_id,$userid)
	{				
	
                               $insert = "insert into rp_app_images(user_id,appointment_id,room_id,image,medium_images,thum_images)VALUES('".$userid."' ,'".$app_id."','".$room_id."','".$filename."','','')";
$qry=mysql_query($insert);
                                                    if($qry)
                                                                {
                                                                      $i=move_uploaded_file($_FILES['image']['tmp_name'],"img/".$filename);
			     
				$status='Success';    
						return $status;
                                                                }
		                      else
		                           {
			                    $status='Failure'; 
						return $status;
		                            }	
	}
}
$image = $_FILES['image']['name'];
$userid=$_POST['userid'];
$app_id  = $_POST['app_id'];
$room=$_POST['room_id'];
$type =$_POST['type'];
$room_id=$room.$type;
					/* Delete image from database */
$selectQuery = "SELECT * FROM rp_app_images WHERE image=$image";

$selectQueryResult = mysql_query($selectQuery);

if($selectQueryResult){

	while($getEachRow = mysql_fetch_assoc($selectQueryResult)){

				unlink("img/".$getEachRow['image']);

				$deleteQuery = "DELETE FROM rp_app_images WHERE image=$image";

				 mysql_query($deleteQuery);

			}	

}
$imageObj = new Image();
$Result = $imageObj->saveImagesInfo($image,$app_id,$room_id,$userid);
if($Result=='Success')
{
	$code=200;
}
else
{
	$code=400;
}
$msg=array(
			'id'=>$userid,
			'image'=>$image,
			'room_id'=>$room_id,
			'status'=>$Result,
			'code'=>$code
		   );
		echo json_encode($msg);
?>
