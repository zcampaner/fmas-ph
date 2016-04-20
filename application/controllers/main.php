<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('front_layout/header');
		$this->load->view('front_pages/index');
		$this->load->view('front_layout/footer');
	}

	public function gallery()
	{
		$data = array(
			'main' => anchor('main', 'Home'),
			'sub'  => 'Gallery'
			);

		$v = $this->admin->get_image_by_album();
		$data['images'] = $v['results'];

		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/gallery');
		$this->load->view('front_layout/footer');
	}

	public function album($id = '')
	{
		$data = array(
			'main' => anchor('main', 'Home'),
			'sub'  => anchor('main/gallery', 'Gallery'),
			'sub_main' => 'Album'
			);

		$data['images'] = $this->admin->get_images($id);
		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/album');
		$this->load->view('front_layout/footer');
	}

	public function contacts()
	{
		$data = array(
			'main' => anchor('main', 'Home'),
			'sub'  => 'Contacts'
			);

		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/contacts');
		$this->load->view('front_layout/footer');
	}

	public function services()
	{
		$data = array(
			'main' => anchor('main', 'Home'),
			'sub'  => 'Services',
			);

		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/services');
		$this->load->view('front_layout/footer');
	}

	public function downloads()
	{
		$data = array(
			'main' => anchor('main', 'Home'),
			'sub'  => 'Downloads'
			);

		$data['files'] = $this->admin->get_files();
		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/downloads');
		$this->load->view('front_layout/footer');
	}

	public function search()
	{
		$this->form_validation->set_rules('search', 'Search', 'alpha_dash'); 
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Login Page for Students";
			$this->session->set_flashdata( '_message', '<div class="alert alert-danger">Username or password is Wrong!</div>' );
			redirect('main/downloads' );
		}
		else{
			$data = array(
				'main' => anchor('main', 'Home'),
				'sub'  => 'Downloads'
				);
			$o = $this->input->post('search');
			$this->session->set_flashdata('_message', '<strong>Search results for: ' . $o);
			
			$data['files'] = $this->admin->search_file( $o );
			$this->load->view('front_layout/header', $data);
			$this->load->view('front_pages/search');
			$this->load->view('front_layout/footer');
		}
		$x = $this->admin->search_file();
	}

	public function clients()
	{
		$data = array(
			'main' => anchor('main', 'Home'),
			'sub'  => 'Clients'
			);

		$data['clients'] = $this->admin->get_clients();
		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/clients');
		$this->load->view('front_layout/footer');
	}
}