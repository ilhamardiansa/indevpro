<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('query');
        $this->load->model('Webconfig');
        $this->load->model('Kode_m');
	}

    public function datauser(){
        $data['user'] = $this->db->get('datauser')->result();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];

        $this->load->view('layout/header', $data);
		$this->load->view('admin/datauser');
		$this->load->view('layout/footer');
    }

    public function deleteuser($id){
        $this->db->delete('datauser', ['UserID' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil dihapus !
	   </div>');
	  redirect('/admin/datauser');
	}

    public function tambahuser(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'min_length' => 'Password minimal 8 karakter'
        ]);

        if($this->form_validation->run() == false){

            $config = $this->Webconfig->config();
            $data['header1'] = $config['header1'];
            $data['header2'] = $config['header2'];
            $data['header3'] = $config['header3'];
            $data['footer1'] = $config['footer1'];
            $data['footer2'] = $config['footer2'];

		$this->load->view('layout/header', $data);
		$this->load->view('admin/tambahuser');
		$this->load->view('layout/footer');
		}else{
            $data = [
                'UserID' => $this->Kode_m->kode(),
                'Name' =>  htmlspecialchars($this->input->post('name'), TRUE),
                'Password' => $this->input->post('password'),
                'role' => $this->input->post('role')
            ];
			$this->query->tambah($data, 'datauser');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil ditambah!
	   </div>');
	  redirect('/admin/datauser');
		}
	}

    public function edituser($id){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'min_length' => 'Password minimal 8 karakter'
        ]);

        if($this->form_validation->run() == false){

            $data['user'] =  $this->db->get_where('datauser', ['UserID' => $id])->result();

            $config = $this->Webconfig->config();
            $data['header1'] = $config['header1'];
            $data['header2'] = $config['header2'];
            $data['header3'] = $config['header3'];
            $data['footer1'] = $config['footer1'];
            $data['footer2'] = $config['footer2'];

		$this->load->view('layout/header', $data);
		$this->load->view('admin/edituser');
		$this->load->view('layout/footer');
		}else{
            $data = [
                'Name' =>  htmlspecialchars($this->input->post('name'), TRUE),
                'Password' => $this->input->post('password'),
                'role' => $this->input->post('role')
            ];
            $this->db->where('UserID', $id);
            $this->db->update('datauser', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil diubah!
	   </div>');
	  redirect('/admin/datauser');
		}
	}

    public function datamember(){
        $data['member'] = $this->db->get_where('datamember', ['status' => 'terkonfirmasi'])->result();
        $data['members'] = $this->db->get_where('datamember', ['status' => 'pending'])->result();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];

        $this->load->view('layout/header', $data);
		$this->load->view('admin/datamember');
		$this->load->view('layout/footer');
    }

    public function deletemembers($id){
        $this->db->delete('datamember', ['MemberID ' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        BERHASIL !
	   </div>');
	  redirect('/admin/datamember');
	}

    public function konfirmembers($id){
       $data = [
        'status' => 'terkonfirmasi'
       ];
       $this->db->where('MemberID', $id);
            $this->db->update('datamember', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        BERHASIL !
	   </div>');
	  redirect('/admin/datamember');
	}
    public function databuku(){
        $data['buku'] = $this->db->get('databuku')->result();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];

        $this->load->view('layout/header', $data);
		$this->load->view('admin/databuku');
		$this->load->view('layout/footer');
    }

    public function deletebuku($id){
        $this->db->delete('databuku', ['ID' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil dihapus !
	   </div>');
	  redirect('/admin/databuku');
	}

    public function tambahbuku(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('year', 'Year', 'trim|required');
        $this->form_validation->set_rules('allow', 'Allow', 'trim|required');
        $this->form_validation->set_rules('days', 'Days', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'trim|required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');

        if($this->form_validation->run() == false){

            $data['author'] = $this->db->get('dataauthor')->result();
            $data['publisher'] = $this->db->get('datapublisher')->result();
            $data['category'] = $this->db->get('datacategory')->result();
            $data['type'] = $this->db->get('datatipebuku')->result();
            $data['kondisi'] = $this->db->get('datakondisi')->result();

            $config = $this->Webconfig->config();
            $data['header1'] = $config['header1'];
            $data['header2'] = $config['header2'];
            $data['header3'] = $config['header3'];
            $data['footer1'] = $config['footer1'];
            $data['footer2'] = $config['footer2'];

		$this->load->view('layout/header', $data);
		$this->load->view('admin/tambahbuku');
		$this->load->view('layout/footer');
		}else{
            $data = [
                'ID' => $this->Kode_m->kode2(),
                'Title' =>  htmlspecialchars($this->input->post('title'), TRUE),
                'Author' =>  htmlspecialchars($this->input->post('author'), TRUE),
                'Publisher' =>  htmlspecialchars($this->input->post('publisher'), TRUE),
                'Category' =>  htmlspecialchars($this->input->post('category'), TRUE),
                'Year' =>  htmlspecialchars($this->input->post('year'), TRUE),
                'AllowingToLoan' =>  htmlspecialchars($this->input->post('allow'), TRUE),
                'DaysToLoan' =>  htmlspecialchars($this->input->post('days'), TRUE),
                'Status' =>  htmlspecialchars($this->input->post('status'), TRUE),
                'Type' =>  htmlspecialchars($this->input->post('tipe'), TRUE),
                'Condition' =>  htmlspecialchars($this->input->post('kondisi'), TRUE),
            ];
			$this->query->tambah($data, 'databuku');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil ditambah!
	   </div>');
	  redirect('/admin/databuku');
		}
	}

    public function editbuku($id){
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('year', 'Year', 'trim|required');
        $this->form_validation->set_rules('allow', 'Allow', 'trim|required');
        $this->form_validation->set_rules('days', 'Days', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'trim|required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');

        if($this->form_validation->run() == false){

            $data['buku'] = $this->db->get_where('databuku', ['ID' => $id])->result();
            $data['author'] = $this->db->get('dataauthor')->result();
            $data['publisher'] = $this->db->get('datapublisher')->result();
            $data['category'] = $this->db->get('datacategory')->result();
            $data['type'] = $this->db->get('datatipebuku')->result();
            $data['kondisi'] = $this->db->get('datakondisi')->result();

            $config = $this->Webconfig->config();
            $data['header1'] = $config['header1'];
            $data['header2'] = $config['header2'];
            $data['header3'] = $config['header3'];
            $data['footer1'] = $config['footer1'];
            $data['footer2'] = $config['footer2'];

		$this->load->view('layout/header', $data);
		$this->load->view('admin/editbuku');
		$this->load->view('layout/footer');
		}else{
            $data = [
                'ID' => $this->Kode_m->kode2(),
                'Title' =>  htmlspecialchars($this->input->post('title'), TRUE),
                'Author' =>  htmlspecialchars($this->input->post('author'), TRUE),
                'Publisher' =>  htmlspecialchars($this->input->post('publisher'), TRUE),
                'Category' =>  htmlspecialchars($this->input->post('category'), TRUE),
                'Year' =>  htmlspecialchars($this->input->post('year'), TRUE),
                'AllowingToLoan' =>  htmlspecialchars($this->input->post('allow'), TRUE),
                'DaysToLoan' =>  htmlspecialchars($this->input->post('days'), TRUE),
                'Status' =>  htmlspecialchars($this->input->post('status'), TRUE),
                'Type' =>  htmlspecialchars($this->input->post('tipe'), TRUE),
                'Condition' =>  htmlspecialchars($this->input->post('kondisi'), TRUE),
            ];
            $this->db->where('ID', $id);
            $this->db->update('databuku', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Data berhasil diubah!
	   </div>');
	  redirect('/admin/databuku');
		}
	}

    public function datapinjam(){
        $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $data['pinjams'] = $this->db->get_where('datapinjam', ['Status' => 'pending'])->result();
        $data['pinjam'] = $this->db->get('datapinjam')->result();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];


        $this->load->view('layout/header', $data);
		$this->load->view('admin/datapinjam');
		$this->load->view('layout/footer');
    }

    public function cancelpinjam($id){
        $pinjam = $this->db->get_where('datapinjam', ['id' => $id])->row_array();
        $data2 = [
        'Status' => 'ADA'
       ];
         $data1 = [
        'Status' => 'gagal'
       ];
        $this->db->where('ID', $pinjam['BookID']);
        $this->db->update('databuku', $data2);

         $this->db->where('id', $id);
        $this->db->update('datapinjam', $data1);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        BERHASIL !
	   </div>');
	  redirect('/admin/datapinjam');
	}

    public function konfirpinjam($id){
       $data = [
        'status' => 'terkonfirmasi'
       ];
       $this->db->where('id', $id);
            $this->db->update('datapinjam', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        BERHASIL !
	   </div>');
	  redirect('/admin/datapinjam');
	}

    public function datakembali(){
        $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
        $data['kembalis'] = $this->db->get_where('datapengembalian', ['Status' => 'pending'])->result();
        $data['kembali'] = $this->db->get('datapengembalian')->result();

        $config = $this->Webconfig->config();
        $data['header1'] = $config['header1'];
        $data['header2'] = $config['header2'];
        $data['header3'] = $config['header3'];
        $data['footer1'] = $config['footer1'];
        $data['footer2'] = $config['footer2'];


        $this->load->view('layout/header', $data);
        $this->load->view('admin/datakembali');
        $this->load->view('layout/footer');
    }

     public function cancelkembali($id){
        $pinjam = $this->db->get_where('datapengembalian', ['id' => $id])->row_array();

        $data2 = [
        'Status' => 'gagal'
       ];

        $this->db->where('id', $id);
        $this->db->update('datapengembalian', $data2);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        BERHASIL !
       </div>');
      redirect('/admin/datakembali');
    }

    public function konfirkembali($id){
        $kembali = $this->db->get_where('datapengembalian', ['id' => $id])->row_array();
        $user = $this->db->get_where('datauser', ['Name' => $this->session->userdata('name')])->row_array();
       $data = [
        'status' => 'dikembalikan'
       ];
       $data2 = [
        'Status' => 'ADA'
       ];
       $data3 = [
        'Status' => 'dikembalikan'
      ];
      $this->db->where('BookID', $kembali['BookID']);
      $this->db->where('UserID', $user['UserID']);
      $this->db->update('datapinjam', $data3);
        $this->db->where('ID', $kembali['BookID']);
        $this->db->update('databuku', $data2);
       $this->db->where('id', $id);
            $this->db->update('datapengembalian', $data);
            
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        BERHASIL !
       </div>');
      redirect('/admin/datakembali');
    }
}