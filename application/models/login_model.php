<?php
/* Model for login and sign up   */

class Login_model extends CI_Model 
{
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
    
    /* function for login check email id ragisterd or not   */
          function login_check($table=false,$data=false)
        { 
        	//print_r($data);die;
        	$this->load->database('default',TRUE);
        	$query = $this->db->get_where($table,$data);
		  if($query->num_rows()>0)
		  {
		  	  return $query->row();  
		  }
		  else
		  {
				return false;
		  }
          }
   
   	/* function for create session for orgnization */
   function list_organization($table=false,$data=false)
   {
   	$query = $this->db->get_where($table,$data);
   	if($query->num_rows()>0)
   	{
   	return $query->row();
   	}
   	else
   	{
   		return false;
   	}
   }
   
   	/* function for insert user data and if not already exist */
 function insert_sign()
   {
			$a= $this->input->post('usermailid');
			$this->db->where('usermailid',$a);
			$query = $this->db->get('users');
				if ($query->num_rows() > 0)
				{
					 return $query->Result();
				     redirect('login');
				}
				else
				{
					$data=array
						   (
						  'usermailid'=>  $this->input->post('usermailid'),
						  'password'=>    $this->input->post('password'),
						  'user_name'=>    $this->input->post('username') 		
						   );
					$this->db->insert("users",$data);
				}
    }
    
    /*  function for insert change password  */
	function change($filter=false,$data=false)
	{
			$this->db->where($filter);
			$this->db->update('users',$data);
	}
	
	/*  function for insert check password  */
	function check_pwd($check=false,$table=false)
	{
		$qry=$this->db->get_where($table,$check);
		return $qry->result();
		//$this->db->update('users',$data);
	}
	
	/*	function for check organization	*/
	function check_org($val)
	{
		$qry=$this->db->get_where('organization',array('organization_name'=>$val));
		return $qry->result();
	}
	
	/*	function for check email	*/
	function email_chek($val)
	{
		$qry=$this->db->get_where('users',array('usermailid'=>$val));
		return $qry->result();
	}
	
	/*	function for insert organization  */
	function insert_organization($organization_name)
	{
		$this->db->insert('organization',array('organization_name'=>$organization_name));
	}
	
	/*	function for fetch organization id */
	function organization_id($organization_name)
	{
		$this->db->select('organization_id');
		$qry=$this->db->get_where('organization',array('organization_name'=>$organization_name));
		return $qry->row();
	}
	
	
	function insert_users($data,$table)
	{
		$this->db->insert($table,$data);
	}

           /*  function for update role for activate link */
	function role_update($id=false)
	{
		$this->db->where('organization_id',$id);
                $qry=  $this->db->update('users',array('role_id'=>'Administrator'));
		    // return $qry->result();
	}

             /*  function for forget password  */
        function forget_pwd_email($email)
        {      
               $this->db->select('user_id,password');
               $this->db->where('usermailid',$email);
              $qry= $this->db->get('users');
               return $qry->result();
        }
}