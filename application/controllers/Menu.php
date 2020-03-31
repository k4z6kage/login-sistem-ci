<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menu');
    }
    public function index()
    {
        $query['data'] = $this->M_menu->index();
        $this->load->view('layout/header');
        $this->load->view('menu_user/tampil_menu', $query);
        $this->load->view('layout/footer');
    }
    public function coba()
    {
        echo "menu/coba";
    }
    public function edit($id)
    {
    }
}
