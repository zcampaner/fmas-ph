<?php 
$config = array(

	'register' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|alpha_dash'
			),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|matches[passconfirm]'
			),
		array(
			'field' => 'passconfirm',
			'label' => 'Password Confirmation',
			'rules' => 'required|matches[password]'
			),
		array(
			'field' => 'fullname',
			'label' => 'Full Name',
			'rules' => 'required'
			)
		),

	'posts' => array(
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'required'
			),
		array(
			'field' => 'category',
			'label' => 'Category',
			'rules' => 'required'
			),
		array(
			'field' => 'content',
			'label' => 'Content',
			'rules' => 'required'
			)
		),
	'edit' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|alpha_dash'
			),
		array(
			'field' => 'fullname',
			'label' => 'Full Name',
			'rules' => 'required'
			)
		)

	);