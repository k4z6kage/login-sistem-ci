<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        $data['title'] = "Halaman Administrator";
        if ($data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()) {
            $data['menu'] = $this->M_admin->Menu($data);
            $data['submenu'] = $this->M_admin->subMenu($data);
            $this->load->view('layout/header_admin', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/navbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('layout/footer_admin', $data);
        } else {
            redirect('auth');
        }
    }
}
