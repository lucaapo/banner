<?php
$this->load->helper('form');
echo validation_errors(); 
$data=array('method'=>'post');
echo form_open('website/addone');

$data = array(
              'name'        => 'name',
              'id'          => 'name',
              'value'       => '',
              'maxlength'   => '200',
              'size'        => '50',
              'style'       => 'width:50%',
            );

echo form_input($data);

$data = array(
              'name'        => 'root',
              'id'          => 'root',
              'value'       => '',
              'maxlength'   => '250',
              'size'        => '50',
              'style'       => 'width:50%',
            );

echo form_input($data);

//$data = array(
//              'name'        => 'root',
//              'id'          => 'root',
//              'value'       => '',
//              'maxlength'   => '250',
//              'size'        => '50',
//              'style'       => 'width:50%',
//            );
//
//echo form_input($data);

echo form_submit('submit', 'Add Website');

echo form_close();
