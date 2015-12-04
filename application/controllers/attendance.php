<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* junctionERP   */
/* Version 1 */


class Attendance extends CI_Controller {

	
	  function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['url'] = base_url();
		
		//$this->load->model('mhome');
		$this->load->library('parser');
		$this->load->library('session');
		$this->data['base_url']=base_url();
	 }
	

	//manage attendance
	public function manage_attendance($info=false)
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('manage_attendance',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	//manage attendance
	public function attendance_report($info=false)
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('attendance_report',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
}

/* End of file attendance.php */
/* Location: ./application/controllers/attendance.php */
