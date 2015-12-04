<?php 
//Model Class 
class organization_model extends CI_Model {
	
	 /**
	 # Programmer : 
	 # organization_model Model
	 
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
		/* Function for insert organization */
	public function insert_organization($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	
		/* function for delete organization*/
	public function delete_organization($info=false)
	{
		$this->db->query("DELETE FROM `employee` WHERE `organization_id`='".$info."' ");
		$this->db->query("DELETE FROM `designation` WHERE `organization_id`='".$info."' ");
		$this->db->query("DELETE FROM `department` WHERE `organization_id`='".$info."' ");
		$this->db->query("DELETE FROM `organization` WHERE `organization_id`='".$info."' ");
	}
		
		
	/*function for organization list */
	public function list_organization($info=false)
	{
		$this->db->select('*');
		//$this->db->where('organization_id',$info);
		$qry=$this->db->get('organization');
		return $qry->result();
	}
	
	/* Function For fetch select organization*/
	public function select_organization($info)
	{
		$this->db->select('*');
		$this->db->where('organization_id',$info);
		$qry = $this->db->get('organization');
		return $qry->result();
	}
	
	/* function for update organization */
	public function update_organization($info,$data)
	{
		$this->db->where('organization_id',$info);
		$this->db->update('organization',$data);
		return true;
	}
	
}
//Model Class for Organization end
?>
