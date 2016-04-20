<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin');
	}

	public function index()
	{
		$this->load->view('front_layout/header');
		$this->load->view('front_pages/index');
		$this->load->view('front_layout/footer');
	}

	public function gallery()
	{
		$v = $this->admin->get_image_by_album();
		$data['images'] = $v['results'];

		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/gallery');
		$this->load->view('front_layout/footer');
	}

	public function album($id = '')
	{
		$data['images'] = $this->admin->get_images($id);
		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/album');
		$this->load->view('front_layout/footer');
	}

	public function contacts()
	{

		$this->load->view('front_layout/header');
		$this->load->view('front_pages/contacts');
		$this->load->view('front_layout/footer');
	}

	public function services()
	{
		$this->load->view('front_layout/header');
		$this->load->view('front_pages/services');
		$this->load->view('front_layout/footer');
	}

	public function downloads()
	{
		$data['files'] = $this->admin->get_files();
		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/downloads');
		$this->load->view('front_layout/footer');
	}

	public function clients()
	{
		$data['clients'] = $this->admin->get_clients();
		$this->load->view('front_layout/header', $data);
		$this->load->view('front_pages/clients');
		$this->load->view('front_layout/footer');
	}
}