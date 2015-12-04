<?php 
//Model Class 
class Customer_model extends CI_Model {
	
	 /**
	 # Programmer : 
	 # customer Model
	 
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
	public function insert_customer($table,$data,$email=false)
	{
		//$this->db->where('');
		$qry= $this->db->get_where($table,$email);
		//print_r($qry);die;
		if($qry->num_rows()>0)
		{
			return true;
		}
		else{
			$this->db->insert($table,$data);
			$id = $this->db->insert_id();
			return $id;
		}
		
	}
	
	public function insert_follow_up($table,$data)
	{
		//$this->db->where('customer_id',$info);
		$this->db->insert($table, $data);
	}
	
	
	/*customer list behalf on organization*/
	function get_customer_list($organization=false)
	{
		$this->db->select('*');
		$this->db->where('organization_id',$organization);
		$query=$this->db->get('customers');
		return $query->Result();
	}
	
	/* customer list */
	function su_list_customer()
	{
		$this->db->select('*');
		$query=$this->db->get('customers');
		return $query->Result();
	}
	
	/* Function For fetch select employee*/
	public function select_customer($info)
	{
		//echo $info;
		//$qry= $this->db->query("SELECT customers_follow_up.* , customers.*  FROM   customers_follow_up , customers  WHERE customers.customer_id='".$info."' AND  follow_up.customer_id='".$info."' ");
		//print_r($qry);die;
		$this->db->select('*');
		$this->db->where('customer_id',$info);
		$qry= $this->db->get('customers');

		//print_r($qry);die;
		return $qry->result();
	}
	 
	function get_followup_list($table=false,$filter=false)
	{
		$query = $this->db->get_where($table,$filter);
		//print_r($query);die;
		return $query->Result();
	}
	/* function for update employee*/
	public function update_customers($table,$data,$customer_id)
	{
		//print_r($data);die;
		$this->db->where('customer_id',$customer_id);
		$qry= 	$this->db->update($table,$data);
		//return $qry->results();
	}
	/* function for update follow up */
	public function update_follow_up($table,$data1,$id)
	{
		$this->db->where('customer_id',$id);
		$this->db->update($table,$data1);
		return true;
	}
	
}
//Model Class for Employee end
?>
