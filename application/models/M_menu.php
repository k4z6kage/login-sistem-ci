<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{
    private $tabel = "menu";
    public function index()
    {
        return $this->db->get($this->tabel)->result_array();
    }
    public function update()

    { }
}
