<?php 
//Model Class 
class Designation_model extends CI_Model {
	
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
	public function insert_designation($table,$data)
	{
		$this->db->insert($table,$data);
		return true;
	}
	
	/* function for delete organization*/
	public function delete_designation($info=false)
	{
		$this->db->query("DELETE FROM `designation` WHERE `designation_id`='".$info."' ");
	}
	
	/* function for update department in employee table before department delete*/
	public function edit_emp($info,$data)
	{
		$this->db->where('designation_id',$info);
		$this->db->update('employee',$data);
		return true;
	}
	
	/*function for organization list*/
	public function list_designation($info=false)
	{
		$this->db->select('*');
		$this->db->where('organization_id',$info);
		$qry=$this->db->get('designation');
		return $qry->result();
	}
	
	/* Function For fetch select designation*/
	public function select_designation($info)
	{
		$this->db->select('*');
		$this->db->where('designation_id',$info);
		$qry = $this->db->get('designation');
		return $qry->result();
	}
	
	/* function for update orgnisation*/
	public function update_designation($info,$data)
	{
		$this->db->where('designation_id',$info);
		$this->db->update('designation',$data);
		return true;
	}
}
//Model Class for department end
?>
