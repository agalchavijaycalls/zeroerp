<?php 
//Model Class 
class Product_model extends CI_Model {
	
	 /**
	 # Programmer : 
	 # Product Model
	 
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
		/* Function for insert product */
	public function insert_products($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	/* function for list of product */
public function list_product($info)
	{
		$this->db->select('*');
		$this->db->where('organization_id',$info);
		$qry = $this->db->get('products');
		return $qry->result();
		return true;
	}
	
	/* function for list of product */
	public function product($info)
	{
		$this->db->select('*');
		$this->db->where('product_id',$info);
		$qry = $this->db->get('products');
		return $qry->result();
		return true;
	}
	
	
	/*function for delete product*/
	public function delete_product($info=false)
	{
		$this->db->query("DELETE FROM `products` WHERE `product_id`='".$info."' ");
	}
	
	/* function for unit list */
	public function unit()
	{
		$this->db->select('*');
		$qry=$this->db->get('unit');
		return $qry->result();
	}
}
//Model Class for Employee end
?>
