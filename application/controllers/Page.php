<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

   function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Webconfig');
        $this->load->model('Search');
        $this->load->model('query');
        $this->load->library('form_validation');
    }

    public function histori(){
        $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $data['pinjam'] = $this->db->get_where('datapinjam', ['UserID' => $user['UserID']])->result();
        $data['pinjams'] = $this->db->get_where('datapinjam', ['UserID' => $user['UserID']])->row_array();
         $pinjam = $this->db->get_where('datapinjam', ['UserID' => $user['UserID']])->row_array();
        
        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];


        $this->load->view('layout/header', $data);
		$this->load->view('page/histori');
		$this->load->view('layout/footer');
    }

     public function pengembalian(){
        $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $data['kembali'] = $this->db->get_where('datapengembalian', ['UserID' => $user['UserID']])->result();
         $data['kembalis'] = $this->db->get_where('datapengembalian', ['UserID' => $user['UserID']])->row_array();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];


        $this->load->view('layout/header', $data);
        $this->load->view('page/historikembali');
        $this->load->view('layout/footer');
    }

      public function detailpengembalian($id){
        $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $data['pinjam'] = $this->db->get_where('datapinjam', ['id' => $id])->row_array();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];


        $this->load->view('layout/header', $data);
        $this->load->view('page/detailkembali');
        $this->load->view('layout/footer');
    }

    public function konfirmasipengembalian($id){
       $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
   $member = $this->db->get_where('datamember', ['MemberID' => $user['UserID']])->row_array();
   $pinjam = $this->db->get_where('datapinjam', ['id' => $id])->row_array();

   $t = date_create($pinjam['DueDate']);
   $n = date_create(date("y-m-d"));
   $a = date_diff($t,$n); 
   $hari = $a->format("%a");

   $buku = $this->db->get_where('databuku', ['ID' => $pinjam['BookID']])->row_array();
   $feedenda = $this->db->get_where('datadendalama', ['Days' => $buku['DaysToLoan']])->row_array();
   $denda = $hari * $feedenda['Fine'];

   if($t < $n){ $fee = "$denda"; }else{ $fee = "0"; }
  $data = [
   'MemberID' => $member['MemberID'],
   'BookID' => $pinjam['BookID'],
   'UserID' => $user['UserID'],
   'Fine' => $fee,
   'Status' => 'pending'
  ];

    $this->db->insert('datapengembalian', $data);
$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
   BERHASIL ! PENGEMBALIAN SEDANG DI PROSES
</div>');
redirect('/page/pengembalian');
    }
}