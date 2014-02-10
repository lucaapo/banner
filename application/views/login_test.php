<?php
$this->load->helper('form');
echo validation_errors(); 
$data=array('method'=>'post');
echo form_open('user/login');

$data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );

echo form_input($data);

$data = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );

echo form_password($data);

echo form_submit('submit', 'Login');

echo form_close();
