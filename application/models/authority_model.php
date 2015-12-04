<?php

 /*	      Model for check authority permissions   */
class Authority_model extends CI_Model 
{
 
    function __construct() 
	{
        parent::__construct();
		$this->load->database();
    }
		
		/*   Function for start assign user list for user_role view    */
	function su_verify_list()
	{
		$this->db->select('*');
		$qry=$this->db->get('user');
		return $qry->result();
	}
	
	/*   Function for list user for organization id    */
	function verify_list($organization)
	{
		$this->db->select('*');
		$this->db->where('organization_id',$organization);
		$qry=$this->db->get('user');
		return $qry->result();
	}
	
	
		/*    Start function for retrieve function list for add role     */
	function list_function()
	{
		$this->db->select('*');
		$qry=$this->db->get('function');
		return $qry->result();
	}
		
		/*     Start function for retrieve role list from role table for user role view     */
	function role_list()
	{		
			$this->db->select('*');
			$qry=$this->db->get('role');
			return $qry->result();
	}
		
		/*    Start function for read check authority permission for role id     */
	function list_permision($role)
	{
		$this->db->select('*');
		$this->db->where('role_id',$role);
		$qry=$this->db->get('role_permission');
		if($qry->num_rows()>0)
		{
		  return $qry->result(); 
		}
		else
		{
			echo"invalid user name or password";
			return false;
		}
	}
		
		/*    Start function for list role_id for role management view    */ 
	function list_permsn($a=false)
	{
		//print_r($a);die;
		//$this->db->distinct();
		$this->db->select('role_id');
		//$this->db->where('role_id !=' ,'superuser');
		$qry=$this->db->get('role');
		 return $qry->result(); 
	}

			/* function for list for users */
	function users_list()
	{
		$this->db->select('*');
		//$this->db->where('role_id',$info);
		$qry=$this->db->get('user');
		return $qry->result();
	}
	
			/*    Start function for update role for user_role view     */
	function role_assign($data,$info)
	{	
		$this->db->where('user_id',$info);
		 $this->db->update('user',$data);
	}
		
			/*    Start function for delete user in user role    */
	function delete_user($filter=false,$table=false)
	{
		$this->db->delete($table, $filter); 
	}
		
	
	/*function for organization list */
	public function list_organization()
	{
		$this->db->select('*');
		$qry=$this->db->get('organization');
		return $qry->result();
	}
	
	
		/*     function for add user in role view      */
		function user_add($table,$data,$email)
		{	
			$this->db->where('usermailid',$email);
			$query = $this->db->get('user');
			if ($query->num_rows() > 0)
				{
				 return $query->Result();
				}
			else{
				$this->db->insert("user",$data);
				}
		}

		
			/*		start function for retrive function list from role_function table		*/
		function functions_list()
		{
			$this->db->select('*');
			$qry=$this->db->get('function');
			return $qry->result();
		}
	

			/*		Start function for retrieve permission list for role_permission view 		*/
	function permissions($info)
	{	
		$this->db->select('*');
		$this->db->where('role_id',$info);
		$qry=$this->db->get('role_permission');
		return $qry->result();
	}

	
				/*		Start function for insert role for add_role view		*/	
	function insert_role($info)
	{
		$this->db->query("INSERT INTO role_permission (role_id,function_id,auth_read,auth_execute) VALUES ".$info."");
		return true;
	}
	

				/*		function for update role	*/
	function update_role_permission($info,$filter)
	{   
		$this->db->trans_start();
		$this->db->delete('role_permission', $filter);
		$this->db->query("INSERT INTO role_permission (role_id,function_id,auth_read,auth_execute) VALUES ".$info."");
		$this->db->trans_complete();
		return true;
	}
	

		/*		function for insert role in role table		*/
	function insert_role_table($role)
	{
		$this->db->insert('role',$role);
		return true;
	}	
		
	/* function for delete role*/
	public function delete_role($info=false)
	{
		//print_r($info);die;
		//$this->db->query("DELETE FROM `role` WHERE `role_id`='".$info."' ");
		//$this->db->query("DELETE FROM `role_permission` WHERE `role_id`='".$info."' ");
		//	$this->db->query("DELETE FROM `users` WHERE `role_id`='".$info."' ");
		
	}	
	
						/*		function for blocked role in user	*/
	function  blocked_user($data,$user)
	{
		$this->db->select('*');
		$this->db->where('user_id',$user);
		$qry= $this->db->update('user',$data);
	}	
}
//~~End~~