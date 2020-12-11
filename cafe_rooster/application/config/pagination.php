<?php 
//config
$config['base_url'] = 'http://localhost/kelompok_psi/cafe_rooster/admin/Transaksi/index';


// var_dump($config['total_rows']);
// die; 

//styling Pagination
$config['full_tag_open'] = '<div class="card-footer">
<nav aria-label="Contacts Page Navigation">
  <ul class="pagination justify-content-center m-0">';
$config['full_tag_close'] = '</ul></nav></div>';


$config['first_link'] = 'First';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';

$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

$config['attributes'] = array('class' => 'page-link');