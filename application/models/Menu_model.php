<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = " SELECT `user_sub_menu`.*, `user_menu`.`menu`
                 FROM `user_sub_menu` JOIN `user_menu`
                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`        
        ";
        return $this->db->query($query)->result_array();
    }
    public function getSubMenuById($id)
    {
        $query = " SELECT `user_menu`.*, `user_sub_menu`.*
               FROM `user_menu` JOIN `user_sub_menu`
             ON `user_menu`.`id` = `user_sub_menu`.`menu_id`     
           WHERE `user_sub_menu`.`id` = $id 
        ";
        return $this->db->query($query)->row_array();
        //$this->db->select('*');
        //$this->db->from('user_menu');
        //$this->db->join('user_sub_menu', 'user_sub_menu.menu_id = user_menu.id');
        //$this->db->where('user_menu.id', 1);
        //return $this->db->get()->result_array();
    }
}
