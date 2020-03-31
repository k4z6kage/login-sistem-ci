<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function register()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.png',
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
    }
    public function Menu($data)
    {
        $data = $data['user'];
        $roleId = $data['role_id'];
        $query = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id`=`user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id`=$roleId";
        return $this->db->query($query)->result_array();
    }
    public function subMenu($data)
    {
        $data = $data['menu'][0];
        $menuId = $data['id'];
        $query = "SELECT * FROM `user_sub_menu` JOIN `user_menu` ON 
                `user_sub_menu`.`menu_id`=`user_menu`.`id`
                WHERE `user_sub_menu`.`menu_id`=$menuId";
        var_dump($this->db->query($query)->result_array());
        die;
    }
}
