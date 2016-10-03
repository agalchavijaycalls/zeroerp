<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for login Functionality */
class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['user_data']="";
		$this->data['url'] = base_url();
		
	}
	
	
	

				 /* login view */
	public function login_view($id=false,$code=false)
	{      
             //   if($code)
             //   {
             //    $role_update=$this->data['role_update']=$this->login_model->role_update($id); 
              //  }
		//$list_organization = $this->data['list_organization'] = $this->organization_model->list_organization();
		$this->parser->parse('include/header',$this->data);
		$this->load->view('login',$this->data);//login page view
		//$this->parser->parse('include/footer',$this->data);
	}
				
               				/*android code */
	
	
}
/* End of login controller */