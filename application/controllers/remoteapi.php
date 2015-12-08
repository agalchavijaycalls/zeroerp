<?php 

/* Controller for login Functionality */
class Remoteapi{
	
	function locationUpdate()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','hr');
		if($CONNECTION)
		{
			$data=json_decode($_POST['employeeData']);
			$imei=$data->employeeIMEI;//echo $imei;
			foreach ($data->employeeLocationList as $list)
				{
					$result = "INSERT INTO tracking VALUES('".$imei."','".$list->employeeLocationDate."','".$list->employeeLocationTime."','".$list->employeeLocationLatitude."','".$list->employeeLocationLongitude."','".$list->employeeLocationProviderName."','".$list->employeeLocationBatteryLevel."')";
					$sql=mysqli_query($CONNECTION,$result);
				}
				if($sql)
				{
					/*$data=array(
							
							'code'=>'200',
							'result'=>'true',
								);
					print_r($data);die;*/
					 echo 'true'; die;
				}
				else 
				{
					/*$data=array(
					
							'code'=>'400',
							'result'=>'false',
					);*/
					echo 'false'; die;
				}
		}
		else
		{
			echo 'Server Error Connection Not Found';
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
			//$sql="select * from project_image where image='".$_FILES['image_name']['name']."'";
			//$query=mysqli_query($CONNECTION,$query);
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
				echo 'Image Not Insert';
			}
			die;
			/*echo 'hii'; 
			$img="select image from project_image";
			$sql=mysqli_query($CONNECTION,$img);
			//$count=mysqli_fetch_rows($sql);
			while($imga=mysqli_fetch_assoc($sql))
			{ 
				?> 
					<img src="project_image/<?=$imga['image'];?>" style="max-width: 120px; max-height: 120px; line-height: 20px;" />
				<?php
			}*/
		}
		else
		{
			echo 'Server Error Connection Not Found';
		}
		
	}

	/* Function for Update Task For Androide Application */
	function project_update()
	{
		$CONNECTION=mysqli_connect("localhost",'root','bitnami','junction_erp');
		if($CONNECTION)
		{
			$data=json_decode($_POST['projectData']);//print_r($data);die;
			$UserId=$data->user_id;//print_r($data->project_List);die;
			foreach($data->project_List as $ProjectList)
			{
				print_r($ProjectList->expense_list);die;
			}
			$ProjectList=$data->project_List;
			print_r($ProjectList->expense_list);die;
			$ProjectId=$data->project_id;
			$TaskList=$data->task_list;
			//echo $TempVar[0]->task_id;die;
			//print_r($TaskList->expense_list);die;
			foreach ($TaskList as $values)
			{
				$TaskId= $values->task_id;
				foreach ($values->expense_list as $value)
				{
					$FindExpenseKey="select * from expenser where expense_key='".$value->key."'";
					$query=mysqli_query($CONNECTION,$FindExpenseKey);//echo $query->num_rows;die;//print_r($query);die;
					if(!$query->num_rows>0)
					{
						$insert="insert into expenser(project_id,task_id,date,expense_key,expense_type,amount,type,description) values ('".$ProjectId."','".$TaskId."','".$value->date."','".$value->key."','".$value->expense_type."','".$value->amount."','".$value->type."','".$value->description."')";
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
						$expense_list[]=array(
									'key'=>$value->key,
									'status'=>'Data Already Exist In Database',
						);
					}
				}
				foreach ($values->receipt_list as $value)
				{
					$FindRecieptKey="select * from reciepts where reciepts_key='".$value->key."'";
					$query=mysqli_query($CONNECTION,$FindRecieptKey);
					if(!$query->num_rows>0)
					{
						$insert="insert into reciepts(project_id,task_id,material,date,reciepts_key,quantity,rate,unit) values ('".$ProjectId."','".$TaskId."','".$value->material."','".$value->date."','".$value->key."','".$value->quantity."','".$value->rate."','".$value->unit."')";
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
						$receipt_list[]=array(
								'key'=>$value->key,
								'status'=>'Data Already Exist In Database',
						);
					}
						
				}
			}
			$array=array(
					'expense_list'=>$expense_list,
					'receipt_list'=>$receipt_list,
			);
			echo json_encode($array);
		}
		die;
		
	}
		
}
/* End of login controller */