<?php
function belumlogin()
{
  $cek = get_instance();
  if (!$cek->session->userdata('email')) {
    redirect('admin/Auth');
  }
}

//UNTUK MENGECEK SIAPA YANG LOGIN DAN DAPAT MENGAKSES APA SAJA
function cek()
{
  $cek = get_instance();
  if (!$cek->session->userdata('id_bagian' == 1)) {
    redirect('admin/Dashboard');
  }
}
// function cek2()
// {
//   $cek = get_instance();
//   if ($cek->session->userdata('id_bagian' == 1))
//   if (!$cek->session->userdata('id_bagian')  == 1 && !$cek->session->userdata('id_bagian') == 3)
//   {
//     redirect('admin/Transaksi');
//   } elseif ($cek->session->userdata('id_bagian' == 2)) {
//     redirect('admin/Dashboard');
//   } elseif ($cek->session->userdata('id_bagian' == 3)) {
//     redirect('admin/Transaksi');
//   }
// }
//END OF FUNCTION CEK

function sudahlogin()
{
  $cek = get_instance();
  if ($cek->session->userdata('email')) {
    redirect('admin/Dashboard');
  }
}

function Ubelumlogin()
{
  $cek = get_instance();
  if (!$cek->session->userdata('email')) {
    redirect('user/Auth');
  }
}

function Usudahlogin()
{
  $cek = get_instance();
  if ($cek->session->userdata('email')) {
    redirect('user/home');
  }
}
