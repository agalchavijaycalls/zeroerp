<?php 
//Model Class 
class Department_model extends CI_Model {
	
	 /**
	 # Programmer : 
	 # Mhome Model
	 
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

    
    /* Function for insert ogganization */
    public function insert_department($table,$data)
    {
    	$this->db->insert($table,$data);
    	return true;
    }
    
    
     /* Function for list organization */
    public function list_organization($info=false)
    {
    	$this->db->select('*');
    	$this->db->where('organization_id',$info);
    	$qry=$this->db->get('organization');
    	return $qry->result();
    }
    
    /*function for department list*/
    public function list_department($info=false)
    {
    	$this->db->select('*');
		$this->db->where('organization_id',$info);
		$qry=$this->db->get('department');
	     return $qry->result(); 
			  
    }
  
    /* Function For fetch select orgnistion*/
    public function select_department($info)
    {
    	$this->db->select('*');
    	$this->db->where('department_id',$info);
    	$qry = $this->db->get('department');
    	return $qry->result();
    }
	
		/* function for delete organization*/
	public function delete_department($info=false)
	{
		$this->db->query("DELETE FROM `department` WHERE `department_id`='".$info."' ");
	}
	
	/* function for update department in employee table before department delete*/
	public function edit_emp($info,$data)
	{
		$this->db->where('department_id',$info);
		$this->db->update('employee',$data);
		return true;
	}
	
	/* function for update organization */
	public function update_department($info,$data)
	{
		$this->db->where('department_id',$info);
		$this->db->update('department',$data);
		return true;
	}
}
//Model Class for department end
?>
