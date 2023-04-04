<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function headline()
    {
        $this->db->select('news.*,category.category,author.nama');
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.id_category');
        $this->db->join('author', 'author.id_author = news.id_author');
        $this->db->where('headline', 'yes');
        $this->db->order_by('news.id', 'desc');
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }

    public function pilihan()
    {
        $this->db->select('news.*,category.category,author.nama');
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.id_category');
        $this->db->join('author', 'author.id_author = news.id_author');
        $this->db->where('pilihan', 'yes');
        $this->db->order_by('news.id', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result_array();
    }

    public function populer($limit)
    {
        $date1 = time();
        $date2 = strtotime("-7 day", $date1);

        $this->db->select('news.*,category.category,author.nama');
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.id_category');
        $this->db->join('author', 'author.id_author = news.id_author');
        $this->db->where('status', 1);
        // $this->db->where('news.date_created <=', $date1);
        //$this->db->where('news.date_created >=', $date2);
        $this->db->order_by('views', 'desc');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }

    public function populer_byCategory($limit, $slug)
    {
        $date1 = time();
        $date2 = strtotime("-7 day", $date1);

        $this->db->select('news.*,category.category,author.nama');
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.id_category');
        $this->db->join('author', 'author.id_author= news.id_author');
        $this->db->where('status', 1);
        $this->db->where('category.category_slug', $slug);
        $this->db->where('news.date_created <=', $date1);
        $this->db->where('news.date_created >=', $date2);
        $this->db->order_by('views', 'desc');
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }

    public function get_All_Bycategory($cat, $limit)
    {
        $this->db->select('news.*,category.category,author.nama');
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.id_category');
        $this->db->join('author', 'author.id_author = news.id_author');
        $this->db->where('category', $cat);
        $this->db->where('status', 1);
        $this->db->limit($limit);
        $this->db->order_by('news.id', 'desc');
        return $this->db->get()->result_array();
    }

    public function get_AllNews($slug = false)
    {
        if ($slug === FALSE) {
            $this->db->select('news.*,category.category,category.icon,author.nama');
            $this->db->from('news');
            $this->db->join('category', 'category.id = news.id_category');
            $this->db->join('author', 'author.id_author = news.id_author');
            $this->db->where('status', 1);
            $this->db->limit(12);
            $this->db->order_by('news.id', 'desc');
            return $this->db->get()->result_array();
        }

        $this->db->select('news.*,category.category,author.nama');
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.id_category');
        $this->db->join('author', 'author.id_author = news.id_author');
        $this->db->where('slug', $slug);
        //$this->db->where('status', 1);
        //$this->db->limit($limit);
        //$this->db->order_by('news.id', 'desc');
        return $this->db->get()->row_array();
    }

    public function getTags_byPost($id)
    {
        $this->db->select('tags.tag');
        $this->db->from('tags');
        $this->db->join('news', 'news.id = tags.id_post');
        $this->db->where('id_post', $id);
        return $this->db->get()->result_array();
    }


    public function getAll_Category()
    {

        return $this->db->get('category')->result_array();
    }

    public function getNews_ByCategory($slug, $limit, $offset)
    {
        $this->db->select('news.*,category.category,category.category_slug,user.name');
        $this->db->from('news');
        $this->db->join('category', 'category.id = news.id_category');
        $this->db->join('user', 'user.id = news.id_author');
        $this->db->where('category_slug', $slug);
        $this->db->where('status', 1);
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('news.id', 'desc');
        return $this->db->get()->result_array();
    }
}
