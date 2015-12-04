<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller {

	
	  function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('organization_model');
		$this->load->model('department_model');
		$this->load->model('designation_model');
		$this->load->model('employee_model');
		$this->load->library('authority');
		$this->load->library('location_track');
		$this->load->model('authority_model');
		$this->load->library('parser');
		$this->load->library('session');
		$this->data['base_url']=base_url();
	 }
	

				/* manage Employee */
	public function manage_emp()
	{
		Authority::is_logged_in();
		Authority::checkAuthority('manage_emp');
		$userdata = $this->session->userdata('user_data');
		$role=$userdata['user_id']!=='superuser';
		$organization=$userdata['organization_id'];
		if($role)
		{
			$list_employee = $this->data['list_employee'] = $this->employee_model->list_employee($organization);
		}
		$su_list_employee = $this->data['su_list_employee'] = $this->employee_model->su_list_employee();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('manage_emp',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	
			/* function for create new employee */
public function insert_employee($info=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('insert_employee')==true)
			{
				redirect('employee/manage_emp');
			}
		$userdata = $this->session->userdata('user_data');
		$role=$userdata['role_id'];
		$user_id=$userdata['user_id'];
		if($role=='superuser')
		{
			$info=$this->input->post('organization_name');
		}
		$dep=$this->input->post('department_name');
		if($dep=='0')
		{
			$dep=NULL;
		}
		$des=$this->input->post('designation_name');
		if($des=='0')
		{
			$des=NULL;
		}
		$users=$this->input->post('user_id');
		if($users=='')
		{
			$users=NULL;
		}
		$employee_id=$this->input->post('employee_id');
		$first_name=$this->input->post('first_name');
			$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'],"img/".$employee_id.$_FILES['image']['name']);
						
				
				$image = $employee_id.$_FILES['image']['name'];
				
		$_FILES['resume']['name'];
					move_uploaded_file($_FILES['resume']['tmp_name'],"img/".$employee_id.$_FILES['resume']['name']);
						
				
				$resume = $employee_id.$_FILES['resume']['name'];	

		$_FILES['offerletter']['name'];
					move_uploaded_file($_FILES['offerletter']['tmp_name'],"img/".$employee_id.$_FILES['offerletter']['name']);
						
				
				$offerletter = $employee_id.$_FILES['offerletter']['name'];	
				
		$_FILES['joiningletter']['name'];
					move_uploaded_file($_FILES['joiningletter']['tmp_name'],"img/".$employee_id.$_FILES['joiningletter']['name']);
						
				
				$joiningletter = $employee_id.$_FILES['joiningletter']['name'];

	    $_FILES['idproof']['name'];
					move_uploaded_file($_FILES['idproof']['tmp_name'],"img/".$employee_id.$_FILES['idproof']['name']);
						
				
				$idproof = $employee_id.$_FILES['idproof']['name'];
				
		
			if($first_name!=='')
		{
			$data=array(
							//'employee_id'=>$this->input->post('employee_id'),
							'organization_id'=>$info,
							'department_id'=>$dep,
							'designation_id'=>$des,
							'user_id'=>$users,
							//'username'=>$this->input->post('username'),
							'imei'=>$this->input->post('imei'),
							'salary_frquency'=>$this->input->post('salary_frquency'),
							'joining_date'=>$this->input->post('joining_date'),
							'first_name'=>$this->input->post('first_name'),
							'last_name'=>$this->input->post('last_name'),
							'birthdate'=>$this->input->post('birthdate'),
							'gender'=>$this->input->post('gender'),
							'image'=>$image,
							'martial_status'=>$this->input->post('maratial_status'),
							'nationality'=>$this->input->post('nationality'),
							'father_name'=>$this->input->post('father_name'),
							'passport'=>$this->input->post('passport'),
							'present_address'=>$this->input->post('present_address'),
							'mobile'=>$this->input->post('mobile'),
							'email'=>$this->input->post('email'),
							'country'=>$this->input->post('country'),
							'state'=>$this->input->post('state'),
							'city'=>$this->input->post('city'),
							'zip'=>$this->input->post('zip'),
							'resume'=>$resume,
							'offerletter'=>$offerletter,
							'joiningletter'=>$joiningletter,
							'idproof'=>$idproof,
							'bank_name'=>$this->input->post('bank_name'),
							'branch_name'=>$this->input->post('branch_name'),
							'acc_name'=>$this->input->post('acc_name'),
							'acc_no'=>$this->input->post('acc_no'),
							'created_by'=>$user_id
						);
						//echo '<pre>';
						//print_r($data);
						//echo '</pre>';die;
		
		
			$this->employee_model->insert_employee('employee',$data);
			$this->session->set_flashdata('category_success', 'success message');        
			$this->session->set_flashdata('message', $this->config->item("user").' Employee Add successfully');
			redirect('employee/manage_emp');
		}
		
	}
	
	public function update_employee($id=false,$info=false,$img=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('update_employee')==true)
			{
				redirect('employee/manage_emp');
			}
		$userdata = $this->session->userdata('user_data');
		$role=$userdata['role_id'];
		$user_id=$userdata['user_id'];
		$employee_id=$id;
		$first_name=$this->input->post('first_name');
			if($role=='superuser')
		{
			$info=$this->input->post('organization_name');
		}
		$dep=$this->input->post('department_name');
		if($dep=='0')
		{
			$dep=NULL;
		}
		$des=$this->input->post('designation_name');
		if($des=='0')
		{
			$des=NULL;
		}
		$users=$this->input->post('user_id');
		if($users=='')
		{
			$users=NULL;
		}
		//print_r($info);die;
			if($first_name!=='')
		{
				if($_FILES['image']['name']!=='')
					{
						//print_r($_FILES['image']['name']);
						$_FILES['image']['name'];
								move_uploaded_file($_FILES['image']['tmp_name'],"img/".$employee_id.$_FILES['image']['name']);
								$image = $employee_id.$_FILES['image']['name'];
								$img['image']=$image;
					}
				if($_FILES['resume']['name']!=='')
					{	
						//print_r($_FILES['image']['name']);
						$_FILES['resume']['name'];
								move_uploaded_file($_FILES['resume']['tmp_name'],"img/".$employee_id.$_FILES['resume']['name']);
								$resume = $employee_id.$_FILES['resume']['name'];	
								$img['resume']=$resume;
					}
					
				if($_FILES['offerletter']['name']!=='')
					{		
							//print_r($_FILES['image']['name']);
						$_FILES['offerletter']['name'];
								move_uploaded_file($_FILES['offerletter']['tmp_name'],"img/".$employee_id.$_FILES['offerletter']['name']);
								$offerletter = $employee_id.$_FILES['offerletter']['name'];
								$img['offerletter']=$offerletter;
					}
					
				if($_FILES['joiningletter']['name']!=='')
					{	
							//print_r($_FILES['image']['name']);
						$_FILES['joiningletter']['name'];
								move_uploaded_file($_FILES['joiningletter']['tmp_name'],"img/".$employee_id.$_FILES['joiningletter']['name']);
								$joiningletter = $employee_id.$_FILES['joiningletter']['name'];
								$img['joiningletter']=$joiningletter;
					}
				if($_FILES['idproof']['name']!=='')
					{		
							//print_r($_FILES['image']['name']);
						$_FILES['idproof']['name'];
								move_uploaded_file($_FILES['idproof']['tmp_name'],"img/".$employee_id.$_FILES['idproof']['name']);
								$idproof = $employee_id.$_FILES['idproof']['name'];
								$img['idproof']=$idproof;
					}
					if($_FILES['image']['name']!=='' || $_FILES['resume']['name']!=='' || $_FILES['offerletter']['name']!=='' || $_FILES['joiningletter']['name']!=='' || $_FILES['idproof']['name']!=='')
					{
						$this->employee_model->update_image_employee('employee',$img,$id);
					}
			
			$data=array(
							'employee_id'=>$id,
							'organization_id'=>$info,
							'department_id'=>$dep,
							'designation_id'=>$des,
							'user_id'=>$users,
							'imei'=>$this->input->post('imei'),
							'salary_frquency'=>$this->input->post('salary_frquency'),
							'joining_date'=>$this->input->post('joining_date'),
							'first_name'=>$this->input->post('first_name'),
							'last_name'=>$this->input->post('last_name'),
							'birthdate'=>$this->input->post('birthdate'),
							'gender'=>$this->input->post('gender'),
							//'image'=>$image,
							'martial_status'=>$this->input->post('maratial_status'),
							'nationality'=>$this->input->post('nationality'),
							'father_name'=>$this->input->post('father_name'),
							'passport'=>$this->input->post('passport'),
							'present_address'=>$this->input->post('present_address'),
							'mobile'=>$this->input->post('mobile'),
							'email'=>$this->input->post('email'),
							'country'=>$this->input->post('country'),
							'state'=>$this->input->post('state'),
							'city'=>$this->input->post('city'),
							'zip'=>$this->input->post('zip'),
							//'resume'=>$resume,
							//'offerletter'=>$offerletter,
							//'joiningletter'=>$joiningletter,
							//'idproof'=>$idproof,
							'bank_name'=>$this->input->post('bank_name'),
							'branch_name'=>$this->input->post('branch_name'),
							'acc_name'=>$this->input->post('acc_name'),
							'acc_no'=>$this->input->post('acc_no'),
							'updated_by'=>$user_id
						);
						//echo '<pre>';
						//print_r($data);
						//echo '</pre>';
						//echo '<pre>';
						//print_r($img);
						////echo '</pre>';die;
						
			$this->employee_model->update_employee('employee',$data,$id);
			$this->session->set_flashdata('category_success', 'success message');        
			$this->session->set_flashdata('message', $this->config->item("user").' Employee update successfully');
			redirect('employee/manage_emp');
		}
	}
	
	/* function for delete department */
	public function delete_emp($info)
	{
		Authority::is_logged_in();
		$this->employee_model->delete_emp($info);
		$this->session->set_flashdata('category_success','success message');
		$this->session->set_flashdata('message', $this->config->item("user").' Employee delete successfully');
		redirect('employee/manage_emp');
	}
	
	
						//Add employee
	public function add_emp($info=false)
	{	
		Authority::is_logged_in();
		if(Authority::checkAuthority('add_emp')==true)
			{
				redirect('employee/manage_emp');
			}
		$userdata = $this->session->userdata('user_data');
		$organization=$userdata['organization_id'];
		if($info){
			
			$select_emp = $this->data['select_emp'] = $this->employee_model->select_emp($info);
			//print_r($select_emp);die;
				 }
		$list_country=$this->data['list_country']= $this->employee_model->list_country();	
		$list_organization = $this->data['list_organization'] = $this->organization_model->list_organization();
		$list_department= $this->data['list_department'] = $this->department_model->list_department($organization);
		$list_designation = $this->data['list_designation'] = $this->designation_model->list_designation($organization);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('add_emp',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
			/* function for get physical address and download excel seat */
   
	
	public function track_address($info=false,$name=false)
	{ 
		//$this->session->unset('db_name');
		$db=$this->session->userdata('db_name');
		$this->session->set_userdata('db_name','appmanager');
		$this->session->userdata('db_name');	
		$imei=$this->input->post('imei');
		$name=$this->input->post('name');
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$sheat=$this->input->post('sheat');
		$user_id= $info;
		$action_array = $this->employee_model->tracking_detail($imei,$from,$to);
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
				$local_db=$this->data['local_db']=$this->employee_model->local_db($lat,$long);
				$newarray=array($local_db->Latitude."-".$local_db->Longitude=>$local_db->address);
				$locations= array_merge($locations, $newarray);
				if(!$local_db){  
						if($address=Location_track::track_address($lat, $long)){
							$data=array(
									'Latitude'=>$lat,
									'Longitude'=>$long,
									'address'=>$address
										);
						$q = $this->employee_model->insert_track('physical_address',$data);//echo $address;
							$newlocation=array($lat."-".$long=>$address);
							$locations= array_merge($locations, $newlocation);
						}
				}
			}
				$array2=array($key+1,$a->date,$a->time,$locations[$latlong],$a->status,$a->bettry_leavel);
				array_push($array,$array2);
			}
			$this->session->set_userdata('db_name',$db);
			$this->session->userdata('db_name');
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
			$this->session->set_flashdata('category_error', 'success');
			$this->session->set_flashdata('message', 'There is no record to export.');
			redirect('employee/manage_emp');
		}
	}
	
	
	public function excell_location($imei=false,$name=false)
	{
		$this->data['imei']=$imei;
		$this->data['name']=$name;
		$this->load->view('excell_location',$this->data);
	}
	
	public function emp_award()
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('emp_award',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	public function view_emp()
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('view_emp',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	public function location_map($imei=false)
	{
		$last_location=$this->data['last_location']=$this->employee_model->last_location($imei);
		$a=count($last_location)-1;
		//echo $a-1;
		//echo "<pre>";
		//print_r($last_location[$a]);
		//echo "</pre>"; 
		$lat=$last_location[$a]->Latitude;
		$lng=$last_location[$a]->Longitude;
		$this->data['lat']=$lat;
		$this->data['lng']=$lng;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('location_map',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	public function application_reg_list()
	{
		$application_registration_list=$this->data['application_registration_list']=$this->employee_model->application_registration_list();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('application_reg',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
