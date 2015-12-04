<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for login Functionality */
class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['user_data']="";
		$this->data['url'] = base_url();
		$this->load->model('login_model');
		$this->load->model('organization_model');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->data['base_url']=base_url();
		$this->load->library('session');
	}
	
	//signup
	public function index()
	{	
		$list_organization = $this->data['list_organization'] = $this->organization_model->list_organization();
		$this->parser->parse('include/header',$this->data);
		$this->load->view('signup',$this->data);//login page view
		$this->parser->parse('include/footer',$this->data);
	}
	
						/*Forget Password view*/
	public function forget_pwd()
	{
		$this->parser->parse('include/header',$this->data);
		$this->load->view('forget_pwd',$this->data);//login page view
		$this->parser->parse('include/footer',$this->data);
	}

                        /* Forget Password function email */
	public function forget_pwd_email()
	{
             
	$email=$this->input->post('usermailid');
		 if($email)
             {
                $forget_pwd_email= $this->data['forget_pwd_email']=  $this->login_model->forget_pwd_email($email);
				if($forget_pwd_email){
                      $user_id= $forget_pwd_email[0]->user_id;
                      $password=$forget_pwd_email[0]->password;
				 $subject="junctionerp :-Forget Password";
                 $message= " <html><body><h3>Dear: User</h3><p> Your <b>User Id:</b> <i>$user_id</i> and <b>Password:</b> <i>$password</i> </p><p><h3>Please Click In This Link And Login Your Account  :)</h3></p><p>  http://junctionerp.com/login/login_view </p></body></html>";
				$name='Junction Software Pvt Ltd';
				  	
				/**
				 * This example shows settings to use when sending via Google's Gmail servers.
				 */

				//SMTP needs accurate times, and the PHP time zone MUST be set
				//This should be done in your php.ini, but this is how to do it if you don't have access to that
				date_default_timezone_set('Etc/UTC');

				require 'PHPMailer/PHPMailerAutoload.php';

				//Create a new PHPMailer instance
				$mail = new PHPMailer;

				//Tell PHPMailer to use SMTP
				$mail->isSMTP();

				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				$mail->SMTPDebug = 0;

				//Ask for HTML-friendly debug output
				$mail->Debugoutput = 'html';

				//Set the hostname of the mail server
				$mail->Host = 'smtp.gmail.com';

				//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
				$mail->Port = 587;

				//Set the encryption system to use - ssl (deprecated) or tls
				$mail->SMTPSecure = 'tls';

				//Whether to use SMTP authentication
				$mail->SMTPAuth = true;

				//Username to use for SMTP authentication - use full email address for gmail
				$mail->Username = "dev4junction@gmail.com";

				//Password to use for SMTP authentication
				$mail->Password = 'initial1$';

				//Set who the message is to be sent from
				$mail->setFrom($email,$name);

				//Set an alternative reply-to address
				$mail->addReplyTo('dev4junction@gmail.com', $name);

				//Set who the message is to be sent to
				$mail->addAddress($email);

				//Set the subject line
				$mail->Subject = $subject;

				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML($message);

				//Replace the plain text body with one created manually
				$mail->AltBody = 'This is a plain-text message body';

				//Attach an image file
				$mail->addAttachment($uploadfile,$filename);

				//send the message, check for errors
				if (!$mail->send()) {
					print "We encountered an error sending your mail"; 
				} else {
					$this->session->set_flashdata('category_success', 'success message');
					$this->session->set_flashdata('message', $this->config->item("user").' Kindly Check Registered Email ');
							redirect('http://junctionerp.com');
					  exit();
				}

             }
			 else{
			$this->session->set_flashdata('category_error', 'Error message');
							$this->session->set_flashdata('message',$this->config->item("user").'Please Enter correct Email Id');
							redirect('login/forget_pwd');
			 }
			 }
     }
	

				 /* login view */
	public function login_view($id=false,$code=false)
	{      
                if($code)
                {
                 $role_update=$this->data['role_update']=$this->login_model->role_update($id); 
                }
		$list_organization = $this->data['list_organization'] = $this->organization_model->list_organization();
		$this->parser->parse('include/header',$this->data);
		$this->load->view('login',$this->data);//login page view
		//$this->parser->parse('include/footer',$this->data);
	}
				
               				/*android code */
	public function updateServer()
	{
       $this->load->view('updateServer',$this->data);
	}




				/* Function for login and create session */	
	function login_user($info=false)
	{		
		$json= $_GET['json'];
		$json_data=json_decode($json);//print_r($json_data);die;
		$this->session->set_userdata('url',$json_data->url);
		$this->session->userdata('url');
		$this->session->set_userdata('db_name',$json_data->database_name);  
		$this->session->userdata('db_name');
		//$username= $_GET['username'];
		//$password= $_GET['password'];// echo $db_name; echo $username; echo $password; die;
		if($json_data->database_name && $json_data->username && $json_data->password)
		{
			$data=array(
					'Username'=>$json_data->username,
					'Password'=>$json_data->password
			);
			$row=$this->login_model->login_check('user',$data);
			if($row){
				if(isset($json_data->url)&&$json_data->url=='androide')
				{
					$data=array(
							'code'=>'200',
							'result'=>'success',
							'userType'=>$row->role_id,
					);
					echo json_encode($data);die;
				}
				$user_data = array(
						'usermailid' => $row->Username,
						'user_id' => $row->user_id,
						'role_id' => 'admin',
						'organization_id'=>$json_data->organization_id,
						'organization_name'=>str_replace('_',' ',$json_data->organization_name),
				);
				$this->session->set_userdata('user_data',$user_data);
				$this->session->userdata('user_data');
				//redirect('dashboard');
				redirect('home');
				/*$db_name=$this->input->post('db_name');
				 $this->session->set_userdata('db_name',$db_name);
				$this->session->userdata('db_name');*/
			}
			else {
				if(isset($json_data->url)&&$json_data->url=='androide')
				{
					$data=array(
							'code'=>'400',
							'result'=>'error',
					);
					echo json_encode($data);die;
				}
					$this->session->set_flashdata('message', 'Authentication failed');
		//	echo $this->session->userdata('error');die;
					?><script>alert('User id and Password does not match');</script><?php 
				redirect($json_data->url,'refresh');
			}
		}
		
		
		die;
		$email = $this->input->post('user_id');
		if($email)
		{	
			$orgnization = $this->input->post('organization_name');
				if($orgnization=='')
				{
					
						if('superuser'==$email && 'initial'==$this->input->post('password'))
						{
						
							if($email)
								{
									
												$user_data = array(
																	 'role_id' => $email,
																	 'user_id' => $email,
																	 'organization_id' =>'',
																	 'organization_name'=>''
																  );
												$this->session->set_userdata('user_data',$user_data);
												$user_session_data = $this->session->userdata('user_data');
												redirect('home');
											
									
								}
						}
						else
						{
							$this->session->set_flashdata('category_error', 'Error message');
							$this->session->set_flashdata('message',$this->config->item("user").'your user mailid and password wrong');
							redirect('login/login_view');
						}
						
				}
				elseif($orgnization!=='')
				{
							$orgnization=array(
									'organization_id'=>$this->input->post('organization_name')
											  );
							$data=array(
									'user_id'=>$this->input->post('user_id'),
									'password'=>$this->input->post('password'),
									'organization_id'=>$this->input->post('organization_name')
							);
							$list_organization =$this->login_model->list_organization('organization',$orgnization);
							$row=$this->login_model->login_check('users',$data);
                                                        if($row->role_id=='')
						{
							$this->session->set_flashdata('category_error','error');
							$this->session->set_flashdata('message',$this->config->item("user").'Please activate your account with used your registered email');
							redirect('login/login_view');
						}
							if($row->role_id=='blocked')
						{
							$this->session->set_flashdata('category_error','error');
							$this->session->set_flashdata('message',$this->config->item("user").'Your id have a blocked please               contact administrator');
							redirect('login/login_view');
						}
                                                      if($row){
								$user_data = array(
										'usermailid' => $row->usermailid,
										'user_id' => $row->user_id,
										'role_id'=>$row->role_id,
										'organization_id'=>$list_organization->organization_id,
										'organization_name'=>$list_organization->organization_name
												   );
								$this->session->set_userdata('user_data',$user_data);
								$user_session_data = $this->session->userdata('user_data');
								redirect('home');
							}
							else
							 {
							 	$this->session->set_flashdata('category_error', 'Error message');
							 	$this->session->set_flashdata('message',$this->config->item("user").'your user mailid and password wrong');
							 	redirect('login/login_view');
							 }
						}
		}
				else
						{	
							$this->session->set_flashdata('category_error', 'Error message');
							$this->session->set_flashdata('message',$this->config->item("user").'Please select your organization');
							  redirect('login/login_view');
						}
			
	
		
	}
	
		
					/* Function for sign up for new user */
	function sign_up()
{
                $organization_name=$this->input->post('organization_name');
                $email=$this->input->post('usermailid');
                $username=$this->input->post('username');
		if($organization_name)
		{
			$organization=$this->data['organization']=$this->login_model->insert_organization($organization_name);
			$organization_id=$this->data['organization_id']=$this->login_model->organization_id($organization_name);
			$org_id=$organization_id->organization_id;
			$data=array(
						'organization_id'=>$org_id,
						'user_id'=>$this->input->post('username'),
						'usermailid'=>$this->input->post('usermailid'),
						'password'=>$this->input->post('password')
						//'role_id'=>'Administrator',
			           );
                $org= md5($org_id);
				$name='Junction Software Pvt Ltd';
				$subject="Your Organization Successfully Registered";
                $message="<html><body><h3>Dear:- $username</h3><p><i>Your Organization Successfully Registered !</i></p><p> Please Click This Below Link For Activate Your Account </p>http://junctionerp.com/login/login_view/$org_id/$org<p>With Warm Regard<br>
                            Junction Software Pvt Ltd<br>
                            Mob:-  8109069226 </p></body></html>";	
							date_default_timezone_set('Etc/UTC');
							require 'PHPMailer/PHPMailerAutoload.php';
							$mail= new PHPMailer;
							$mail->isSMTP();
							$mail->SMTPDebug=0;
							$mail->Debugoutput='html';
							$mail->Host = 'smtp.gmail.com';
							$mail->Port = 587;
							$mail->SMTPSecure = 'tls';
							$mail->SMTPAuth = true;
							$mail->Username = "dev4junction@gmail.com";
							$mail->Password = 'initial1$';
							$mail->setFrom($email, $name);
							$mail->addReplyTo($email, $name);
							$mail->addAddress($email, $username);
							$mail->Subject = $subject;
							$mail->msgHTML($message);
							//Attach an image file
							//$mail->addAttachment($uploadfile,$filename);
							//$mail->AltBody = 'This is a plain-text message body';
							$mail->send();
                $organization=$this->data['organization']=$this->login_model->insert_users($data,'users');
				$this->session->set_flashdata('category_success', 'success message');
				$this->session->set_flashdata('message', $this->config->item("user").' Please login with your organization');
			redirect('login/login_view');
		}
		
	}
	
	
	function check_org()
	{
		$val= $this->input->post('val');
		$check_org=$this->data['check_org']=$this->login_model->check_org($val);
		if($check_org)
		{
			?>
				<span class="alert alert-danger"> Organization Already Exist Please Enter Another Organization</span>
			<?php 
		}
	}
	
	function email_chek()
	{
		$val= $this->input->post('val');
		$email_chek=$this->data['email_chek']=$this->login_model->email_chek($val);
		if($email_chek)
		{
			?>
					<span class="alert alert-danger"> Email  Already Exist Please Enter Another Email</span>
				<?php 
			}
		}
	function email_chek_exist()
	{
		$val= $this->input->post('val');
		$email_chek=$this->data['email_chek']=$this->login_model->email_chek($val);
		if(!$email_chek)
		{
			?>
					<span class="alert alert-danger"> Email  Does Not Exist Please Enter Registered Email</span>
				<?php 
			}
		}
	
	
}
/* End of login controller */