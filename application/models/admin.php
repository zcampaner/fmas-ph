<?php

class Admin extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	public function get_user($username ='', $password ='')
	{
		$user = array( 'username' => $username, 'password' => hash( 'sha512', $password ) );
		$query = $this->db->get_where('tb_users', $user);
		return $query->result();
	}

	public function get_users()
	{
		$query = $this->db->get('tb_users');
		return array( 'result' => $query->result(), 'count' => $query->num_rows() );
	}

	public function get_user_id($id=null)
	{
		$v = $this->db->get_where('tb_users', array('id' => $id));
		return $v->result();
	}

	public function edit_user($id = '', $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_users', $data);
	}

	public function insert_user($data = null)
	{
		$this->db->insert( 'tb_users', $data );
	}

	public function del_user($value='')
	{
		$this->db->delete('tb_users', array('id' => $value) );
	}

	public function user_exist($user = null)
	{
		$x = $this->db->get_where('tb_users', array('username' => $user) );
		if($x->num_rows() > 0)
		{
			return false;
		}
		else
		{
			return TRUE;
		}
	}

	public function add_posts($data = array())
	{
		$this->db->trans_start();
		$this->db->insert('tb_posts', $data);
		$this->db->trans_complete();
	}

	public function add_album($data = array())
	{
		$this->db->trans_start();
		$this->db->insert('tb_album', $data);
		$id = $this->db->insert_id();
		$this->db->trans_complete();
		return $id;
	}

	public function del_content($value='')
	{
		$this->db->delete('tb_posts', array('post_id' => $value) );
	}

	public function upload_images($image = array())
	{
		$this->db->insert('tb_images', $image);
	}

	public function get_albums()
	{
		$v = $this->db->get('tb_album');
		return $v->result();
	}

	public function get_images($id = '')
	{
		$v = $this->db->get_where('tb_images', array('album_id' => $id) );
		return $v->result();
	}

	public function get_all_img()
	{
		$v = $this->db->get('tb_images');
		return $v->result();
	}

	public function get_album_by_id($id = '')
	{
		$k = $this->db->get_where('tb_album', array( 'album_id' => $id ) );
		return $k->result();
	}

	public function del_img($value='')
	{
		$this->db->where('img_id', $value);
		$this->db->delete('tb_images');
	}

	public function remove_album($value='')
	{
		$this->db->trans_start();
		$this->db->where('album_id', $value);
		$this->db->delete('tb_album');
		$this->db->trans_complete();

		$this->db->trans_start();
		$this->db->where('album_id', $value);
		$this->db->delete('tb_images');
		$this->db->trans_complete();
	}

	public function get_image_by_album()
	{
		$this->db->select('tb_images.img_name as img_name, tb_album.album_name as album_name, tb_images.album_id as album_id');
		$this->db->from('tb_images');
		$this->db->join('tb_album', 'tb_album.album_id = tb_images.album_id');
		$this->db->order_by('tb_images.img_id', 'DESC');
		$this->db->group_by('tb_images.album_id');
		$x = $this->db->get();
		return array( 'results' => $x->result(), 'count' => $x->num_rows() );
	}

	public function view_posts()
	{
		$this->db->select('post_id, title, content, category, UNIX_TIMESTAMP(date_added) as date, author');
		$this->db->from('tb_posts');
		$this->db->order_by('date', 'DESC');
		$x = $this->db->get();
		return $x->result();
	}

	public function edit_post($id=null, $data = array())
	{
		$this->db->where('post_id', $id);
		$this->db->update('tb_posts', $data);
	}

	/**
	* -----------------------
	*	CLIENTS 
	* -----------------------
	*/

	public function get_clients()
	{
		$x = $this->db->get('tb_clients');
		return $x->result();
	}

	public function insert_client($value= array() )
	{
		$this->db->trans_start();
		$this->db->insert('tb_clients', $value);
		$this->db->trans_complete();
	}

	public function del_client($value='')
	{
		if($value != '')
		{
			$this->db->where('client_id', $value);
			$this->db->delete('tb_clients');
		}
		else
		{
			return FALSE;
		}
		
	}
	


	/**
	* -----------------------
	*	DOWNLOADS 
	* -----------------------
	*/

	public function add_category($data = array())
	{
		$this->db->insert('tb_file_category', $data);
	}

	public function edit_category($id= '', $value=array())
	{
		$this->db->where('file_cat_id', $id);
		$this->db->update('tb_file_category', $value);
	}

	public function get_cat()
	{
		$v = $this->db->get('tb_file_category');
		return $v->result();
	}

	public function get_files()
	{
		$this->db->select('tb_files.*, tb_file_category.category_name');
		$this->db->from('tb_files');
		$this->db->join('tb_file_category', 'tb_file_category.file_cat_id = tb_files.file_cat_id');
		$v = $this->db->get();
		return $v->result();
	}

	public function search_file($value='')
	{
		$this->db->select('tb_files.*, tb_file_category.category_name');
		$this->db->from('tb_files');
		$this->db->join('tb_file_category', 'tb_file_category.file_cat_id = tb_files.file_cat_id');
		$this->db->like('tb_files.file_desc', $value);
		$v = $this->db->get();
		return $v->result();
	}

	public function get_file($value='')
	{

		$v = $this->db->get_where('tb_files', array( 'file_id' => $value ) );
		return $v->result();
	}

	public function add_files($data = array())
	{
		$this->db->insert('tb_files', $data);
	}

	public function edit_file($value='', $data=array())
	{
		$this->db->where('file_id', $value);
		$this->db->update('tb_files', $data);
	}

	public function del_file($value='')
	{
		$this->db->where('file_id', $value);
		$this->db->delete('tb_files');
	}




	/**
	* -----------------------
	*	SERVICES 
	* -----------------------
	*/

}