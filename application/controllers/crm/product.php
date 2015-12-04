<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* junction software pvt ltd  */
class Product extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['user_data']="";
		$this->data['url'] = base_url();
		$this->load->model('authority_model');
		$this->load->model('product_model');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');	
	 }
	/*function for add product view*/
	public function products($info=false)
	{
		Authority::is_logged_in();
		$unit=$this->data['unit']=$this->product_model->unit();
		$product=$this->data['product']=$this->product_model->product($info);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('crm/products',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	/* function for insert product */
	public function insert_product($info=false)
	{
		Authority::is_logged_in();
		//if(Authority::checkAuthority('insert_product')==true)
		//{
			//redirect('master/manage_departments');
		//}
		$userdata = $this->session->userdata('user_data');
		$role=$userdata['role_id'];
		$user_id=$userdata['user_id'];
		$product=$this->input->post('product_desc');
		$_FILES['product_img']['name'];
		move_uploaded_file($_FILES['product_img']['tmp_name'],"img/".time().$_FILES['product_img']['name']);
		$product_img = time().$_FILES['product_img']['name'];
		$time_now=mktime(date('h')+3,date('i')+30,date('s'));
		if($product)
		{
			//for($i=0;$i<count($dep);$i++)
			//{
				$data=array(
								'organization_id'=>$info,
								'product_image'=>$product_img,
								'product_desc'=>$this->input->post('product_desc'),
								'product_rate'=>$this->input->post('product_rate'),
								'unit_code'=>$this->input->post('unit_code'),
								'created_by'=>$user_id,
								'created_on'=>date('d-m-Y h:i:s A',$time_now)
						);
				$this->product_model->insert_products('products',$data);
			//}
			//print_r($data);die;
		}
		$this->session->set_flashdata('category_success', 'success message	');
		$this->session->set_flashdata('message', $this->config->item("user").' Product Inserted successfully');
		redirect('crm/product/manage_product');
	}
	
	/* function for delete product */
	public function delete_product($info)
	{
		Authority::is_logged_in();
		$this->product_model->delete_product($info);
		$this->session->set_flashdata('category_success','success message');
		$this->session->set_flashdata('message', $this->config->item("user").' Product delete successfully');
		redirect('crm/product/manage_product');
	}
	
	/*function for manage product view*/
	public function manage_product($info=false)
	{
		Authority::is_logged_in();
		$userdata = $this->session->userdata('user_data');
		$role=$userdata['user_id']!=='superuser';
		$organization=$userdata['organization_id'];
		$list_product = $this->data['list_product']= $this->product_model->list_product($organization);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/left_menu',$this->data);
		$this->load->view('crm/manage_product',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}

}
