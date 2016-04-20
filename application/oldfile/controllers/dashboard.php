<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if( $this->session->userdata('is_logged') )
		{
			redirect('dashboard/add_content');
		}
		else
		{
			if( $this->input->post('username') )
			{
				$data = $this->input->post('user');

				$this->form_validation->set_rules('username', 'Username', 'required|trim');
				$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check_password');

				if($this->form_validation->run() == FALSE)
				{
					$data['title'] = "Login Page for Students";
					$this->session->set_flashdata( '_message', '<div class="alert alert-danger">Username or password is Wrong!</div>' );
				}
				else{
					redirect('dashboard/add_content' );
				}
			}
			$this->load->view('admin_page/login');
		}
		
	}

	function check_password()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$data = $this->admin->get_user($user, $pass);
		if($data == TRUE)
		{
			foreach ($data as $users ) {
				$sess_arr = array(
					'id' => $users->id,
					'username' => $users->username,
					'fullname' => $users->fullname
					);
			}
			$this->session->set_userdata('is_logged', $sess_arr);
		}
		else
		{
			$this->form_validation->set_message('check_password', 'Username or password is Wrong!');
			return FALSE;
		}
	}

	public function add_user()
	{
		if( $this->session->userdata('is_logged') )
		{
			
			if( $this->form_validation->run( 'register' ) == FALSE)
			{
				$this->load->view('layout/header');
				$this->load->view('admin_page/add_user');
				$this->load->view('layout/footer');
			}
			else
			{
				if($this->admin->user_exist(  $this->input->post('username') ))
				{
					$password = hash( 'sha512', $this->input->post('password') );

					$data = array(
						'username' => $this->input->post('username'),
						'password' => $password,
						'fullname' => $this->input->post('fullname')
						);
					$this->admin->insert_user( $data );
					$this->session->set_flashdata( '_message', '<div class="alert alert-success">Success!</div>' );
					redirect( 'dashboard/add_user' );
				}
				else
				{
					$this->session->set_flashdata( '_message', '<div class="alert alert-danger">Username already exist</div>' );
					redirect( 'dashboard/add_user' );
				}
				
				
			}

			
		}
		else
		{
			redirect('dashboard');
		}
		
	}

	public function edit_user($id = null)
	{
		if( $this->session->userdata('is_logged') )
		{
			if( $this->form_validation->run( 'edit' ) == FALSE)
			{
				$data['user'] = $this->admin->get_user_id($id);
				$this->load->view('layout/header', $data);
				$this->load->view('admin_page/edit_user');
				$this->load->view('layout/footer');
			}
			else
			{
				if($this->admin->user_exist(  $this->input->post('username') ))
				{
					$data = array(
						'username' => $this->input->post('username'),
						'fullname' => $this->input->post('fullname')
						);

					$this->admin->edit_user($id, $data );
					$this->session->set_flashdata( '_message', '<div class="alert alert-success">Success!</div>' );
					redirect( 'dashboard/edit_user/'.$id );
				}
				else
				{
					$this->session->set_flashdata( '_message', '<div class="alert alert-danger">Username already exist</div>' );
					redirect( 'dashboard/edit_user/'.$id );
				}
			}
			
		}
		else
		{
			redirect('dashboard');
		}
		
	}

	public function del_user($id = '')
	{
		$this->admin->del_user($id);
		$this->session->set_flashdata( '_message', '<div class="alert alert-success">Deleted Successfully!</div>' );
		redirect('dashboard/view_users');
	}

	public function view_users()
	{
		if( $this->session->userdata('is_logged') )
		{
			$user = $this->admin->get_users();
			$data['users'] = $user['result'];
			$this->load->view('layout/header', $data);
			$this->load->view('admin_page/view_users');
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('dashboard');
		}
		
	}

	public function add_content()
	{
		if( $this->session->userdata( 'is_logged' ) )
		{
			if($this->form_validation->run( 'posts' ) == FALSE)
			{
				$this->load->view('layout/header');
				$this->load->view('admin_page/add_content');
				$this->load->view('layout/footer');
			}
			else
			{
				$user = $this->session->userdata('is_logged'); 
				$data = array(
					'title' 	=> $this->input->post('title'),
					'content' 	=> $this->input->post('content'),
					'category' 	=> $this->input->post('category'),
					'author' 	=> $user[ 'fullname' ]
					);

				$this->admin->add_posts($data);
			}

		}
		else
		{
			redirect('dashboard');
		}
		
	}

	public function delete_content($value='')
	{
		$this->admin->del_content($value);
		$this->session->set_flashdata( '_message', '<div class="alert alert-warning">Content Deleted Successfully!</div>' );
		redirect('dashboard/view_content');
	}

	public function view_gallery($id = null)
	{
		if( $this->session->userdata('is_logged') )
		{
			$data['images'] = $this->admin->get_images($id);
			
			$this->load->view('layout/header', $data);
			$this->load->view('admin_page/view_gallery');
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('dashboard');
		}
		
	}

	public function del_album($value='')
	{
		$this->admin->remove_album($value);
		$this->session->set_flashdata( '_message', '<div class="alert alert-warning">Album Deleted Successfully!</div>' );
		redirect('dashboard/view_albums');
	}

	public function add_album()
	{
		if( $this->session->userdata('is_logged') )
		{
			$this->load->view('layout/header');
			$this->load->view('admin_page/add_album');
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('dashboard');
		}
		
	}

	public function view_albums()
	{
		if( $this->session->userdata('is_logged') )
		{
			$v = $this->admin->get_image_by_album();
			$data['albums'] = $v['results'];

			$this->load->view('layout/header', $data);
			$this->load->view('admin_page/view_albums');
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('dashboard');
		}
		

	}

	public function view_content()
	{
		if( $this->session->userdata('is_logged') )
		{
			$data['posts'] = $this->admin->view_posts();
			$this->load->view('layout/header', $data);
			$this->load->view('admin_page/view_content');
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('dashboard');
		}
		
	}

	public function add_new_photos($value='')
	{
		$this->load->view('layout/header');
			$this->load->view('admin_page/add_images');
			$this->load->view('layout/footer');
	}

	function add_img()
	{
		$cpt = count($_FILES['userfile']['name']);
		if( $cpt <= 0)
		{
			$this->session->set_flashdata( '_message', '<div class="alert alert-danger">Image Empty.</div>' );
			redirect('dashboard/view_albums');
		}
		else
		{
			if(!empty( $_FILES['userfile']['name'] ))
			{
				$this->load->library('upload');

				$files = $_FILES;
				$album = $this->input->post('album');
				for($i=0; $i < $cpt; $i++)
				{

					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];    

					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload();
					$data = $this->upload->data();
					$p = array(
						'album_id' => $this->input->post('album_id'),
						'img_name' => $data['file_name']
						);
					
					$this->admin->upload_images($p);
					

				}
				$this->session->set_flashdata( '_message', '<div class="alert alert-success">Upload Complete.</div>' );
				redirect('dashboard/view_albums');
			}
		}

	}

	function do_upload()
	{
		$cpt = count($_FILES['userfile']['name']);
		if( $cpt <= 0)
		{
			$this->session->set_flashdata( '_message', '<div class="alert alert-danger">Image Empty.</div>' );
			redirect('dashboard/view_albums');
		}
		else
		{
			if(!empty( $_FILES['userfile']['name'] ))
			{
				$this->load->library('upload');

				$files = $_FILES;
				$album = $this->input->post('album');
				$x = $this->admin->add_album( array( 'album_name' => $album ) );
				for($i=0; $i < $cpt; $i++)
				{

					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];    

					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload();
					$data = $this->upload->data();
					$p = array(
						'album_id' => $x,
						'img_name' => $data['file_name']
						);
					
					$this->admin->upload_images($p);
					

				}
				$this->session->set_flashdata( '_message', '<div class="alert alert-success">Upload Complete.</div>' );
				redirect('dashboard/view_albums');
			}
		}

	}

	private function set_upload_options()
	{   
		//  upload an image options
		$config = array();
		$config['upload_path'] 		= './uploads/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']      	= '0';
		$config['overwrite']     	= FALSE;
		$config['encrypt_name'] 	= TRUE;


		return $config;
	}

	/* 
	------------------------
		DOWNLOADABLES
	------------------------
	*/

	public function view_downloads()
	{
		$data['cats'] = $this->admin->get_cat();
		$data['files'] = $this->admin->get_files();
		$this->load->view('layout/header', $data);
		$this->load->view('admin_page/download', array('error' => '') );
		$this->load->view('layout/footer');
	}

	public function add_file()
	{
		$data['cats'] = $this->admin->get_cat();
		$this->load->view('layout/header', $data);
		$this->load->view('admin_page/add_file' );
		$this->load->view('layout/footer');
	}

	public function del_file($id='')
	{
		$this->admin->del_file($id);
		$this->session->set_flashdata( '_message', '<div class="alert alert-success">Delete Complete.</div>' );
		redirect('dashboard/view_downloads');
	}

	public function upload_file()
	{
		$this->load->library('upload');
		$this->upload->initialize( $this->config_options() );

		if( ! $this->upload->do_upload() )
		{
			$error = array( 'error' => $this->upload->display_errors() );

			$x = $this->upload->display_errors('<p>', '</p>');

			$this->session->set_flashdata( '_message', $x);
			redirect('dashboard/view_downloads');
		}
		else
		{
			$data = $this->upload->data();
			$ext = strtoupper( substr($data['file_ext'], 1, strlen($data['file_ext']) - 1));
			$x = array( 
				'file_desc' => $this->input->post('txt_desc'),
				'file_name' => $data['file_name'],
				'file_type'	=> $ext,
				'file_cat_id' => $this->input->post('category')
				);
			$this->admin->add_files($x);
			$this->session->set_flashdata( '_message', '<div class="alert alert-success">Upload Complete.</div>' );
			redirect('dashboard/view_downloads');
		}
	}



	private function config_options()
	{   
		//  upload an image options
		$config = array();
		$config['upload_path'] 		= './uploads/';
		$config['allowed_types'] 	= 'rar|txt|docx|doc|zip|pdf|xls|xlsx';
		$config['max_size']      	= '0';
		$config['overwrite']     	= FALSE;
		$config['encrypt_name'] 	= TRUE;


		return $config;
	}

	public function edit_file($id = '')
	{
		
		$this->form_validation->set_rules('txt_desc', 'Short Description', 'required');
		if( $this->form_validation->run() == FALSE )
		{
			$data['desc'] = $this->admin->get_file($id);
			$this->load->view('layout/header', $data);
			$this->load->view('admin_page/edit_file');
			$this->load->view('layout/footer');
		}
		else
		{
			$data = array(
				'file_desc' => $this->input->post('txt_desc')
				);
			$this->admin->edit_file($id, $data);
			$this->session->set_flashdata( '_message', '<div class="alert alert-success">Edit Complete.</div>' );
			redirect('dashboard/edit_file/'.$id);
		}

	}

	public function del_img($album_id = '', $value='')
	{
		$this->admin->del_img($value);
		$this->session->set_flashdata( '_message', '<div class="alert alert-success">Deleted Photo Complete.</div>' );
		redirect('dashboard/view_gallery/'.$album_id);
	}

	public function add_category()
	{
		$this->form_validation->set_rules('cat', 'File Category', 'required');
		if( $this->form_validation->run() == FALSE )
		{
			$this->load->view('layout/header');
			$this->load->view('admin_page/add_category');
			$this->load->view('layout/footer');
		}
		else
		{
			$data = array(
				'category_name' => $this->input->post('cat')
				);
			$this->admin->add_category($data);
			$this->session->set_flashdata( '_message', '<div class="alert alert-success">Added Category Complete.</div>' );
			redirect('dashboard/view_downloads');
		}
	}

	public function add_client()
	{
		$this->load->view('layout/header');
		$this->load->view('admin_page/add_clients');
		$this->load->view('layout/footer');
	}

	public function insert_clients()
	{
		if( $this->input->post('client') )
		{
			$data = $this->input->post('client');
			for ($i=0; $i < count( $data ) - 1; $i++) { 
				if( !empty( $data[$i] ) )
				{
					$this->admin->insert_client( array( 'client_name' => $data[$i] ) );
				}
				
			}
			$this->session->set_flashdata( '_message', '<div class="alert alert-success">Client Added Complete.</div>' );
			redirect('dashboard/view_clients');
		}
	}

	public function del_client($value='')
	{
		$this->admin->del_client($value);
		$this->session->set_flashdata( '_message', '<div class="alert alert-success">Client Deleted Complete.</div>' );
		redirect('dashboard/view_clients');
	}

	public function view_clients()
	{
		$data['clients'] = $this->admin->get_clients();
		$this->load->view('layout/header', $data);
		$this->load->view('admin_page/clients');
		$this->load->view('layout/footer');
	}



	/* ----------END---------- */

	public function logout()
	{
		$this->session->unset_userdata('is_logged');
		$this->session->sess_destroy();
		redirect('dashboard');
	}

}
