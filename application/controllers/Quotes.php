<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function __construct(){
		parent::__construct();
			$this->load->library('form_validation');

	}
		
	public function index()
	{
		$this->load->view('loginreg');
	}

	public function viewDashboard()
	{
		$loggedUser = $this->session->userdata('loggedin');
		$this->load->model('Quote');   
		$faves = $this->Quote->displayFavorites($loggedUser['id']);
		$notfaves = $this->Quote->displayNotFavorites($loggedUser['id']);
		$this->load->view('userpage', ['faves' => $faves, 'notfaves' => $notfaves]);
	}

	public function register() 
	{
		
		$this->form_validation->set_rules('reg_name', 'Name', 'required');
		$this->form_validation->set_rules('reg_alias', 'Alias', 'required|alpha_numeric');
		$this->form_validation->set_rules('reg_email', 'Email','required|valid_email');
		$this->form_validation->set_rules('reg_password', 'Password','required|min_length[8]|max_length[12]|alpha_numeric');
		$this->form_validation->set_rules('reg_confpassword', 'Confirm Password', 'required|matches[reg_password]');
		$this->form_validation->set_rules('date_of_birth', 'Date', 'required');



			if($this->form_validation->run() == FALSE)
			{
				$errors = $this->form_validation->getErrorsArray();
				$this->session->set_flashdata('errors', $errors);
				$this->load->view('loginreg');
			}
			else
			{
				$this->load->model('Quote');   //use this instead of "$_POST"
				$method = $this->Quote->addUser($this->input->post());
				$this->load->view('loginreg');
			}

	}
	public function login()	{
		// $login_info = $this->input->post();	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('login_email', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('login_password', 'Password', 'required|min_length[8]');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('loginreg');
			}
			else
			{
				$login_info = $this->input->post();
				$this->load->model("Quote");
				$method = $this->Quote->getUserinfo($login_info);
				$this->session->set_userdata('loggedin', $method);
				redirect('/Quotes/viewDashboard');
				
			}
	}

	public function addQuote()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('quoted_by', 'Quoted By:', 'required|min_length[3]');
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[10]');

			if($this->form_validation->run() == FALSE)
			{  
				$this->load->view('userpage');
			}
			else{
				$this->load->model('Quote');
				$this->Quote->addQuote($this->input->post());
				redirect('Quotes/viewDashboard');
			}

	}

	public function addFave($quoteid, $userid)
	{
		$this->load->model('Quote');
		$this->Quote->addToList($quoteid, $userid);
		
		redirect('/Quotes/viewDashboard');
	}

	public function removeFave($quoteid, $userid)
	{
		$this->load->model('Quote');
		$this->Quote->removeFave($quoteid, $userid);

		redirect('/Quotes/viewDashboard');
	}

	public function viewPoster($id)
	{
		
		$this->load->model('Quote');
		$poster_info = $this->Quote->viewPoster($id);
		$this->load->view('posterpage', ['poster' => $poster_info]);

		

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function dash()
	{
		redirect('/Quotes/viewDashboard');
	}












}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */