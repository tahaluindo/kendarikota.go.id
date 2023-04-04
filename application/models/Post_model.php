<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{

    public function addNews($data)
    {
        $this->db->insert('news', $data);
    }
    public function getCategory()
    {
        return $this->db->get('category')->result_array();
    }

    public function getNewsCat_User_Byid($id = false)
    {
        $this->db->select('news.title,news.text,news.date_created,news.foto,news.caption,news.status,news.id,news.headline,news.id_category,category.category,user.name');
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.id_category', 'left');
        $this->db->join('user', 'user.id = news.id_author', 'left');
        if ($id == false) {

            $this->db->order_by('news.id', 'desc');

            return $this->db->get()->result_array();
        } else {
            $this->db->where("news.id", $id);
            return $this->db->get()->row_array();
        }
    }

    public function getNews()
    {
        return $this->db->get('news')->result_array();
    }
    public function deleteNews($id)
    {
        return $this->db->delete('news', array('id' => $id));
    }
    public function getNewsByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('news')->row_array();
    }

    public function editNews($id)
    {
        $str = strtolower($this->input->post('title', TRUE));
        $slug = str_replace(" ", "-", $str);
        $slug = str_replace(",", "", $slug);
        $slug = str_replace("/", "-", $slug);
        $data = array(
            'title' => $this->input->post('title', true),
            'slug' => $slug,
            'text' => $this->input->post('body', true),
            'caption' => $this->input->post('caption', true),
            'id_category' => $this->input->post('category', true),
            'update_date' => time()
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }
}
