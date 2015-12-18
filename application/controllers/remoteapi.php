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
													'date'=>$list->employeeLocationDate,
													'time'=>$list->employeeLocationTime,
													'status'=>'pending',
											);
										}
									}
									else
									{
										$employee_list[]=array(
												'date'=>$list->employeeLocationDate,
												'time'=>$list->employeeLocationTime,
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
										'date'=>$list->employeeLocationDate,
										'time'=>$list->employeeLocationTime,
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
				$query= "INSERT INTO newregistration (name,number,password,imei,device,status,created_by,created_on,updated_by,updated_on) VALUES('".$data->employeeName."','".$data->employeeMobileNumber."','".$data->employeePassword."','".$data->employeeIMEI."','androide','new','".$data->employeeName."','".date('d-m-Y')."','','')"; //echo $query; die;
				$sql=mysqli_query($new_connection,$query);
				if($sql)
				{
					echo 'Information Registered Successfully';
				}
			}
			else
			{
				echo 'Data Base Does Not Exist';
			}
		}
		else
		{
			echo 'Connection Not Found Server Error';
		}
	
	}
	
	
	/* Function For Retrive Project List*/
	function project()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
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
				echo 'Project List Found On Server';
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
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
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
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
		if($CONNECTION)
		{
			$data=json_decode($_POST['projectData']);print_r($data);die;
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
							$insert="insert into reciepts(project_id,user_id,task_id,material,date,reciepts_key,quantity,rate,unit) values ('".$ProjectId."','".$UserId."','".$TaskId."','".$value->material."','".$value->date."','".$value->key."','".$value->quantity."','".$value->rate."','".$value->unit."')";
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
							$Update="update reciepts set project_id='".$ProjectId."',user_id='".$UserId."',task_id='".$TaskId."',material='".$value->material."',date='".$value->date."',quantity='".$value->quantity."',rate='".$value->rate."',unit='".$value->unit."' where reciepts_key='".$value->key."'";
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
										$insert="insert into reciepts(project_id,user_id,task_id,material,date,reciepts_key,quantity,rate,unit) values ('".$ProjectId."','".$UserId."','".$TaskId."','".$value->material."','".$value->date."','".$value->key."','".$value->quantity."','".$value->rate."','".$value->unit."')";
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
										$Update="update reciepts set project_id='".$ProjectId."',user_id='".$UserId."',task_id='".$TaskId."',material='".$value->material."',date='".$value->date."',quantity='".$value->quantity."',rate='".$value->rate."',unit='".$value->unit."' where reciepts_key='".$value->key."'";
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
	
	function organizationKey()
	{
		$data=json_decode($json);
		if($data)
		{
			$CONNECTION=mysqli_connect('localhost','root','',$data->DataBasename);
			if($CONNECTION)
			{
				$query= "select * from approval_track where imei='".$data->imei."' and status=Enable";
				$sql=mysqli_query($CONNECTION,$query);
				/*$count=mysqli_num_rows($sqls);
				if(isset($count) && $count > 0)
				{
					while($result_project=mysqli_fetch_assoc($sqls))
					{
						$imei[]=$result_project['imei'];
						$key[]= $result_project['server_key'];
					}
					//print_r($imei);die;
					
				}
				$result=array(
						'imei'=>$imei,
						'key'=>$key
				);
				echo json_encode($result);
				die;*/
			}
		}
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
		
}
/* End of login controller */