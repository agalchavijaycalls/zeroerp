<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for login Functionality */
class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['user_data']="";
		$this->data['url'] = base_url();
		
	}
	
	public function index(){
		echo"rohit";
	}
	


				
	
	
}
/* End of login controller */