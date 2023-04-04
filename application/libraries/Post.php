<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post
{

    protected $CI;

    public function __construct()
    {

        $this->CI = &get_instance();
    }

    function views($id)
    {
        $id = intval($id);
        $this->CI->db->query("UPDATE news SET views= views+1 WHERE id='$id' ");
    }
}
