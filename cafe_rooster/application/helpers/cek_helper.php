<?php 
  function belumlogin()
  {
    $cek = get_instance();
    if (!$cek->session->userdata('email')) 
    {
      redirect('admin/auth');
    }
  }

  function sudahlogin()
  {
    $cek = get_instance();
    if ($cek->session->userdata('email')) 
    {
      redirect('admin/dashboard');
    }
  }
?>