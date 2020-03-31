<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        if (!$data = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()) {
            $judul['title'] = "Halaman Login";
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->load->view('layout/header', $judul);
                $this->load->view('login/login');
                $this->load->view('layout/footer');
            } else {
                $email = htmlspecialchars($this->input->post('email', true));
                $password = $this->input->post('password', true);
                $user = $this->db->get_where('user', ['email' => $email])->row_array();
                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Password yang anda masukkan salah!
                        </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    E-mail yang anda masukkan belum terdaftar!
                    </div>');
                    redirect('auth');
                }
            }
        } else {
            redirect('admin');
        }
    }
    public function register()
    {
        $judul['title'] = "Halaman Register";
        $this->form_validation->set_rules('name', 'Nama', 'required|trim', [
            'required' => 'Nama harus di isi'
        ]);
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'E-mail harus di isi',
            'valid_email' => 'Format email salah',
            'is_unique' => 'E-mail ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', [
            'required' => 'Password harus di isi',
            'matches' => 'Password harus sama'
        ]);
        $this->form_validation->set_rules('password2', 'password2', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $judul);
            $this->load->view('login/register');
            $this->load->view('layout/footer');
        } else {
            $tabel = $this->M_admin->register();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil register silahkan login!
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect('auth');
    }
}
