<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kode_m');
	}
	public function index()
	{
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }else{
           $name = $this->input->post('name');
           $password = $this->input->post('password');

           $user = $this->db->get_where('datauser', ['Name' => $name])->row_array();

           if($user){
            if($password == $user['Password']){
                $data = [
                    'name' => $user['Name'],
                    'role' => $user['role'],
                ];
                $this->session->set_userdata($data);           
                    redirect('dashboard');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah !
                </div>');
                redirect('auth');
            }
           }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User tidak terdaftar !
            </div>');
            redirect('auth');
           }
        }
	}

    public function register(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'min_length' => 'Password minimal 8 karakter'
        ]);

        if($this->form_validation->run() == false){
        $this->load->view('auth/header');
        $this->load->view('auth/register');
        $this->load->view('auth/footer');
        }else{
            $data = [
                'UserID' => $this->Kode_m->kode(),
                'Name' =>  htmlspecialchars($this->input->post('name'), TRUE),
                'Password' => $this->input->post('password'),
                'role' => 2
            ];
            $this->db->insert('datauser', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil di buat ! Silakan Login terlebih dahulu
          </div>');
            redirect('auth');
         }
        }

        public function logout()
        {
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('status');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Logout !
          </div>');
            redirect('auth');
        }
    
    }

