<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

	
	  function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->library('parser');
		$this->load->library('session');
		$this->data['base_url']=base_url();
		$this->load->library('authority');
	 }
	
	 public function index()
	 {
	 	Authority::is_logged_in();
	 	$this->parser->parse('include/header',$this->data);
	 	$this->parser->parse('include/left_menu',$this->data);
	 	$this->load->view('dashboard',$this->data);
	 	$this->parser->parse('include/footer',$this->data);
	 }
	
}
// just like that
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
