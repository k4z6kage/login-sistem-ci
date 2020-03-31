<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    private $tabel = "user";
    private $user_id;
    private $name;
    private $email;
    private $password;
    public function index()
    { }
    public function simpan()
    {
        $data = [
            'id' => '',
            'nama' => htmlspecialchars($this->input->post('name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => '1'
        ];

        $this->db->insert($this->tabel, $data);
    }
}
