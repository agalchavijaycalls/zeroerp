<?php 
//Model Class 
class Employee_model extends CI_Model {
	
	 /**
	 # Programmer : 
	 # employee Model
	 
	 */
	 
	//variable initialize
    var $title   = '';
    var $content = '';
    var $date    = '';
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		//Load database connection
		$this->load->database();
    }
		/* Function for insert employee */
	public function insert_employee($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	/*function for employee list*/
	public function list_employee($info)
	{	
		$this->db->select('*');
		$this->db->where('organization_id',$info);
		$qry=$this->db->get('employee');
		return $qry->result();
	}
	
	/* function for superuser employee list */
	public function su_list_employee()
	{
		
		$qry= $this->db->query("SELECT employee.* , department.* , designation.* ,organization.* FROM   employee , department ,designation , organization WHERE employee.organization_id=organization.organization_id AND employee.department_id=department.department_id AND employee.designation_id=designation.designation_id");
		$qry= $this->db->query("SELECT employee.*  , designation.* , organization.* FROM   employee , designation, organization WHERE employee.organization_id=organization.organization_id AND employee.designation_id=designation.designation_id ");
		$qry= $this->db->query("SELECT employee.*  , department.* , organization.* FROM   employee , department, organization WHERE employee.organization_id=organization.organization_id AND employee.department_id=department.department_id ");
		$qry= $this->db->query("SELECT employee.*  , organization.* FROM   employee , organization WHERE employee.organization_id=organization.organization_id ");
		//print_r($qry);die;
		return $qry->result(); 
	}
	
	/* Function For fetch select employee*/
	public function select_emp($info)
	{
		$this->db->select('*');
		$this->db->where('employee_id',$info);
		$qry = $this->db->get('employee');
		return $qry->result();
		return true;
	}
	
	/* Function For fetch select image employee*/
	public function select_emp_img($info)
	{
		$this->db->select('image,resume,offerletter,joiningletter,idproof');
		$this->db->where('employee_id',$info);
		$qry = $this->db->get('employee');
		return $qry->row();
		return true;
	}
	
	
	/* function for update employee*/
	public function update_employee($table,$data,$id)
	{
		$this->db->where('employee_id',$id);
		$this->db->update($table,$data);
		return true;
	}
	
	/* function for image update */
	public function update_image_employee($table,$images,$id)
	{
		$this->db->where('employee_id',$id);
		$qry=$this->db->update($table,$images);
		return true;
	}
	
	
	/*function for delete employee*/
			public function delete_emp($info=false)
	{
		$this->db->query("DELETE FROM `employee` WHERE `employee_id`='".$info."' ");
	}
	
	/*function for tracking list*/
	public function tracking_detail($imei=false,$from=false,$to=false)
	{
		//echo $table;
		//echo $imei;
		//echo $from;
		//echo $to;
		//$from='2015-07-18';
		//$to='2015-07-30';
		//echo $a;
		//echo $a;die;
		//$start_deadline=20;
		//$end_deadline=22;
		//$this->db->select('*');
		//$this->db->where('imei',$imei);
		//$this->db->where('datetime >=', $start_deadline);
		//$this->db->where('datetime <=', $end_deadline);
		//$qry=$this->db->get($table);     
		//print_r($qry);die;
		//return $qry->result();select * from person
		$this->load->database('default',TRUE);
$qry=$this->db->query("select * from tracking where `imei`='".$imei."' and DATE(date) between '".$from."' and '".$to."' ");
				return $qry->result();
		
	}
	
	public function insert_track($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	public function local_db($lat,$long)
	{
		$qry=$this->db->get_where('physical_address',array('Latitude'=>$lat,'Longitude'=>$long));
		return $qry->row();
		//print_r($qry);die;
	}
	
	public function last_location($imei=false)
	{	
		
		$this->db->select('*');
		$this->db->where('imei',$imei);
		$qry=$this->db->get('tracking');
		return $qry->result();
	}
	
	public function list_country()
	{
		$this->db->select('*');
		$qry=$this->db->get('countries');
		return $qry->result();
	}
	
	public function application_registration_list()
	{
		$this->db->select('*');
		$qry=$this->db->get('newregistration');
		return $qry->result();
	}
}
//Model Class for Employee end
?>
