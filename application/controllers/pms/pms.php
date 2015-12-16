<?php
class pms extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data[]="";
		$this->data['url']=base_url();
		$this->load->model('pms/pms_model');
	}
	
	public function application_reg_list($id=false)
	{ //echo'hii';die;
		$ApplicationRegistrationList=$this->data['ApplicationRegistrationList']=$this->pms_model->GetMultipleData('newregistration');//print_r($application_registration_list);die;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('application_reg',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	function ApiEmployeeRegistration($RegistrationId=false)
	{
		$session=$this->session->userdata('user_data');//echo $session['organization_id'];
		$RegistrationDetail=$this->data['RegistrationDetail']=$this->Pms_model->GetSingleData('newregistration',array('registration_id'=>$RegistrationId));
		if($RegistrationDetail)
		{
			if($RegistrationDetail[0]->employee_id!=='0')
			{ //echo 'hiii';die;
				$EmployeeDetail=$this->data['EmployeeDetail']=$this->Pms_model->GetSingleData('employee',array('employee_id'=>$RegistrationDetail[0]->employee_id));//print_r($EmployeeDetail);die;
				//$EmployeeDetail[0]->user_id;
			}//echo 'byeee';die;
			$data=array(
					'role_id'=>'admin',
					'Username'=>$RegistrationDetail[0]->name,
					'Password'=>md5($RegistrationDetail[0]->password),
					'organization_id'=>$session['organization_id'],
			);
			if(!empty($EmployeeDetail[0]->user_id) && $EmployeeDetail[0]->user_id!=='')
			{ 
				$UpdateUser=$this->Pms_model->UpdateSingleData('user',$data,array('user_id'=>$EmployeeDetail[0]->user_id));
				$InsertUser=$EmployeeDetail[0]->user_id;	// user id is update in employee table 
			}
			else
			{
				$InsertUser=$this->Pms_model->SetData('user',$data);//print_r($InsertUser);die;
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
					$UpdateEmployee=$this->Pms_model->UpdateSingleData('employee',$data,array('employee_id'=>$RegistrationDetail[0]->employee_id));
					$InsertEmployee=$RegistrationDetail[0]->employee_id;	// user id is update in employee table
				}
				else
				{
					$InsertEmployee=$this->Pms_model->SetData('employee',$data);//print_r($InsertEmployee);die;
				}
				if($InsertEmployee)
				{
					$data=array('status'=>'Enable','employee_id'=>$InsertEmployee);
					$UpdateStatus=$this->Pms_model->UpdateSingleData('newregistration',$data,array('registration_id'=>$RegistrationId));
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
		$EmployeeDetail=$this->data['EmployeeDetail']=$this->Pms_model->GetSingleData('newregistration',array('registration_id'=>$filter));
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
		$UpdateStatus=$this->Pms_model->UpdateSingleData('newregistration',$data,array('registration_id'=>$filter));
		if($UpdateStatus)
		{
			$EmployeeDetail=$this->data['EmployeeDetail']=$this->Pms_model->GetSingleData('newregistration',array('registration_id'=>$filter));
			$this->session->set_flashdata('success','Employee '.$EmployeeDetail[0]->status.' Update Successfully');
			redirect('pms/pms/application_reg_list?menu=pms');
		}
	}
	
	public function NewRegistration($filter=false)
	{
		$ApplicationRegistrationList=$this->data['ApplicationRegistrationList']=$this->Pms_model->GetSingleData('newregistration',array('registration_id'=>$filter));//print_r($ApplicationRegistrationList);die;
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
		if(!empty($this->input->post('RegistrationId'))){ $SetRegistration=$this->Pms_model->UpdateSingleData('newregistration',$data,array('registration_id'=>$this->input->post('RegistrationId'))); }
		else{ $SetRegistration=$this->Pms_model->SetData('newregistration',$data); }
		if($SetRegistration)
		{
			$this->session->set_flashdata('success','Registration Successfully');
			redirect('pms/pms/application_reg_list?menu=pms');
		}
	}
	
	function DeleteSingleData($id=false)
	{
		$DeleteSingleData=$this->Pms_model->DeleteSingleData('newregistration',array('registration_id'=>$id));
		if($DeleteSingleData)
		{
			$this->session->set_flashdata('success','Delete Successfully');
			redirect('pms/pms/application_reg_list?menu=pms');
		}
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