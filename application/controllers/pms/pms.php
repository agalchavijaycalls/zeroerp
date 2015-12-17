<?php
class Pms extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data[]="";
		$this->data['url']=base_url();
		$this->load->model('pms/pms_model');
	}
	
	 function application_reg_list($id=false)
	{ //echo'hii';die;
		//$this->session->set_userdata('db_name','demoerp');
		//echo $this->session->userdata('db_name'); die;
		$ApplicationRegistrationList=$this->data['ApplicationRegistrationList']=$this->pms_model->GetMultipleData('newregistration');//print_r($application_registration_list);die;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('application_reg',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	function ApiEmployeeRegistration($RegistrationId=false)
	{
		$session=$this->session->userdata('user_data');//echo $session['organization_id'];
		$RegistrationDetail=$this->data['RegistrationDetail']=$this->pms_model->GetSingleData('newregistration',array('registration_id'=>$RegistrationId));
		if($RegistrationDetail)
		{
			if($RegistrationDetail[0]->employee_id!=='0')
			{ //echo 'hiii';die;
				$EmployeeDetail=$this->data['EmployeeDetail']=$this->pms_model->GetSingleData('employee',array('employee_id'=>$RegistrationDetail[0]->employee_id));//print_r($EmployeeDetail);die;
				//$EmployeeDetail[0]->user_id;
			}//echo 'byeee';die;
			$data=array(
					'role_id'=>'admin',
					'Username'=>str_replace(' ', '_', $RegistrationDetail[0]->name),
					'Password'=>md5($RegistrationDetail[0]->password),
					'organization_id'=>$session['organization_id'],
			);
			if(!empty($EmployeeDetail[0]->user_id) && $EmployeeDetail[0]->user_id!=='')
			{ 
				$UpdateUser=$this->pms_model->UpdateSingleData('user',$data,array('user_id'=>$EmployeeDetail[0]->user_id));
				$InsertUser=$EmployeeDetail[0]->user_id;	// user id is update in employee table 
			}
			else
			{
				$InsertUser=$this->pms_model->SetData('user',$data);//print_r($InsertUser);die;
			}	
			if($InsertUser)
			{
				$data=array(
						'organization_id'=>$session['organization_id'],
						'designation_id'=>NULL,
						'department_id'=>NULL,
						'first_name'=>$RegistrationDetail[0]->name,
						'mobile'=>$RegistrationDetail[0]->number,
						'imei'=>$RegistrationDetail[0]->imei,
						'user_id'=>$InsertUser,
				);
				if(!empty($RegistrationDetail[0]->employee_id) && $RegistrationDetail[0]->employee_id!=='')
				{
					$UpdateEmployee=$this->pms_model->UpdateSingleData('employee',$data,array('employee_id'=>$RegistrationDetail[0]->employee_id));
					$InsertEmployee=$RegistrationDetail[0]->employee_id;	// user id is update in employee table
				}
				else
				{
					$InsertEmployee=$this->pms_model->SetData('employee',$data);//print_r($InsertEmployee);die;
				}
				if($InsertEmployee)
				{
					$data=array('status'=>'Enable','employee_id'=>$InsertEmployee);
					$UpdateStatus=$this->pms_model->UpdateSingleData('newregistration',$data,array('registration_id'=>$RegistrationId));
					if($UpdateStatus)
					{
						$this->session->set_flashdata('success','Employee Create Successfully');
						redirect('pms/pms/application_reg_list?menu=pms');
					}
				}
			}
		}
	}
	
	function EmployeeTrackStatus($filter=false)
	{
		$EmployeeDetail=$this->data['EmployeeDetail']=$this->pms_model->GetSingleData('newregistration',array('registration_id'=>$filter));
		if($EmployeeDetail[0]->status=='Enable')
		{
			$data=array(
						'status'=>'Disable',
				  	 );
		}
		else
		{
			$data=array(
					'status'=>'Enable',
			);
		}
		$UpdateStatus=$this->pms_model->UpdateSingleData('newregistration',$data,array('registration_id'=>$filter));
		if($UpdateStatus)
		{
			$EmployeeDetail=$this->data['EmployeeDetail']=$this->pms_model->GetSingleData('newregistration',array('registration_id'=>$filter));
			$this->session->set_flashdata('success','Employee '.$EmployeeDetail[0]->status.' Update Successfully');
			redirect('pms/pms/application_reg_list?menu=pms');
		}
	}
	
	 function NewRegistration($filter=false)
	{
		$ApplicationRegistrationList=$this->data['ApplicationRegistrationList']=$this->pms_model->GetSingleData('newregistration',array('registration_id'=>$filter));//print_r($ApplicationRegistrationList);die;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('NewRegistration',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	

	function SetNewRegistration()
	{
		$data=array(
				'employee_id'=>$this->input->post('employeeId'),
				'name'=>$this->input->post('name'),
				'number'=>$this->input->post('number'),
				'password'=>$this->input->post('password'),
				'imei'=>$this->input->post('imei'),
				'device'=>$this->input->post('device'),
				'created_by'=>$this->input->post('name'),
				'created_on'=>date('Y-m-d'),
				'status'=>'new',
		);
		if(!empty($this->input->post('RegistrationId'))){ $SetRegistration=$this->pms_model->UpdateSingleData('newregistration',$data,array('registration_id'=>$this->input->post('RegistrationId'))); }
		else{ $SetRegistration=$this->pms_model->SetData('newregistration',$data); }
		if($SetRegistration)
		{
			$this->session->set_flashdata('success','Registration Successfully');
			redirect('pms/pms/application_reg_list?menu=pms');
		}
	}
	
	function DeleteSingleData($id=false)
	{
		$DeleteSingleData=$this->pms_model->DeleteSingleData('newregistration',array('registration_id'=>$id));
		if($DeleteSingleData)
		{
			$this->session->set_flashdata('success','Delete Successfully');
			redirect('pms/pms/application_reg_list?menu=pms');
		}
	}
	
	public function excell_location($imei=false,$name=false)
	{
		$this->data['imei']=$imei;
		$this->data['name']=$name;
		$this->load->view('excell_location',$this->data);
	}
	
	 function track_address($info=false,$name=false)
	{ 
		$TempOrganizationDatabaseName=$this->session->userdata('db_name'); //echo $TempOrganizationDatabaseName;die;
		$imei=$this->input->post('imei');
		$name=$this->input->post('name');
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$sheat=$this->input->post('sheat');//echo $TempOrganizationDatabaseName; echo $imei; echo $name; echo $from; echo $to;die;
	//	$user_id= $info;
		$action_array = $this->pms_model->tracking_detail($imei,$from,$to);//print_r($action_array);die;
		if(!empty($action_array)){
			$array=array(0=>array(0=>'',1=>'IMEI NUMBER:-',2=>$action_array[0]->imei),1=>array(0=>'Serial number',1=>'Date',2=>'Time',3=>'Locations',4=>'Status',5=>'Battery Level'),2=>array(0=>'',1=>'',2=>'',3=>'',4=>'',5=>''));
				
			$locations=array();
			foreach($action_array as $key=>$a)
			{
				error_reporting(0);
				$lat=$a->Latitude;
				$long=$a->Longitude;
				$latlong = $lat."-".$long;
				//echo $latlong;
				if(!$locations[$latlong])
				{
					$this->session->unset_userdata('db_name');
					$this->session->set_userdata('db_name','appmanager');
					echo $this->session->userdata('db_name');//die;
					$local_db=$this->data['local_db']=$this->pms_model->local_db($lat,$long);print_r($local_db);//die;
					if(!$local_db){ echo 'error local db not found'; die;} else { echo'success'; }die;
					$newarray=array($local_db->Latitude."-".$local_db->Longitude=>$local_db->address);
					$locations= array_merge($locations, $newarray);
					if(!$local_db){
						if($address=Location_track::track_address($lat, $long)){
							$data=array(
									'Latitude'=>$lat,
									'Longitude'=>$long,
									'address'=>$address
							);
							$q = $this->pms_model->insert_track('physical_address',$data);print_r($q);
							$newlocation=array($lat."-".$long=>$address);
							$locations= array_merge($locations, $newlocation);
						}
					}
				}
				$array2=array($key+1,$a->date,$a->time,$locations[$latlong],$a->status,$a->bettry_leavel);
				array_push($array,$array2);
			}
			echo'hiii';
			$this->session->unset_userdata('db_name');
			$this->session->set_userdata('db_name',$TempOrganizationDatabaseName);echo $this->session->userdata('db_name');die;
			$filename=$name.'.xls';
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Content-Type: application/vnd.ms-excel');
			header("Pragma: no-cache");
			header("Expires: 0");
			$out = fopen("php://output", 'w');
			foreach ($array as $data)
			{
				fputcsv($out, $data,"\t");
			}
			fclose($out);
		}else{
			$this->session->set_flashdata('error', 'There is no record to export');
			//$this->session->set_flashdata('message', 'There is no record to export.');
			redirect('pms/pms/application_reg_list?menu=pms');
		}
	}
	
	
	 function location_map($imei=false,$name=false)
	{
		$last_location=$this->data['last_location']=$this->pms_model->GetSingleData('tracking',array('imei'=>$imei));
		//$a=count($last_location)-1;
		$lat=$last_location[0]->Latitude;
		$lng=$last_location[0]->Longitude;
		$this->data['EmployeeName']= $name; //echo $EmployeeName;die;
		$this->data['lat']=$lat;
		$this->data['lng']=$lng;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('location_map',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	function project()
	{
		echo 'project'; die;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('project',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	function task()
	{
		echo 'task';
	}
}