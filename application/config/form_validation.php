<?php

$config = array(
	'login' => array(
		array(
			'field' => 'username', 
			'label' => 'username', 
			'rules' => 'required'
		),
		array(
			'field' => 'password', 
			'label' => 'password', 
			'rules' => 'required'
		)
	),
	'cookie_report' => array(
        array(
            'field' => 'cookie',
            'label' => 'cookie',
            'rules' => 'required|callback_is_cookie'
        ),
        array(
            'field' => 'host',
            'label' => 'host',
            'rules' => 'required|valid_url'
        )
    ),
    'send_msg' => array(
    	array(
    		'field' => 'name',
    		'label' => 'name',
    		'rules' => 'required|max_length[100]'
    	),
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required|max_length[150]|valid_email'
		),
		array(
			'field' => 'subject',
			'label' => 'subject',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'message',
			'label' => 'message',
			'rules' => 'required|max_length[1000]'
		),
    ),
    'ADM.change_password' => array(
		array(
			'field' => 'password', 
			'label' => 'password', 
			'rules' => 'required'
		)
	),
    'ADM.add_sc' => array(
		array(
			'field' => 'nickname', 
			'label' => 'nickname', 
			'rules' => 'required|is_unique[nick_sc.nick]'
		)
	),
	'ADM.add_slider' => array(
		array(
			'field' => 'isi_slider_text', 
			'label' => 'isi_slider_text', 
			'rules' => 'required'
		)
	),
	'ADM.update_welcome' => array(
		array(
			'field' => 'welcome', 
			'label' => 'welcome', 
			'rules' => 'required'
		)
	),
    'ADM.add_member' => array(
		array(
			'field' => 'nickname', 
			'label' => 'nickname', 
			'rules' => 'required|is_unique[member.nickname]'
		),
		array(
			'field' => 'role', 
			'label' => 'role', 
			'rules' => 'required'
		)
    ),
    'ADM.tambah_kas' => array(
    	array(
            'field' => 'amount',
            'label' => 'amount',
            'rules' => 'required|is_natural_no_zero'
        ),
    ),
    'ADM.tambah_member_kas' => array(
    	array(
            'field' => 'nickname',
            'label' => 'nickname',
            'rules' => 'required'
        ),
    ),
    'ADM.hapus_member_kas' => array(
    	array(
            'field' => 'id',
            'label' => 'id_member',
            'rules' => 'required|is_natural_no_zero'
        ),
    ),
    'ADM.edit_member_kas' => array(
    	array(
            'field' => 'id',
            'label' => 'id_member',
            'rules' => 'required|is_natural_no_zero'
        ),
    	array(
            'field' => 'nickname',
            'label' => 'nickname',
            'rules' => 'required'
        ),
    ),
);

$config['error_prefix'] = '<div class="alert alert-danger">';
$config['error_suffix'] = '<span class="close" data-dismiss="alert">&times;</span></div>';