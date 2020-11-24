<?php 
  function belumlogin()
  {
    $cek = get_instance();
    if (!$cek->session->userdata('email')) 
    {
      redirect('admin/Auth');
    }
  }

  function sudahlogin()
  {
    $cek = get_instance();
    if ($cek->session->userdata('email')) 
    {
      redirect('admin/Dashboard');
    }
  }

  function Ubelumlogin()
  {
    $cek = get_instance();
    if (!$cek->session->userdata('email')) 
    {
      redirect('user/Auth');
    }
  }

  function Usudahlogin()
  {
    $cek = get_instance();
    if ($cek->session->userdata('email')) 
    {
      redirect('user/home');
    }
  }
?>