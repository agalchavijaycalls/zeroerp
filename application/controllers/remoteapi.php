<?php 

/* Controller for login Functionality */
class Remoteapi extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('AppmanagerGateway_model');
	}
	function locationUpdate()
	{
		$data=json_decode($_POST['employeeData']);
		$imei=$data->employeeIMEI;
		if(isset($imei) && !empty($imei) && isset($data->employeeOrganizationName) && !empty($data->employeeOrganizationName))
		{   //print_r($_POST['employeeData']);die;
			//	redirect('http://junctiondev.cloudapp.net/appmanager/Appmanagergateway/CheckAuthonticate/'.$_POST['employeeData']);
			//echo 'error';die;
			$TempConnection=mysqli_connect("localhost",'root','bitnami','appmanager');
			if($TempConnection)
			{
				$DatabaseName="select db_name from registered_application where db_name='".$data->employeeOrganizationName."'";
				$sql=mysqli_query($TempConnection, $DatabaseName);//print_r($sql);
				$count=mysqli_num_rows($sql); //print_r($count);die;
				if(isset($count) && $count > 0)
				{
					$CONNECTION=mysqli_connect("localhost",'root','bitnami',$data->employeeOrganizationName);
					if($CONNECTION)
					{
						foreach ($data->employeeLocationList as $list)
						{
							if(isset($list->employeeLocationDate)&&isset($list->employeeLocationTime)&&isset($list->employeeLocationLatitude)&&isset($list->employeeLocationLongitude)&&!empty($list->employeeLocationLatitude)&&!empty($list->employeeLocationLongitude)&&!empty($list->employeeLocationDate)&&!empty($list->employeeLocationTime) )
							{
								$CheckImeiStatus="select * from newregistration where imei='".$imei."' and status='Enable'";
								$sql=mysqli_query($CONNECTION,$CheckImeiStatus);//print_r($sql);die;
								if($sql->num_rows>0)
								{
									$GetImeiListData="select * from tracking where imei='".$imei."' and date='".$list->employeeLocationDate."' and time='".$list->employeeLocationTime."'";
									$sql=mysqli_query($CONNECTION,$GetImeiListData); 
									//$count=mysqli_num_rows($sql);
									if(!$sql->num_rows>0)
									{
										$result = "INSERT INTO tracking VALUES('".$imei."','".$list->employeeLocationDate."','".$list->employeeLocationTime."','".$list->employeeLocationLatitude."','".$list->employeeLocationLongitude."','".$list->employeeLocationProviderName."','".$list->employeeLocationBatteryLevel."')";
										$sql=mysqli_query($CONNECTION,$result);
										if($sql)
										{
											$employee_list[]=array(
															'employeeLocationDate'=>$list->employeeLocationDate,
															'employeeLocationTime'=>$list->employeeLocationTime,
															'status'=>'success',
														 );
										}
										else
										{
											$employee_list[]=array(
													'employeeLocationDate'=>$list->employeeLocationDate,
													'employeeLocationTime'=>$list->employeeLocationTime,
													'status'=>'pending',
											);
										}
									}
									else
									{
										$employee_list[]=array(
												'employeeLocationDate'=>$list->employeeLocationDate,
												'employeeLocationTime'=>$list->employeeLocationTime,
												'status'=>'success',
												'report'=>'already insert',
										);
									}
								}
								else
								{
									$employee_list[]=array(
											//'date'=>$list->employeeLocationDate,
											//'time'=>$list->employeeLocationTime,
											'status'=>'Imei Disable',
									);
									echo json_encode($employee_list);die;
								}
							}
							else
							{
								$employee_list[]=array(
										'employeeLocationDate'=>$list->employeeLocationDate,
										'employeeLocationTime'=>$list->employeeLocationTime,
										'status'=>'Key Not Found',
								);
							} 
						}
						$employee_list=array('status'=>'success','imei'=>$imei,'employee_list'=>$employee_list);
						echo json_encode($employee_list);
								
					}
					else
					{
						$employee_list=array('status'=>'Server Error Connection Not Found');
						echo json_encode($employee_list);
					}
				}
				else
				{
					$employee_list=array('status'=>'Database Name Not Found');
					echo json_encode($employee_list);
				}
				
			}
			else
			{
				$employee_list=array('status'=>'Temprory Server Error Connection Not Found');
				echo json_encode($employee_list);
			} 
			
		}
		else
		{
			//echo 'success';die;
			$employee_list=array('status'=>'Database Name Not Found In Server');
			echo json_encode($employee_list);
		}
		
	}
	

	function employeeRegister()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
		if($CONNECTION!=='')
		{
			$data=json_decode($_POST['registration_info']);
			$query= "select * from registered_application where db_name='".$data->employeeOrganizationName."'";
			$sql=mysqli_query($CONNECTION,$query);
			$count=mysqli_num_rows($sql);
			if(isset($count) && $count > 0 )
			{
				$new_connection=mysqli_connect("localhost",'root','bitnami',$data->employeeOrganizationName);
				$CheckImeiStatus="select * from newregistration where imei='".$data->employeeIMEI."'";
				$result=mysqli_query($new_connection,$CheckImeiStatus);
				$count=mysqli_num_rows($result);
				if(isset($count) && !$count > 0 )
				{
					$query= "INSERT INTO newregistration (employee_id,name,number,password,imei,device,status,created_by,created_on,updated_by,updated_on) VALUES('".$data->employeeId."','".$data->employeeName."','".$data->employeeMobileNumber."','".$data->employeePassword."','".$data->employeeIMEI."','androide','new','".$data->employeeName."','".date('d-m-Y')."','','')"; //echo $query; die;
					$sql=mysqli_query($new_connection,$query);
					if($sql)
					{
						echo 'Information Registered Successfully';
					}
				}
				else
				{
					echo 'Imei Already Exist In Database';die;
				}
				
			}
			else
			{
				echo 'Data Base Does Not Exist';die;
			}
		}
		else
		{
			echo 'Connection Not Found Server Error';die;
		}
	
	}
	
	
	/* Function For Retrive Project List*/
	function project()
	{
		$CONNECTION=mysqli_connect('localhost','root','bitnami',$_POST['database_name']);
		if($CONNECTION!=='')
		{
			$query= "select * from project";
			$sqls=mysqli_query($CONNECTION,$query);
			$count=mysqli_num_rows($sqls);
			if(isset($count) && $count > 0)
			{
				while($result_project=mysqli_fetch_assoc($sqls))
				{
					$project_id=$result_project['project_id'];
					$project_description= $result_project['project_description'];
					$status= $result_project['status'];
					$start_date=$result_project['start_date'];
					$query= "select * from task where project_id='".$result_project['project_id']."'";
					$sql=mysqli_query($CONNECTION,$query);
					$counts=mysqli_num_rows($sql);
					$task_data	=	array();
					if(isset($counts) && $counts > 0)
					{
						while($result_task=mysqli_fetch_assoc( $sql ))
						{
							$task_data[]=$result_task;
						}
					}
					$temp_project_list[]=array('project_id'=>$project_id,
							'project_description'=>$project_description,
							'status'=>$status,
							'start_date'=>$start_date,
							'list_of_task'=>$task_data,
					);
				}
				$result=array(
						'project_of_list'=>$temp_project_list,
				);
				echo json_encode($result);
				die;
			}
			else
			{
				echo 'Project List Not Found In Server';
			}
		}
		else
		{
			echo 'database does not exist';
		}
	}
	
	
	/* Function for Image Update For Androide Application */
	function project_image_update()
	{
		//$data=json_decode($_POST['projectData']);
		$CONNECTION=mysqli_connect("localhost",'root','bitnami',$_POST['database_name']);
		if($CONNECTION)
		{
			$sql="select * from project_image where image='".$_FILES['image_name']['name']."'";
			$query=mysqli_query($CONNECTION,$sql);
			{
				$query="insert into project_image(project_id,task_id,image) values ('".$_POST['project_id']."','".$_POST['task_id']."','".$_FILES['image_name']['name']."')";
				$sql=mysqli_query($CONNECTION,$query);
				if($sql) 
				{
					$image=move_uploaded_file($_FILES['image_name']['tmp_name'],"project_image/".$_FILES['image_name']['name']); 
					$result=array(
									'status'=>'success',
									'image' =>$_FILES['image_name']['name'],
							     );
					echo json_encode($result);
				}
				else
				{
					$result=array(
									'status'=>'pending',
									'image' =>$_FILES['image_name']['name'],
							     );
					echo json_encode($result);
				}
			}
			die;
			
		}
		else
		{
			echo 'Server Error Connection Not Found';
		}
		
	}

	/* Function for Update Task For Androide Application */
	function project_update()
	{
		$data=json_decode($_POST['projectData']);//print_r($data);die;
		$CONNECTION=mysqli_connect("localhost",'root','bitnami',$data->database_name);
		if($CONNECTION)
		{
			//$data=json_decode($_POST['projectData']);//print_r($data);die;
			$UserId=$data->user_id;//print_r($data->project_List);die;
			foreach($data->project_List as $ProjectList)
			{
				$ProjectId=$ProjectList->project_id;
				if(isset($ProjectList->expense_list)&& !empty($ProjectList->expense_list))
				{
					foreach ($ProjectList->expense_list as $value)
					{
						$TaskId=NULL;
						$FindExpenseKey="select * from expenser where expense_key='".$value->key."'";
						$query=mysqli_query($CONNECTION,$FindExpenseKey);
						if(!$query->num_rows>0)
						{
							$insert="insert into expenser(project_id,user_id,task_id,date,expense_key,expense_type,amount,type,description) values ('".$ProjectId."','".$UserId."','".$TaskId."','".$value->date."','".$value->key."','".$value->expense_type."','".$value->amount."','".$value->type."','".$value->description."')";
							$query=mysqli_query($CONNECTION,$insert);
							if($query)
							{
								$expense_list[]=array(
										'key'=>$value->key,
										'status'=>'success',
								);
							}
							else
							{
								$expense_list[]=array(
										'key'=>$value->key,
										'status'=>'pending',
								);
							}
						}
						else
						{
							$Update="update expenser set project_id='".$ProjectId."',user_id='".$UserId."',task_id='".$TaskId."',date='".$value->date."',expense_type='".$value->expense_type."',amount='".$value->amount."',type='".$value->type."',description='".$value->description."' where expense_key='".$value->key."'";
							$query=mysqli_query($CONNECTION,$Update);
							if($query)
							{
								$expense_list[]=array(
										'key'=>$value->key,
										'status'=>'success',
								);
							}
							else
							{
								$expense_list[]=array(
										'key'=>$value->key,
										'status'=>'pending',
								);
							}
						}
						
					}
				}
				if(isset($ProjectList->receipt_list)&& !empty($ProjectList->receipt_list))
				{	
					foreach ($ProjectList->receipt_list as $value)
					{
						$FindRecieptKey="select * from reciepts where reciepts_key='".$value->key."'";
						$query=mysqli_query($CONNECTION,$FindRecieptKey);
						if(!$query->num_rows>0)
						{
							$TaskId=NULL;
							$insert="insert into reciepts(project_id,user_id,task_id,material,date,reciepts_key,quantity,rate,unit,description) values ('".$ProjectId."','".$UserId."','".$TaskId."','".$value->material."','".$value->date."','".$value->key."','".$value->quantity."','".$value->rate."','".$value->unit."','".$value->description."')";
							$query=mysqli_query($CONNECTION,$insert);
							if($query)
							{
								$receipt_list[]=array(
										'key'=>$value->key,
										'status'=>'success',
								);
							}
							else
							{
								$receipt_list[]=array(
										'key'=>$value->key,
										'status'=>'pending',
								);
							}
						}
						else
						{
							$Update="update reciepts set project_id='".$ProjectId."',user_id='".$UserId."',task_id='".$TaskId."',material='".$value->material."',date='".$value->date."',quantity='".$value->quantity."',rate='".$value->rate."',unit='".$value->unit."',description='".$value->description."' where reciepts_key='".$value->key."'";
							$query=mysqli_query($CONNECTION,$Update);
							if($query)
							{
								$receipt_list[]=array(
										'key'=>$value->key,
										'status'=>'success',
								);
							}
							else
							{
								$receipt_list[]=array(
										'key'=>$value->key,
										'status'=>'pending',
								);
							}
						}
					}
				}
				if(isset($ProjectList->task_list)&& !empty($ProjectList->task_list))
				{
					foreach($ProjectList->task_list as $TaskList)
						{
							$TaskId= $TaskList->task_id;
							if(isset($TaskList->expense_list)&& !empty($TaskList->expense_list))
							{
								foreach ($TaskList->expense_list as $value)
								{
									$FindExpenseKey="select * from expenser where expense_key='".$value->key."'";
									$query=mysqli_query($CONNECTION,$FindExpenseKey);//echo $query->num_rows;die;//print_r($query);die;
									if(!$query->num_rows>0)
									{
										$insert="insert into expenser(project_id,user_id,task_id,date,expense_key,expense_type,amount,type,description) values ('".$ProjectId."','".$UserId."','".$TaskId."','".$value->date."','".$value->key."','".$value->expense_type."','".$value->amount."','".$value->type."','".$value->description."')";
										$query=mysqli_query($CONNECTION,$insert);
										if($query)
										{
											$expense_list[]=array(
													'key'=>$value->key,
													'status'=>'success',
											);
										}
										else
										{
											$expense_list[]=array(
													'key'=>$value->key,
													'status'=>'pending',
											);
										}
									}
									else
									{
										$Update="update expenser set project_id='".$ProjectId."',user_id='".$UserId."',task_id='".$TaskId."',date='".$value->date."',expense_type='".$value->expense_type."',amount='".$value->amount."',type='".$value->type."',description='".$value->description."' where expense_key='".$value->key."'";
										$query=mysqli_query($CONNECTION,$Update);
										if($query)
										{
											$expense_list[]=array(
													'key'=>$value->key,
													'status'=>'success',
											);
										}
										else
										{
											$expense_list[]=array(
													'key'=>$value->key,
													'status'=>'pending',
											);
										}
									}
								}
							}
							if(isset($TaskList->receipt_list)&&!empty($TaskList->receipt_list))
							{
								foreach ($TaskList->receipt_list as $value)
								{
									$FindRecieptKey="select * from reciepts where reciepts_key='".$value->key."'";
									$query=mysqli_query($CONNECTION,$FindRecieptKey);
									if(!$query->num_rows>0)
									{
										$insert="insert into reciepts(project_id,user_id,task_id,material,date,reciepts_key,quantity,rate,unit,description) values ('".$ProjectId."','".$UserId."','".$TaskId."','".$value->material."','".$value->date."','".$value->key."','".$value->quantity."','".$value->rate."','".$value->unit."','".$value->description."')";
										$query=mysqli_query($CONNECTION,$insert);
										if($query)
										{
											$receipt_list[]=array(
													'key'=>$value->key,
													'status'=>'success',
											);
										}
										else
										{
											$receipt_list[]=array(
													'key'=>$value->key, 
													'status'=>'pending',
											);
										}
									}
									else
									{
										$Update="update reciepts set project_id='".$ProjectId."',user_id='".$UserId."',task_id='".$TaskId."',material='".$value->material."',date='".$value->date."',quantity='".$value->quantity."',rate='".$value->rate."',unit='".$value->unit."',description='".$value->description."' where reciepts_key='".$value->key."'";
										$query=mysqli_query($CONNECTION,$Update);
										if($query)
										{
											$receipt_list[]=array(
													'key'=>$value->key,
													'status'=>'success',
											);
										}
										else
										{
											$receipt_list[]=array(
													'key'=>$value->key,
													'status'=>'pending',
											);
										}
									}
								
								}
							
							}
						}
					}
				}
				if(!isset($expense_list))
				{
					$expense_list='';
				}
				if(!isset($receipt_list))
				{
					$receipt_list='';
				}
				$array=array(
						'expense_list'=>$expense_list,
						'receipt_list'=>$receipt_list,
				);
				echo json_encode($array);
			
		}
		die;
		
	}
	
	function test()//http://junctiondev.cloudapp.net/appmanager/
	{
		if(isset($_GET['result']) && $_GET['result']!=='')
		{
			echo $_GET['result'];die;
		} ?><div id="ankit">
		 <?php  echo 'hi ankit i'; ?>
		 </div><?php
		 $value= $_POST['json']; //url is http://junctiondev.cloudapp.net/appmanager/Appmanagergateway/CheckAuthonticate/'.$value
		 redirect('http://localhost/appmanager/Appmanagergateway/CheckAuthonticate/demoerp');//die;
		
		 
		//header('location:http://junctiondev.cloudapp.net/appmanager/AppmanagerGateway/CheckAuthonticate/'.$value); 
		//echo $result;  
	}

	
