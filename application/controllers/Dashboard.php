<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Webconfig');
        $this->load->model('Search');
        $this->load->model('query');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['buku'] = $this->db->get_where('databuku', ['AllowingToLoan' => 'Y'])->result();
        $data['web'] = $this->db->get('profil')->result();
        $data['users'] = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $data['member'] = $this->db->get_where('datamember', ['MemberID' => $user['UserID']])->row_array();

        $this->load->library('pagination');
        $config['base_url'] = base_url('dashboard/index');
        $config['total_rows'] = $this->db->get('databuku')->num_rows();
        $config['per_page'] = 10;

      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = 'Next';
      $config['prev_link']        = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['buku'] =  $this->db->get_where('databuku', ['AllowingToLoan' => 'Y'], $config['per_page'], $data['start'])->result();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];

        $this->load->view('layout/header', $data);
		$this->load->view('dashboard/index');
		$this->load->view('layout/footer');
    }

    public function detail($id){
        $data['buku'] = $this->db->get_where('databuku', ['id' => $id])->result();
         $data['users'] = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $data['member'] = $this->db->get_where('datamember', ['MemberID' => $user['UserID']])->row_array();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];


        $this->load->view('layout/header', $data);
		$this->load->view('dashboard/detailbuku');
		$this->load->view('layout/footer');
    }

    public function search(){
        $keyword = $this->input->post('keyword');
        $data['buku']= $this->Search->getkeyword($keyword);

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];

        $this->load->view('layout/header', $data);
		$this->load->view('dashboard/search');
		$this->load->view('layout/footer');
    }

    public function verifikasi(){
      $this->form_validation->set_rules('name', 'Name', 'trim|required');
      $this->form_validation->set_rules('address', 'Address', 'trim|required');
      $this->form_validation->set_rules('hp', 'HP', 'required|trim');

      if($this->form_validation->run() == false){

          $config = $this->Webconfig->config();
          $data['header1'] = $config['header1'];
          $data['header2'] = $config['header2'];
          $data['header3'] = $config['header3'];
          $data['footer1'] = $config['footer1'];
          $data['footer2'] = $config['footer2'];

  $this->load->view('layout/header', $data);
  $this->load->view('dashboard/verifikasi');
  $this->load->view('layout/footer');
  }else{
    $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
         $data = [
          'MemberID' => $user['UserID'],
          'Name' => htmlspecialchars($this->input->post('name'), TRUE),
          'Address' => htmlspecialchars($this->input->post('address'), TRUE),
          'HP' => htmlspecialchars($this->input->post('hp'), TRUE),
          'MaxLoan' => 3, //default pinjaman new member
          'status' => 'pending'
         ];
         $this->query->tambah($data, 'datamember');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      VERIFIKASI BERHASIL!! SILAKAN TUNGGU MAX 1X24 JAM	 
      </div>');
	  redirect('/dashboard');
  }
}

public function prosespinjam($id){
   $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
   $member = $this->db->get_where('datamember', ['MemberID' => $user['UserID']])->row_array();
   $buku = $this->db->get_where('databuku', ['ID' => $id])->row_array();
  $dt = $buku['DaysToLoan'];
  $data = [
   'MemberID' => $member['MemberID'],
   'BookID' => $buku['ID'],
   'UserID' => $user['UserID'],
   'Days' => $buku['DaysToLoan'],
   'DueDate' => date("y-m-d", strtotime("+7 days")),
   'Status' => 'Pending'
  ];

  $data2 = [
    'Status' => 'KELUAR'
  ];
  $this->db->where('ID', $id);
 $this->db->update('databuku', $data2);
       $this->db->insert('datapinjam', $data);
$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
   BERHASIL ! PINJAMAN SEDANG DI PROSES
</div>');
redirect('/page/histori');
}
}