function loanRegistration()
 {
  $CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
  if($CONNECTION!=='')
  {
  	$data1=json_decode($_POST['registration_info'],true);
  	$data = $data1['mValues'];
  	
  	$LoanApp_emailId = $data['LoanApp_emailId'];
  	$LoanApp_name =$data['LoanApp_name'];
  	$LoanApp_address = $data['LoanApp_address'];
  	$LoanApp_mobileNumber = $data['LoanApp_mobileNumber'];
  	$LoanApp_panNumber = $data['LoanApp_panNumber'];
  	$code = "";
  	$message ="";
  	$result =array();
  	
  	$status=$_POST['insert_update_status']; 	  	
  	
  	if ($status=="false"){  	  		
  		
  		
  		$sql = "UPDATE loan_registration SET name='$LoanApp_name',address='$LoanApp_address',mobileNo='$LoanApp_mobileNumber',panNumber='$LoanApp_panNumber' WHERE emailId='$LoanApp_emailId'";
  		
  		if (mysqli_query($CONNECTION,$sql)){
  			
  			$code = "200";
  			$message ="Updation Successfully";
  			
//   		 $result=array(
//          'code'=>200,
//          'message'=>'Updation Successfully',
//          );
//      print_r(json_encode($result));
    }
    else
    {
    	$code = "400";
    	$message ="Updation Failed";
    	
//      $result=array(
//          'code'=>400,
//          'message'=>'Updation Failed',
//          );
//       print_r(json_encode($result));   
    }
  		
  		
  		
  	}else { 
  	  	
  		$query= "select * from loan_registration where emailId='$LoanApp_emailId'";
  		$sql=mysqli_query($CONNECTION,$query);
  		
  		$counts=mysqli_num_rows($sql);
  		// print $counts;die;
  		if($counts==0)
  		{  			
  		
  			$query= "INSERT INTO loan_registration (emailId,name,address,mobileNo,panNumber) VALUES('$LoanApp_emailId','$LoanApp_name','$LoanApp_address','$LoanApp_mobileNumber','$LoanApp_panNumber')"; //echo $query; die;
  		
  			$sql=mysqli_query($CONNECTION,$query);
  			if($sql)
  			{
  				$code = "200";
  				$message ="Registered Successfully";
  				
//   				$result=array(
//   						'code'=>200,
//   						'message'=>'Registered Successfully',
//   				);
//   				print_r(json_encode($result));
  			}
  			else
  			{
  				$code = "400";
  				$message ="Registered Failed";
  				
//   				$result=array(
//   						'code'=>400,
//   						'message'=>'Registration Failed',
//   				);
//   				print_r(json_encode($result));
  			}
  		}
  		else
  		{
  			$code = "300";
  			$message ="Email Id Already Exist";
  			
//   			$result=array(
//   					'code'=>300,
//   					'message'=>'Email Id Already Exist',
//   			);
//   			print_r(json_encode($result));
  			
  		}
  		}
  		
  	}else
  		{
  			$code = "400";
  			$message ="Error";
  			
//   			$result=array(
//   					'code'=>400,
//   					'message'=>'Error',
//   			);
//   			print_r(json_encode($result));
  		}
  		
  		$result=array(
  				'code'=>$code,
  				'message'=>$message,
  		);
  		print_r(json_encode($result));
 }
	
 
 function saveReferenceSoughtData(){
 	$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
 	if($CONNECTION!=='')
 	{ 		
 		$emailId = $_POST['emailId'];
 		$referralEmailId = $_POST['referralEmailId'];
 		$dateTime = $_POST['dateTime'];
 		$like_dislike_status = $_POST['like_dislike_status'];		

 		$query= "select * from seek_reference,loanapplication where seek_reference.emailId='$referralEmailId' and seek_reference.date_time='$dateTime' and loanapplication.emailId=seek_reference.emailId and seek_reference.date_time=loanapplication.date_time";
 		$sql=mysqli_query($CONNECTION,$query);
 		
 		
 		if ($sql)
 		{
 		$fetchRes =	mysqli_fetch_array($sql);
 				
 			$Previous_like_dislike_status = $fetchRes['like_dislike_status'];
 			$totalLike = $fetchRes['like'];
 			$totalDislike = $fetchRes['dislike'];
 				
 			
 			if ($Previous_like_dislike_status=="0"||$Previous_like_dislike_status=="" ){
 				if ($like_dislike_status=="like")
 					$totalLike++;
 				else if ($like_dislike_status=="dislike")
 					$totalDislike++;
 			
 			}else if ($Previous_like_dislike_status=="like"){
 				if ($like_dislike_status=="dislike"){
 					$totalDislike++;
 					if ($totalLik!="0")
 					$totalLike--;
 				}
 			}else if ($Previous_like_dislike_status=="dislike"){
 					if ($like_dislike_status=="like"){
 						$totalLike++;
 						if ($totalDislike!="0")
 						$totalDislike--;
 					}
 				}
 			
 					
 				
 					
 				$Update_seek_reference ="update seek_reference set like_dislike_status='$like_dislike_status' where emailId = '$referralEmailId' and referalEmailId='$emailId' and date_time='$dateTime'";
 			
 				//$Update_loanapplication ="update loanapplication set like='$totalLike' , dislike= '$totalDislike' where emailId = '$referralEmailId' and date_time='$dateTime'";
 		$Update_loanapplication =	"UPDATE `loanapplication` SET `like`='$totalLike',`dislike`='$totalDislike' WHERE emailId ='$referralEmailId' AND date_time ='$dateTime'";
 					
//  				if (mysqli_query($CONNECTION,$Update_seek_reference) ){
//  					$res = "seek";
 			
//  				}
//  				 if (mysqli_query($CONNECTION,$Update_loanapplication)) 
//  				 	$res ="loan application";				 	

 				 	if (mysqli_query($CONNECTION,$Update_seek_reference) && mysqli_query($CONNECTION,$Update_loanapplication))
 				 	$result=array(
 							'code'=>200,
 							'message'=>'Status updated successfully'
 					);
 				else
 					$result=array(
 							'code'=>200,
 							'message'=>'Status updation failed'
 					);
 				print_r(json_encode($result));
 		}
 		
 	
 	
 	
 	}
 	else
 	{
 		$result=array(
 				'code'=>400,
 				'message'=>'Server Not Error'
 		);
 		print_r(json_encode($result));
 	}
 }
 
 
 function getReferenceSoughtData(){
 	$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
 	if($CONNECTION!=='')
 	{
 		$emailId = $_POST['emailId'];
 			
 		$reference_query= "select * from  seek_reference,loanapplication,loan_registration where referalEmailId='$emailId' AND seek_reference.emailId=loanapplication.emailId AND seek_reference.date_time=loanapplication.date_time AND  loan_registration.emailId=seek_reference.emailId";
 			 		
 		$reference_sql=mysqli_query($CONNECTION,$reference_query);
 		$referenceSought =array();
 		while($referenceData = mysqli_fetch_array($reference_sql)){
 			$referenceSought[] = array(
 					'name'=>$referenceData['name'],
 					'emailId'=>$referenceData['emailId'],
 					'type'=>$referenceData['type'],
 					'date_time'=>$referenceData['date_time'],
 					'ammount'=>$referenceData['ammount'],
 					'like_dislike_status'=>$referenceData['like_dislike_status']
 			);
 		}
 		
 		$result=array(
 				'code'=>200,
 				'message'=>'Reference sought updated successfully',
 				'referenceSought_detail'=>$referenceSought
 		);
 		print_r(json_encode($result));
 	
 	}
 	
 	else
 	{
 		$result=array(
 				'code'=>400,
 				'message'=>'Server Not Error'
 		);
 		print_r(json_encode($result));
 	}
 }
 


 function getLoanApplicationData()
 {
 	$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
 	if($CONNECTION!=='')
 	{
 		$emailId=$_POST['emailId'];
 		
 		$loanDetail_query= "select * from  loanapplication where emailId='$emailId'";
				$loanDetail_sql=mysqli_query($CONNECTION,$loanDetail_query);				
				$loanAppliedDetail =array();
				
				while($loanData = mysqli_fetch_array($loanDetail_sql)){
					
					$date_time =$loanData['date_time'];
					$seek_query= "select * from  seek_reference where emailId='$emailId' AND date_time='$date_time'";
					$seek_sql=mysqli_query($CONNECTION,$seek_query);
					$seekRefObj =array();
					
					while($seekData = mysqli_fetch_array($seek_sql)){
						$seekRefObj[] = array(
								'referalEmailId'=>$seekData['referalEmailId'],
								'referalMobileNumber'=>$seekData['referalMobileNumber'],
								'date_time'=>$seekData['date_time']
								
						);
					}
					
					$loanAppliedDetail[] =array(
							'emailId'=>$loanData['emailId'],
							'ammount'=>$loanData['ammount'],
							'duration'=>$loanData['duration'],
							'type'=>$loanData['type'],
							'status'=>$loanData['status'],
							'like'=>$loanData['like'],
							'dislike'=>$loanData['dislike'],
							'date_time'=>$date_time,
							'seekReference_detail1'=>$seekRefObj							
					);				
					
				}
				$result=array(
						'code'=>200,
						'message'=>'Loan detail updated successfully',						
						'loanApplied_detail'=>$loanAppliedDetail						
				
				);
				print_r(json_encode($result));
 	
 	}
 	
 	else
 	{
 		$result=array(
 				'code'=>400,
 				'message'=>'Server Not Error'
 		);
 		print_r(json_encode($result));
 	}
 }
 
 
 
 
 
 function seekReference()
 {
 	$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
 	if($CONNECTION!=='')
 	{
 		$data1=json_decode($_POST['seekReference_info'],true);
 		$data = $data1['mValues'];
 			
 		$LoanApp_emailId = $data['LoanApp_emailId'];
 		$LoanApp_dateTime = $data['LoanApp_dateTime'];
 		$LoanApp_referMobileNumber =$data['LoanApp_referMobileNumber'];
 		$LoanApp_referEmailId = $data['LoanApp_referEmailId'];
 		
 		$query= "select * from loan_registration where emailId='$LoanApp_referEmailId'";
 		//print_r(mysqli_query($CONNECTION,$query));die;
 		$res = mysqli_query($CONNECTION,$query);
 		
 		$counts=mysqli_num_rows($res);
 		if ($counts==1){
 			$query="INSERT INTO `seek_reference`(`emailId`, `referalEmailId`, `referalMobileNumber`, `date_time`) VALUES('$LoanApp_emailId','$LoanApp_referEmailId','$LoanApp_referMobileNumber','$LoanApp_dateTime')";
 			
 			$sql=mysqli_query($CONNECTION,$query);
 			
 			if($sql)
 			{
 				$result=array(
 						'code'=>200,
 						'message'=>'Referal Entry Registered Successfully'
 				);
 				print_r(json_encode($result));
 			}
 			else
 			{
 				$result=array(
 						'code'=>400,
 						'message'=>'Referal Entry failure'
 				);
 				print_r(json_encode($result));
 			}
 		}else {
 			$result=array(
 					'code'=>400,
 					'message'=>'User does not exist'
 			);
 			print_r(json_encode($result));
 		}
 		
 		
 			
 	}
 	else
 	{
 		$result=array(
 				'code'=>400,
 				'message'=>'Server Not Error'
 		);
 		print_r(json_encode($result));
 	}
 }
 
 
 
 
 
 
 
 
 
 
	function loanApplication()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
		if($CONNECTION!=='')
		{
			$data1=json_decode($_POST['loanApplication_info'],true);
			$data = $data1['mValues'];
			
			$LoanApp_emailId = $data['LoanApp_emailId'];
			$LoanApp_ammount =$data['LoanApp_ammount'];
			$LoanApp_duration = $data['LoanApp_duration'];
			$LoanApp_type = $data['LoanApp_type'];
			$LoanApp_status = $data['LoanApp_status'];
			$LoanApp_like = $data['LoanApp_like'];
			$LoanApp_dislike = $data['LoanApp_dislike'];
			$LoanApp_dateTime = $data['LoanApp_dateTime'];			
			
				$query="INSERT INTO `loanapplication`(`emailId`, `like`, `dislike`, `duration`, `status`, `ammount`, `type`, `date_time`) VALUES('$LoanApp_emailId','$LoanApp_like','$LoanApp_dislike','$LoanApp_duration','$LoanApp_status','$LoanApp_ammount','$LoanApp_type','$LoanApp_dateTime')";
				
				$sql=mysqli_query($CONNECTION,$query);
							
				if($sql)
				{
					$result=array(
							'code'=>200,
							'message'=>'Loan Application Registered Successfully'
					);
					print_r(json_encode($result));
				}
				else
				{
					$result=array(
							'code'=>400,
							'message'=>'Loan Application Not Registered Successfully',
					);
					print_r(json_encode($result));
				}
			
		}
		else
		{
			$result=array(
					'code'=>400,
					'message'=>'Server Not Error',
			);
			print_r(json_encode($result));
		}
	}
	
	function loanLogin()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','appmanager');
		if($CONNECTION!=='')
		{
			$data=json_decode($_POST['login_info']);
			$query= "select * from loan_registration where emailId='".$data->emailId."' and mobileNo='".$data->password."'";
			$sql=mysqli_query($CONNECTION,$query);
			$counts=mysqli_num_rows($sql);
			if($counts>0)
			{
			$querydata =	mysqli_fetch_array($sql);       
		
				$reg_data =array('name'=>$querydata['name'],'emailId'=>$querydata['emailId'],'address'=>$querydata['address'],'mobileNo'=>$querydata['mobileNo'],'panNumber'=>$querydata['panNumber']);
				
				$loanDetail_query= "select * from  loanapplication where emailId='".$data->emailId."'";
				$loanDetail_sql=mysqli_query($CONNECTION,$loanDetail_query);				
				$loanAppliedDetail =array();
				
				while($loanData = mysqli_fetch_array($loanDetail_sql)){
					
					$date_time =$loanData['date_time'];
					$seek_query= "select * from  seek_reference where emailId='".$data->emailId."' AND date_time='$date_time'";
					$seek_sql=mysqli_query($CONNECTION,$seek_query);
					$seekRefObj =array();
					
					while($seekData = mysqli_fetch_array($seek_sql)){
						$seekRefObj[] = array(
								'referalEmailId'=>$seekData['referalEmailId'],
								'referalMobileNumber'=>$seekData['referalMobileNumber'],
								'date_time'=>$seekData['date_time']
								
						);
					}
					
					$loanAppliedDetail[] =array(
							'emailId'=>$loanData['emailId'],
							'ammount'=>$loanData['ammount'],
							'duration'=>$loanData['duration'],
							'type'=>$loanData['type'],
							'status'=>$loanData['status'],
							'like'=>$loanData['like'],
							'dislike'=>$loanData['dislike'],
							'date_time'=>$date_time,
							'seekReference_detail'=>$seekRefObj							
					);				
					
				}
				
				$reference_query= "select * from  seek_reference,loanapplication,loan_registration where referalEmailId='".$data->emailId."' AND seek_reference.emailId=loanapplication.emailId AND seek_reference.date_time=loanapplication.date_time AND  loan_registration.emailId=seek_reference.emailId";
							
				
				$reference_sql=mysqli_query($CONNECTION,$reference_query);
				$referenceSought =array();
				while($referenceData = mysqli_fetch_array($reference_sql)){
					$referenceSought[] = array(							
							'name'=>$referenceData['name'],
							'emailId'=>$referenceData['emailId'],
							'type'=>$referenceData['type'],
							'date_time'=>$referenceData['date_time'],
							'ammount'=>$referenceData['ammount'],
							'like_dislike_status'=>$referenceData['like_dislike_status']
					);
				}
				
				
				$result=array(
						'code'=>200,
						'message'=>'Login Successfully',
						'registration_detail'=>$reg_data,
				'loanApplied_detail'=>$loanAppliedDetail,
						'referenceSought_detail'=>$referenceSought
						
				);
				print_r(json_encode($result));
			}
			else
			{				$result=array(
						'code'=>400,
						'message'=>'userid and password does not match',
				);
				print_r(json_encode($result));
			}
		}
		else		
		{
			$result=array(
					'code'=>400,
					'message'=>'Server Not Error',
			);
			print_r(json_encode($result));
		}
	}
	
		
}
/* End of login controller */